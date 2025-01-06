<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datastudent_model extends CI_Model
{

    public function getAllStudents()
    {
        return $this->db->get('student_pending')->result_array();
    }

    public function addStudent($data)
    {
        return $this->db->insert('student_pending', $data);
    }

    public function getStudentById($id)
    {
        return $this->db->get_where('student_pending', ['id' => $id])->row_array();
    }

    public function updateStudent($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('student_pending', $data);
    }

    public function deleteStudent($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('studentManage');
    }
}
