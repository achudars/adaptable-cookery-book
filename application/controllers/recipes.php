<?php

	/**
	 * Controller used to display a list of recipes stored in the application.
	 */
	class Recipes extends CI_Controller
	{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Recipe_model', 'recipe_model', true);
            $this->load->model('Breadcrumb_model');
        }
		/**
		 * Funciton used to display the recipes in the
		 * system in their list form.
		 */
		public function viewList()
		{
			$data['title']        = 'View All Recipes: List View';
            $data['defaultStyle'] = $this->getRecipeStyle();

            $data['recipes']    = $this->recipe_model->getAllRecipes();
			$data['breadcrumb'] = $this->Breadcrumb_model->generateBreadcrumb('recipes');

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipes_list.php', $data);
			$this->load->view('templates/footer.php', $data);
		}

		/**
		 * Function used to display the recipes in the
		 * system in their grid form.
		 */
		public function viewGrid()
		{
			$data['title']        = 'View All Recipes: Grid View';
			$data['defaultStyle'] = $this->getRecipeStyle();

			$data['recipes']    = $this->recipe_model->getAllRecipes();
			$data['breadcrumb'] = $this->Breadcrumb_model->generateBreadcrumb('recipes');

			$data['breadcrumb']['Recipes: Grid View'] = base_url() . 'recipes/grid-view';

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipes_grid.php', $data);
			$this->load->view('templates/footer.php', $data);
		}

		/**
		 * Private function used to determine the user's preference on recipe
		 * style (for use in the header).
		 *
		 * @return - $preferredRecipeStyle : The user's recipe style
		 */
		private function getRecipeStyle()
		{
			$this->load->model('Recipe_style_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
				$this->Recipe_style_model->setRecipeStyle();
				$preferredRecipeStyle = 'narrative';
			}

			return $preferredRecipeStyle;
		}
	}
