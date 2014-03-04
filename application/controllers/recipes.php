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
        }
		/**
		 * Funciton used to display the recipes in the
		 * system in their list form.
		 */
		public function viewList()
		{
			$data['title'] = 'View All Recipes: List View';
            
            $data['recipes'] = $this->recipe_model->getAllRecipes();

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
			$data['title'] = 'View All Recipes: Grid View';

			$data['recipes'] = $this->recipe_model->getAllRecipes();

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipes_grid.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
