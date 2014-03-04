<?php

	/**
	 * Controller used to route ajax requests for the application
	 */
	class Ajax extends CI_Controller
	{
		public function changeRecipeStyle()
		{
			if(!isset($_POST['recispeStyle']))
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received incorrect data when style change requested. Expected new style, data not sent.');
				header('HTTP/1.1 400 Bad Request');
				return;
			}


		}
	}
