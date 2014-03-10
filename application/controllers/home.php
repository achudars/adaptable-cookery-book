<?php

	/**
	 * Controller class to handle display
	 * the views for the homepage
	 */
	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * View function. Called by router to
		 * build and display homepage.
		 */
		public function view()
		{
			$data = array(
				'title' => 'Welcome to the Cookery Application',
			);

			$this->load->model('Recipe_style_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
			    $this->Recipe_style_model->setRecipeStyle();
			    $preferredRecipeStyle = 'narrative';
			}

			//Go and get the recipe details from the database
			$data['defaultStyle'] = $preferredRecipeStyle;

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/home.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
