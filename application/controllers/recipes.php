<?php

	/**
	 * Controller used to display a list of recipes stored in the application.
	 */
	class Recipes extends CI_Controller
	{
		/**
		 * Funciton used to display the recipes in the
		 * system in their list form.
		 */
		public function viewList()
		{
			$data['title']        = 'View All Recipes: List View';
			$data['defaultStyle'] = $this->getRecipeStyle();

			$data['recipes'] = array(
				array("Home Brew","31","100","main dish","1",                   "http://bit.ly/1fkKR4y"),
				array("Doggy Cake","74","240","main course","2",                  "http://bit.ly/1jT90mm"),
				array("California pizza","97","130","main dish","3",            "http://bit.ly/1nRcRxJ"),
				array("Lasagna","89","110","main dish","4",                     "http://bit.ly/1ffWb3r"),
				array("Persian Dinner","4","380","dessert","5",               "http://bit.ly/1mf5hOc"),
				array("Proper Beef","42","350","dessert","4",                 "http://bit.ly/Nf3493"),
				array("Mushroom Pie","44","240","main course","3",                "http://bit.ly/1h1JhVd"),
				array("Extreme Cajun Flamethrower","73","170","main dish","2",  "http://bit.ly/Nf360R"),
				array("Thai Sweet Crispy Rice Cakes","16","150","main dish","1","http://bit.ly/1c5nWpB"),
				array("Puffed Rice Cake","26","160","main course","2",            "http://bit.ly/1hbxzpJ"),
				array("Tapenade","28","220","main course","4",                    "http://bit.ly/1hbxen4"),
				array("Drummond's Big Sausage","74","290","main dish","5",      "http://bit.ly/1bqoco0"),
				array("Prawn and Cauliflower Curry","50","340","main dish","23", "http://bit.ly/Nf3mwE"),
				array("Singapore noodles","0","1","main course","4",              "http://bit.ly/1bqog7m"),
				array("Singarich noodles","10","100","main dish","0",           "http://bit.ly/1hbxPVG")
			);

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipes_list.php', $data);
			$this->load->view('templates/footer.php', $data);
		}

		/**
		 * Function used to display the recipes in the
		 * system in their grid form.
		 */
		public function viewGrid()
		{
			$data['title']        = 'View All Recipes: Grid View';
			$data['defaultStyle'] = $this->getRecipeStyle();

			$data['recipes'] = array(
				array("Home Brew","31","100","main dish","1",                   "http://bit.ly/1fkKR4y"),
				array("Doggy Cake","74","240","main course","2",                  "http://bit.ly/1jT90mm"),
				array("California pizza","97","130","main dish","3",            "http://bit.ly/1nRcRxJ"),
				array("Lasagna","89","110","main dish","4",                     "http://bit.ly/1ffWb3r"),
				array("Persian Dinner","4","380","dessert","5",               "http://bit.ly/1mf5hOc"),
				array("Proper Beef","42","350","dessert","4",                 "http://bit.ly/Nf3493"),
				array("Mushroom Pie","44","240","main course","3",                "http://bit.ly/1h1JhVd"),
				array("Extreme Cajun Flamethrower","73","170","main dish","2",  "http://bit.ly/Nf360R"),
				array("Thai Sweet Crispy Rice Cakes","16","150","main dish","1","http://bit.ly/1c5nWpB"),
				array("Puffed Rice Cake","26","160","main course","2",            "http://bit.ly/1hbxzpJ"),
				array("Tapenade","28","220","main course","4",                    "http://bit.ly/1hbxen4"),
				array("Drummond's Big Sausage","74","290","main dish","5",      "http://bit.ly/1bqoco0"),
				array("Prawn and Cauliflower Curry","50","340","main dish","23", "http://bit.ly/Nf3mwE"),
				array("Singapore noodles","0","1","main course","4",              "http://bit.ly/1bqog7m"),
				array("Singarich noodles","10","100","main dish","0",           "http://bit.ly/1hbxPVG")
			);

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/recipes_grid.php', $data);
			$this->load->view('templates/footer.php', $data);
		}

		/**
		 * Private function used to determine the user's preference on recipe
		 * style (for use in the header).
		 *
		 * @return - $preferredRecipeStyle : The user's recipe style
		 */
		private function getRecipeStyle()
		{
			$this->load->model('Recipe_style_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
				$this->Recipe_style_model->setRecipeStyle();
				$preferredRecipeStyle = 'narrative';
			}

			return $preferredRecipeStyle;
		}
	}
