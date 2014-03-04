<?php

	/**
	 * Model created to allow controller classes to query
	 * and set the user's preferred way of viewing recipes.
	 */
	class Recipe_style_model extends CI_Model {

		function __construct()
		{
			parent::__construct();
		}

		/**
		 * Function to read the cookie and return the user's style preference.
		 * @return String : The user's style preference.
		 */
		public function getRecipeStyle()
		{
			return $this->input->cookie('preferredRecipeStyle');
		}

		/**
		 * Function used to set the user's style preference.
		 * @param $style : String - The chosen style. Defaults to narrative.
		 */
		public function setRecipeStyle($style = 'narrative')
		{
			$this->input->set_cookie(array(
				'name'   => 'preferredRecipeStyle',
				'value'  => $style,
				'expire' => time() + (10 * 365 * 24 * 60 * 60),
			));
		}
	}
