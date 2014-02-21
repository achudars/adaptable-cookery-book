<?php

	class Recipe extends CI_Controller
	{

		public function view($page = "recipe")
		{
			if(!file_exists('application/views/pages/' . $page . '.php'))
			{
				error_log('Page ' . $page . ' doesn\'t exist');
				show_404();
			}
			$this->load->helper('html');
			$data['title'] = ucfirst($page); // Capitalise the first letter
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/' . $page . '.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
