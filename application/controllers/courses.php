<?php
	/**
	 * Controller used to display courses that are stored in the app;
	 * main, starter, dessert etc.
	 */
	class Courses extends CI_Controller
	{
		/**
		 * Function called when viewing the courses.
		 */
		public function viewAll()
		{
			$data['title'] = 'Courses Available';

			$this->load->model('Recipe_style_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
				$this->Recipe_style_model->setRecipeStyle();
				$preferredRecipeStyle = 'narrative';
			}

			$data['defaultStyle'] = $preferredRecipeStyle;

			$data['courses'] = array(
				array(
					'courseName'  => 'Starters',
					'courseId'    => 1,
					'recipeCount' => 10,
					'imageUrl'    => 'http://www.bishopburton.ac.uk/_inc/uploads/generalimages/Starters.jpg',
				),
				array(
					'courseName'  => 'Main Courses',
					'courseId'    => 2,
					'recipeCount' => 7,
					'imageUrl'    => 'http://www.brake.co.uk/_assets/720xn/Main_Course_Poster_720x430px_1.jpg',
				),
				array(
					'courseName'  => 'Desserts',
					'courseId'    => 3,
					'recipeCount' => 11,
					'imageUrl'    => 'http://upload.wikimedia.org/wikipedia/commons/8/84/Chocolate_Cake_Flourless_%281%29.jpg',
				),
				array(
					'courseName'  => 'Snacks',
					'courseId'    => 4,
					'recipeCount' => 4,
					'imageUrl'    => 'http://pururuwang.files.wordpress.com/2012/11/snacks1.jpg',
				)
			);

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/courses.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
