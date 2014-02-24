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
		public function view($courseId = null)
		{
			if(isset($courseId))
			{
			}

			$data['title'] = 'Course Title From Database';

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/course.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
