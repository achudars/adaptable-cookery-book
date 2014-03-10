<?php

	/**
	 * Model used to handle creation of the site's
	 * breadcrumb navigation. Heirachy, not history.
	 */
	class Breadcrumb_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * Function to return an array of links for the site
		 * breadcrumb depending on the page that is passed
		 * to the function.
		 *
		 * @param $siteSectin: String - The current location of the user.
		 * @return $links: Array - An array containing the required breadcrumbs.
		 */
		public function generateBreadcrumb($siteSection)
		{
			if(empty($siteSection))
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received empty site section. Breadcrumb not generating.');
				return;
			}

			$links = array(
				'Home' => base_url() . 'recipes/',
			);

			switch(strtolower($siteSection))
			{
				case 'recipe':
					$links['Recipes'] = base_url() . 'recipes/';
					break;

				case 'course':
				case 'courses':
					$links['Courses'] = base_url() . 'courses/';
					break;
			}

			return $links;
		}
	}
