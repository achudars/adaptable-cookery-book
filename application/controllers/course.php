<?php
	/**
	 * Controller used to display recipes that belong to a give course;
	 * main, starter, dessert etc.
	 */
	class Course extends CI_Controller
	{
		/**
		 * Function called when viewing a course.
		 *
		 * @param $courseId : Integer/Null - When integer, course data is feteched fron
		 *                    from the database and displayed to the user.
		 *                    If null, WE'LL SEND THEM TO THE LANDING PAGE
		 *
		 */
		public function view($courseId = null)
		{
			if(isset($courseId))
			{
			}

			$data['title'] = 'Course Title From Database';

			$data['courseName']  = 'Main Courses';
			$data['courseImage'] = 'http://www.brake.co.uk/_assets/720xn/Main_Course_Poster_720x430px_1.jpg';

			$data['recipes'] = array(
				array("Home Brew","31","100","main dish","1",                   "http://bit.ly/1fkKR4y"),
				array("Doggy Cake","74","240","main course","2",                  "http://bit.ly/1jT90mm"),
				array("California pizza","97","130","main dish","3",            "http://bit.ly/1nRcRxJ"),
				array("Lasagna","89","110","main dish","4",                     "http://bit.ly/1ffWb3r"),
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

			$this->load->model('Recipe_style_model');
			$this->load->model('Breadcrumb_model');

			$preferredRecipeStyle = $this->Recipe_style_model->getRecipeStyle();

			if(!$preferredRecipeStyle)
			{
				$this->Recipe_style_model->setRecipeStyle();
				$preferredRecipeStyle = 'narrative';
			}

			$data['defaultStyle'] = $preferredRecipeStyle;

			$data['breadcrumb'] = $this->Breadcrumb_model->generateBreadcrumb('course');
			$data['breadcrumb']['Course: ' . $data['courseName']] = base_url() . 'course/' . $data['courseName'];

			$this->load->helper('html');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/course.php', $data);
			$this->load->view('templates/footer.php', $data);
		}
	}
