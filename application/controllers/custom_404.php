<?php

	class custom_404 extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		public function view()
		{
			$this->load->model('Recipe_style_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
			    $this->Recipe_style_model->setRecipeStyle();
			    $preferredRecipeStyle = 'narrative';
			}

			$data['defaultStyle'] = $preferredRecipeStyle;

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/custom_404.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
