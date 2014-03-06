<?php

	/**
	 * Controller used to route ajax requests for the application
	 */
	class Ajax extends CI_Controller
	{
		/**
		 * Function called from JS that changes the user's
		 * recipe style preferences.
		 */
		public function changeRecipeStyle()
		{
			if(!isset($_POST['recipeStyle']))
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received incorrect data when style change requested. Expected new style, data not sent.');
				header('HTTP/1.1 400 Bad Request');
				return;
			}

			$this->load->model('Recipe_style_model');
			$this->Recipe_style_model->setRecipeStyle($_POST['recipeStyle']);
		}
	}
