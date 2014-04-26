<?php
	/**
	 * Controller used to display recipes that belong to a give course;
	 * main, starter, dessert etc.
	 */
	class Course extends CI_Controller
	{
		/**
		 * Function called when viewing a course.
		 *
		 * @param $courseId : Integer/Null - When integer, course data is feteched fron
		 *                    from the database and displayed to the user.
		 *                    If null, WE'LL SEND THEM TO THE LANDING PAGE
		 *
		 */
		public function view($courseName)
		{
			if(!isset($courseName))
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received invalid course name. Cannot show course page');
				return;
			}

			$courseName = urldecode($courseName);

			$this->load->model('Course_model', 'Course_model', true);
			$this->load->model('Recipe_style_model');
			$this->load->model('Breadcrumb_model');

			$course               = $this->Course_model->getCourseInfo($courseName);
			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
				$this->Recipe_style_model->setRecipeStyle();
				$preferredRecipeStyle = 'narrative';
			}

			$data['defaultStyle'] = $preferredRecipeStyle;
			$data['breadcrumb']   = $this->Breadcrumb_model->generateBreadcrumb('course');

			$data['breadcrumb']['Course: ' . ucfirst($courseName)] = base_url() . 'course/' . rawurlencode($courseName);

			if(!$course)
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received no course information for course ' . $courseName);

				$data['title']      = 'Course Not Found';
				$data['courseName'] = $courseName;

				$this->load->helper('html');
				$this->load->view('templates/header.php', $data);
				$this->load->view('pages/course_not_found.php', $data);
				$this->load->view('templates/footer.php', $data);

				return;
			}

			$data['title']       = $course->name . ' Recipes';
			$data['recipes']     = $this->Course_model->getRecipes($courseName);
			$data['courseImage'] = $data['recipes'][array_rand($data['recipes'])]->imageurl;

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/course.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
