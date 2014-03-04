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
			$data = array();

			if(isset($recipeId))
			{
				//Go and get the recipe details from the database
				//$data['recipeData'] = $db->getRecipe($recipeId);
			}

			$preferredRecipeStyle = $this->input->cookie('preferredRecipeStyle');

			if(!$preferredRecipeStyle)
			{
				$this->input->set_cookie(array(
					'name'   => 'preferredRecipeStyle',
					'value'  => 'narrative',
					'expire' => time() + (10 * 365 * 24 * 60 * 60),
				));

				$preferredRecipeStyle = 'narrative';
			}

			$data['title']        = 'Recipe Title From Database Goes Here';
			$data['defaultStyle'] = $preferredRecipeStyle;

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipe.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
