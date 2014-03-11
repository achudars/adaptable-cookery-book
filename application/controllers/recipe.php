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
			if(isset($recipeId))
			{
                $this->load->model('Recipe_style_model');

                $preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

                if(!$preferredRecipeStyle)
                {
                    $this->Recipe_style_model->setRecipeStyle();
                    $preferredRecipeStyle = 'narrative';
                }

                //Go and get the recipe details from the database
                $data['defaultStyle'] = $preferredRecipeStyle;
                $info = $this->recipe_model->getRecipeInfo($recipeId);
                $data['title'] = $info->name;
                $data['image'] = $info->imageurl;
                $data['narrative'] = $this->recipe_model->getRecipeNarrative($recipeId);
                $data['steps'] = $this->recipe_model->getRecipeStepped($recipeId);
                $data['segmented'] = $this->recipe_model->getRecipeSegmented($recipeId);
				$data['diettype'] = $info->diettype;
                $data['preptime'] = $info->preptime;
                $data['calories'] = $info->calories;
                $data['serves'] = $info->serves;

				$this->load->model('Breadcrumb_model');
				$data['breadcrumb'] = $this->Breadcrumb_model->generateBreadcrumb('recipe');
				$data['breadcrumb']['Recipe: ' . $data['title']] = base_url() . 'recipe/' . $recipeId;
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
