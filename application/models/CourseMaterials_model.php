<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CourseMaterials_model extends CI_Model
{

    // Get all course materials with course title
    public function getAllCourseMaterials()
    {
        $this->db->select('course_materials.*, courses.title as course_title');
        $this->db->from('course_materials');
        $this->db->join('courses', 'course_materials.course_id = courses.id');
        return $this->db->get()->result_array();
    }

    // Add new course material
    public function addCourseMaterial($data)
    {
        return $this->db->insert('course_materials', $data);
    }

    // Get course material by ID
    public function getCourseMaterialById($id)
    {
        return $this->db->get_where('course_materials', ['id' => $id])->row_array();
    }

    // Update course material
    public function updateCourseMaterial($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('course_materials', $data);
    }

    // Delete course material
    public function deleteCourseMaterial($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('course_materials');
    }

    // Get all courses for dropdown select
    public function getAllCourses()
    {
        return $this->db->get('courses')->result_array();
    }
}
