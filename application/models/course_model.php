<?php

class CourseModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Loads a list of all the types of courses, and their basic information
     * 
     * @return Array[Object] [{courseid, name, description}, ...]
     */
    public function getAllCourses() {
        $this->db->select('courseid, name, description')
                ->from('course')
                ->order_by('name', 'asc');
        
        return $this->db->get();
    }
    
    /**
     * Loads information about a course
     * 
     * @param int $courseid
     * @return Object {courseid, name, description}
     * @throws Exception if a course does not exist
     */
    public function getCourseInfo($courseid) {
        $this->db->select('name, description')
                ->from('course')
                ->where(['courseid' => $courseid])
                ->limit(1);
        
        $q = $this->db->get();
        
        if (empty($q))
        {
            throw new Exception('That course could not be found.', 404);
        } else {
            return $q->result()[0];
        }
    }
}