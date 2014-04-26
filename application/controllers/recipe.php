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
		 *                    If null, we'll send them to the Recipe landing page
		 *
		 */
		public function view($recipeId = null)
		{
			if(!isset($recipeId))
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received request to view recipe, but no recipe ID');
				header('Location: ' . base_url() . 'recipes/');
			}

			$this->load->model('Recipe_style_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
			    $this->Recipe_style_model->setRecipeStyle();
			    $preferredRecipeStyle = 'narrative';
			}

			$data['defaultStyle'] = $preferredRecipeStyle;

			$recipeInfo = $this->recipe_model->getRecipeInfo($recipeId);

			$this->load->model('Breadcrumb_model');
			$data['breadcrumb'] = $this->Breadcrumb_model->generateBreadcrumb('recipe');

			if(!$recipeInfo)
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - No recipe information found in database for recipe ID: ' . $recipeId);

				$data['title'] = 'Recipe Not Found';
				$data['breadcrumb']['Recipe: ' . $data['title']] = base_url() . 'recipe/' . $recipeId;

				$this->load->helper('html');
				$this->load->view('templates/header.php', $data);
				$this->load->view('pages/recipe_not_found.php', $data);
				$this->load->view('templates/footer.php', $data);

				return;
			}

			$data['breadcrumb']['Recipe: ' . $data['title']] = base_url() . 'recipe/' . $recipeId;

			$data['title']     = $recipeInfo->name;
			$data['image']     = $recipeInfo->imageurl;
			$data['narrative'] = $this->recipe_model->getRecipeNarrative($recipeId);
			$data['steps']     = $this->recipe_model->getRecipeStepped($recipeId);
			$data['segmented'] = $this->recipe_model->getRecipeSegmented($recipeId);
			$data['diettype']  = $recipeInfo->diettype;
			$data['preptime']  = $recipeInfo->preptime;
			$data['calories']  = $recipeInfo->calories;
			$data['serves']    = $recipeInfo->serves;

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipe.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
