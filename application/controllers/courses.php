<?php
	/**
	 * Controller used to display courses that are stored in the app;
	 * main, starter, dessert etc.
	 */
	class Courses extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * Function called when viewing the courses.
		 */
		public function viewAll()
		{
			$data['title'] = 'Courses Available';

			$this->load->model('Recipe_style_model');
			$this->load->model('Breadcrumb_model');
			$this->load->model('Course_model', 'Course_model', true);

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
				$this->Recipe_style_model->setRecipeStyle();
				$preferredRecipeStyle = 'narrative';
			}

			$data['defaultStyle'] = $preferredRecipeStyle;
			$data['courses']      = $this->Course_model->getAllCourses();
			$data['breadcrumb']   = $this->Breadcrumb_model->generateBreadcrumb('courses');

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/courses.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
