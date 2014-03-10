<?php

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		public function view()
		{
			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/home.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
