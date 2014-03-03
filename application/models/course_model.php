<?php

class CourseModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllCourses($courseid) {
        $this->db->select('courseid, name, description')
                ->from('course')
                ->order_by('name', 'asc');
        
        return $this->db->get();
    }
    
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
            return $q->result();
        }
    }
}