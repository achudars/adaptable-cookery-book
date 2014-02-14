<?php

	class Pages extends CI_Controller
	{
		public function view($page)
		{
			if(!file_exists('application/views/pages/' . $page . '.php'))
			{
				error_log('Page ' . $page . ' doesn\'t exist');
				show_404();
			}

			$this->load->view('templates/header.php');
			$this->load->view('pages/' . $page . '.php');
			$this->load->view('templates/footer.php');
		}
	}
