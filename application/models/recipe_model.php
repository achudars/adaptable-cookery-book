<?php

class RecipeModel extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Loads basic details about a recipe, useful for menu pages.
     * 
     * @param int $recipeid
     * @return Object A set of {recipeid, name, courseid, diettype, serves, imageurl}
     * @throws Exception On failure to find the recipe.
     */
    public function getRecipeInfo($recipeid)
    {
        $this->db->select('recipeid, name, courseid, diettype, serves, imageurl')
                  ->from('recipe')
                  ->where(['recipeid' => $recipeid])
                  ->limit(1);
        
        $q = $this->db->get();
        
        if (empty($q))
        {
            throw new Exception('That recipe could not be found.', 404);
        } else {
            return $q->result();
        }
    }
    
    /**
     * Loads basic details for all recipes for a given course.
     * 
     * @param int $courseid
     * @return Array[Object] [{recipeid, name, diettype, serves, imageurl},...]
     */
    public function getRecipesForCourse($courseid)
    {
        $this->db->select('recipeid, name, diettype, serves, imageurl')
                  ->from('recipe')
                  ->where(['courseid' => $courseid])
                  ->order_by('name', 'asc');
        
        return $this->db->get();
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
            $recipe->instructions = $q->result()[0];
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
        
        $recipe->instructions = $this->db->get();
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
        
        $recipe->instructions = $this->db->get();
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
        $this->db->select('name, quantity, section, units')
                ->from('recipe_ingredient')
                ->where_not_in('recipeingredientid', $except)
                ->where(['recipeid' => $recipeid]);
        
        return $this->db->get();
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
        
        $ingredients = $this->db->get();
        
        //Load narrative ingredients unless they are replaced
        $replaced = [];
        foreach ($ingredients as $ingredient) {
            if ($ingredient->replaces != null) {
                $replaced[] = $ingredient->replaces;
            }
        }
        
        $narrative = $this->getNarrativeIngredientsExcept($recipeid, $replaced);
        
        //Merge the two results
        return array_merge($ingredients, $narrative);
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
        
        $ingredients = $this->db->get();
        
        //Load narrative ingredients unless they are replaced
        $replaced = [];
        foreach ($ingredients as $ingredient) {
            if ($ingredient->replaces != null) {
                $replaced[] = $ingredient->replaces;
            }
        }
        
        $narrative = $this->getNarrativeIngredientsExcept($recipeid, $replaced);
        
        //Merge the two results
        return array_merge($ingredients, $narrative);
    }
}