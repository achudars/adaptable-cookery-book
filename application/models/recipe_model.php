<?php

class Recipe_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Loads basic details about a recipe, useful for menu pages.
     *
     * @param int $recipeid
     * @return Object A set of {recipeid, name, courseid, diettype, serves, imageurl, calories, preptime}
     * @throws Exception On failure to find the recipe.
     */
    public function getRecipeInfo($recipeid)
    {
        $this->db->select('recipeid, name, courseid, diettype, serves, imageurl, calories, preptime')
                  ->from('recipe')
                  ->where(['recipeid' => $recipeid])
                  ->limit(1);

        $q = $this->db->get();

        if (empty($q->result))
        {
			error_log(__FILE__ . ':' . __LINE__ . ' - Database query for recipe ID ' . $recipeid . ' returned no results.');
			return false;
        }
		else
		{
            return $q->result()[0];
        }
    }

    /**
     * Loads basic details for all recipes for a given course.
     *
     * @param int $courseid
     * @return Array[Object] [{recipeid, name, diettype, serves, imageurl, calories, preptime, course},...]
     */
    public function getRecipesForCourse($courseid)
    {
        $this->db->select('recipeid, recipe.name, diettype, serves, imageurl, calories, preptime, course.name AS course')
                  ->from('recipe')
                  ->join('course', 'recipe.courseid = course.courseid')
                  ->where(['courseid' => $courseid])
                  ->order_by('name', 'asc');

        return $this->db->get()->result();
    }

    /**
     * Loads basic details for all recipes.
     *
     * @return Array[Object] [{recipeid, name, diettype, serves, imageurl, calories, preptime, course},...]
     */
    public function getAllRecipes()
    {
        $this->db->select('recipeid, recipe.name, diettype, serves, imageurl, calories, preptime, course.name AS course')
                  ->from('recipe')
                  ->join('course', 'recipe.courseid = course.courseid')
                  ->order_by('name', 'asc');

        return $this->db->get()->result();
    }

    /**
     * Gets all the information necessary to display the narrative form
     * of the recipe.
     *
     * @param int $recipeid
     * @return Object {instructions, ingredients[]}
     * @throws Exception On failure to find the recipe
     */
    public function getRecipeNarrative($recipeid)
    {
        $this->db->select('narrative')
                ->from('recipe')
                ->where(['recipeid' => $recipeid])
                ->limit(1);
        $q = $this->db->get();

        if (empty($q))
        {
            throw new Exception('That recipe could not be found.', 404);
        } else {
            $recipe = new stdClass();
            $recipe->instructions = $q->result()[0]->narrative;
            $recipe->ingredients = $this->getNarrativeIngredients($recipeid);
            return $recipe;
        }
    }

    /**
     * Gets all the information necessary to display the segmented form
     * of the recipe.
     *
     * @param int $recipeid
     * @return Object {instructions[{stepid, instruction}], ingredients[]}
     */
    public function getRecipeSegmented($recipeid)
    {
        $this->db->select('stepid, instruction')
                ->from('recipe_segmented')
                ->where(['recipeid' => $recipeid])
                ->order_by('stepid', 'asc');

        $recipe = new stdClass();
        $recipe->instructions = $this->db->get()->result();
        $recipe->ingredients = $this->getSegmentedIngredients($recipeid);
        return $recipe;
    }

    /**
     * Gets all the information necessary to display the stepped form
     * of the recipe.
     *
     * @param int $recipeid
     * @return Object {instructions[{stepid, instruction}], ingredients[]}
     */
    public function getRecipeStepped($recipeid)
    {
        $this->db->select('stepid, instruction')
                ->from('recipe_step')
                ->where(['recipeid' => $recipeid])
                ->order_by('stepid', 'asc');

        $recipe = new stdClass();
        $recipe->instructions = $this->db->get()->result();
        $recipe->ingredients = $this->getSteppedIngredients($recipeid);
        return $recipe;
    }

    /**
     * Gets all the ingredients for the narrative recipe, except those excluded.
     *
     * Segmented and stepped recipes will use the same ingredient set as
     * narrative, unless they are explicitly overridden.
     *
     * @param int $recipeid
     * @return Array[Object] [{name, quantity, section, units}]
     */
    private function getNarrativeIngredientsExcept($recipeid, $except)
    {
        if (empty($except)) {
            $except = [0];
        }
        $this->db->select('name, quantity, section, units')
                ->from('recipe_ingredient')
                ->where_not_in('recipeingredientid', $except)
                ->where(['recipeid' => $recipeid]);

        $result = $this->db->get()->result();

        return $this->formatIngredients($result);
    }

    /**
     * Takes quantity values and converts them to look more human-readable
     *
     * e.g. Removing decimal places, using fractions.
     *
     * @param Array{name,quantity,section,units} $result
     * @return Array{name,quantity,section,units}
     */
    private function formatIngredients($result) {
        return array_map(function($x)
        {
            //Remove unnecessary decimal places
            if ($x->quantity != null)
            {
                $x->quantity = (string)$x->quantity+0;
            }

            //Replace with fractions where necessary
            $prefix = floor($x->quantity);
            if ($prefix == 0)
            {
                $prefix = '';
            }

            switch (fmod($x->quantity,1))
            {
                case 0.25:
                    $x->quantity = $prefix.'&frac14;';
                    break;
                case 0.33:
                    $x->quantity = $prefix.'&#8531;';
                    break;
                case 0.5:
                    $x->quantity = $prefix.'&frac12;';
                    break;
                case 0.67:
                    $x->quantity = $prefix.'&#8532;';
                    break;
                case 0.75:
                    $x->quantity = $prefix.'&frac34;';
                    break;
            }

            return $x;
        }, $result);
    }

    /**
     * Loads the ingredients needed for the Narrative view of the recipe.
     *
     * @param int $recipeid
     * @return Array[Object] [{name, quantity, section, units}]
     */
    private function getNarrativeIngredients($recipeid)
    {
        return $this->getNarrativeIngredientsExcept($recipeid, []);
    }

    /**
     * Loads the ingredients needed for the Segmented view of the recipe.
     *
     * @param int $recipeid
     * @return Array[Object] [{name, quantity, section, units}]
     * @todo Look at providing a consistent ordering
     */
    private function getSegmentedIngredients($recipeid)
    {
        $this->db->select('name, quantity, section, units, replaces')
                ->from('recipe_segmented_ingredient')
                ->where(['recipeid' => $recipeid]);

        $ingredients = $this->db->get()->result();

        //Load narrative ingredients unless they are replaced
        $replaced = [];
        foreach ($ingredients as $ingredient) {
            if ($ingredient->replaces != null) {
                $replaced[] = $ingredient->replaces;
            }
        }

        $narrative = $this->getNarrativeIngredientsExcept($recipeid, $replaced);

        //Merge the two results
        return array_merge($this->formatIngredients($ingredients), $narrative);
    }

    /**
     * Loads the ingredients needed for the Stepped view of the recipe.
     *
     * @param int $recipeid
     * @return Array[Object] [{name, quantity, section, units}]
     * @todo Look at providing a consistent ordering
     */
    private function getSteppedIngredients($recipeid)
    {
        $this->db->select('name, quantity, section, units, replaces')
                ->from('recipe_step_ingredient')
                ->where(['recipeid' => $recipeid]);

        $ingredients = $this->db->get()->result();

        //Load narrative ingredients unless they are replaced
        $replaced = [];
        foreach ($ingredients as $ingredient) {
            if ($ingredient->replaces != null) {
                $replaced[] = $ingredient->replaces;
            }
        }

        $narrative = $this->getNarrativeIngredientsExcept($recipeid, $replaced);

        //Merge the two results
        return array_merge($this->formatIngredients($ingredients), $narrative);
    }
}
