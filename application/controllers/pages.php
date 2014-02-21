<?php

	class Pages extends CI_Controller
	{

		public function view($page = "recipe")
		{
			if(!file_exists('application/views/pages/' . $page . '.php'))
			{
				error_log('Page ' . $page . ' doesn\'t exist');
				show_404();
			}
			$this->load->helper('html');
			$data['title'] = ucfirst($page); // Capitalise the first letter

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
			/*$data['recipe_name'] = "Recipe";
			$data['recipe_time'] = "50";
			$data['recipe_cal'] = "333";*/

			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/' . $page . '.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
