<?php

	class Recipe_style_model extends CI_Model {

		function __construct()
		{
			parent::__construct();
		}

		public function getRecipeStyle()
		{
			return $this->input->cookie('preferredRecipeStyle');
		}

		public function setRecipeStyle($style = 'narrative')
		{
			$this->input->set_cookie(array(
				'name'   => 'preferredRecipeStyle',
				'value'  => $style,
				'expire' => time() + (10 * 365 * 24 * 60 * 60),
			));
		}
	}
