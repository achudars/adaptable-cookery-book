<?php

	/**
	 * Controller used to route ajax requests for the application
	 */
	class Ajax extends CI_Controller
	{
		public function changeRecipeStyle()
		{
			if(!isset($_POST['recipeStyle']))
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received incorrect data when style change requested. Expected new style, data not sent.');
				header('HTTP/1.1 400 Bad Request');
				return;
			}

			$this->input->set_cookie(array(
				'name'   => 'preferredRecipeStyle',
				'value'  => $_POST['recipeStyle'],
				'expire' => time() + (10 * 365 * 24 * 60 * 60),
			));
		}
	}
