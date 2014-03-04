<?php

	/**
	 * Controller used to display recipe data and pages
	 */
	class Recipe extends CI_Controller
	{
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Recipe_model', 'recipe_model', true);
        }
		/**
		 * Function called when viewing a recipe.
		 *
		 * @param $recipeId : Integer/Null - When integer, recipe data is feteched fron
		 *                    from the database and displayed to the user.
		 *                    If null, WE'LL SEND THEM TO THE RECIPE LANDING PAGE
		 *
		 */
		public function view($recipeId = null)
		{
			if(isset($recipeId))
			{
				//Go and get the recipe details from the database
				//$data['recipeData'] = $db->getRecipe($recipeId);
                $info = $this->recipe_model->getRecipeInfo($recipeId);
                $data['title'] = $info->name;
                $data['narrative'] = $this->recipe_model->getRecipeNarrative($recipeId);
                $data['steps'] = $this->recipe_model->getRecipeStepped($recipeId);
                $data['segmented'] = $this->recipe_model->getRecipeSegmented($recipeId);
			} else {
                header('HTTP/1.1 400 Bad Request');
                header('Location: ../');
            }

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipe.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
