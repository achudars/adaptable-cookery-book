<?php

	/**
	 * Controller used to display recipe data and pages
	 */
	class Recipe extends CI_Controller
	{
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
			}

			$this->load->model('Recipe_style_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
				$this->Recipe_style_model->setRecipeStyle();
				$preferredRecipeStyle = 'narrative';
			}

			$data['defaultStyle'] = $preferredRecipeStyle;
			$data['title']        = 'Recipe Title From Database Goes Here';

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipe.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
