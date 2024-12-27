<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getAllUsers()
    {
        return $this->db->get('users')->result();
    }

    public function deleteUser($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }

    public function getAllCourses()
    {
        return $this->db->get('courses')->result();
    }

    public function deleteCourse($id)
    {
        $this->db->delete('courses', ['id' => $id]);
    }
}
