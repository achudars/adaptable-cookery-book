<?php

class Course_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Loads a list of all the types of courses, and their basic information
     *
     * @return Array[Object] [{courseid, name, description, recipes}, ...]
     */
    public function getAllCourses() {
        $this->db->select('courseid, name, description')
                ->from('course')
                ->order_by('name', 'asc');

        return $this->db->get()->result();
    }

    /**
     * Loads information about a course
     *
     * @param String $courseName
     * @return Object {courseid, name, description}
     * @throws Exception if a course does not exist
     */
    public function getCourseInfo($courseName) {
        $this->db->select('name, description')
                ->from('course')
                ->where(['name' => $courseName])
                ->limit(1);

        $q = $this->db->get();

        if (empty($q))
        {
            throw new Exception('That course could not be found.', 404);
        } else {
            return $q->result()[0];
        }
    }

	public function getRecipes($courseName)
	{
		$this->db->select('recipe.recipeid, recipe.name, recipe.imageurl, recipe.serves, recipe.calories, recipe.preptime, course.name AS courseName');
		$this->db->from('recipe');
		$this->db->join('course', 'course.courseid = recipe.courseid');
		$this->db->where('course.name', $courseName);

		$queryResult = $this->db->get();

		if(!$queryResult)
		{
			throw new Exception('There are no recipes for course \'' . $courseName . '\'', 404);
		}
		else
		{
			return $queryResult->result();
		}
	}
}
