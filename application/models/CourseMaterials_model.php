<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CourseMaterials_model extends CI_Model
{

    public function getAllCourseMaterials()
    {
        $this->db->select('course_materials.*, courses.title as course_title');
        $this->db->from('course_materials');
        $this->db->join('courses', 'course_materials.course_id = courses.id');
        return $this->db->get()->result_array();
    }

    public function addCourseMaterial($data)
    {
        return $this->db->insert('course_materials', $data);
    }

    public function getCourseMaterialById($id)
    {
        return $this->db->get_where('course_materials', ['id' => $id])->row_array();
    }

    public function updateCourseMaterial($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('course_materials', $data);
    }

    public function deleteCourseMaterial($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('course_materials');
    }

    public function getAllCourses()
    {
        return $this->db->get('courses')->result_array();
    }
}
