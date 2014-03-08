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

		public function generateBreadcrumb($siteSection)
		{
			if(empty($siteSection))
			{
				error_log(__FILE__ . ':' . __LINE__ . ' - Received empty site section. Breadcrumb not generating.');
				return;
			}

			$links = array(
				'Home' => base_url() . 'recipe/grid-view',
			);

			switch(strtolower($siteSection))
			{
				case 'recipe':
					$links['Recipes'] = base_url() . 'recipe/grid-view';
					break;

				case 'course':
					$links['Courses'] = base_url() . 'courses/';
					break;
			}

			return $links;
		}
	}
