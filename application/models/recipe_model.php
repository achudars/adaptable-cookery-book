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
     * @return Array A set of [recipeid, name, courseid, diettype, serves and imageurl]
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
     * Gets all the information necessary to display the narrative form
     * of the recipe.
     * 
     * @param int $recipeid
     * @return Array [narrative, ingredients[]]
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
    
    private function getNarrativeIngredientsExcept($recipeid, $except)
    {
        $this->db->select('name, quantity, section, units')
                ->from('recipe_ingredient')
                ->where_not_in('recipeingredientid', $except)
                ->where(['recipeid' => $recipeid]);
        
        return $this->db->get();
    }
    
    private function getNarrativeIngredients($recipeid)
    {
        return $this->getNarrativeIngredientsExcept($recipeid, []);
    }
    
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