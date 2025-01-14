<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function register($data)
    {
        $user_data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'selected_course' => $data['selected_course'], // Pastikan ini terisi
        ];
        $this->db->insert('users', $user_data);
    }


    public function get_user_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function getAllUsers($search = null)
    {
        $this->db->select('users.*, courses.title as course_title');
        $this->db->from('users');
        $this->db->join('courses', 'users.selected_course = courses.id', 'left');

        // Logic search
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('users.name', $search);
            $this->db->or_like('users.email', $search);
            $this->db->or_like('users.phone', $search);
            $this->db->or_like('courses.title', $search);
            $this->db->group_end();
        }

        return $this->db->get()->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
