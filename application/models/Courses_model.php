<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses_model extends CI_Model
{
    public function getAllCourses()
    {
        return $this->db->get('courses')->result_array(); // Ambil semua data kursus
    }
}
