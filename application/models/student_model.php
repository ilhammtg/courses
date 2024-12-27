<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
    public function getAvailableCourses()
    {
        return $this->db->get('courses')->result();
    }

    public function enrollCourse($userId, $courseId)
    {
        $data = [
            'user_id' => $userId,
            'course_id' => $courseId,
            'percentage' => 0
        ];
        $this->db->insert('course_progress', $data);
    }

    public function getCourseProgress($userId)
    {
        $this->db->select('courses.title, course_progress.percentage');
        $this->db->from('course_progress');
        $this->db->join('courses', 'courses.id = course_progress.course_id');
        $this->db->where('course_progress.user_id', $userId);
        return $this->db->get()->result();
    }
}
