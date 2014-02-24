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

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/courses.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
