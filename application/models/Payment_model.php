<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{

    public function create($data)
    {
        $this->db->insert('payments', $data);
    }

    public function getPendingPayments()
    {
        return $this->db->get_where('payments', ['status' => 'Pending'])->result_array();
    }

    public function updateStatus($payment_id, $status)
    {
        $this->db->where('id', $payment_id);
        return $this->db->update('payments', ['status' => $status]);
    }


    public function getAllPayments()
    {
        $this->db->select('payments.id, users.name as user_name, courses.title as course_name, payments.amount, payments.status');
        $this->db->from('payments');
        $this->db->join('users', 'users.id = payments.user_id');
        $this->db->join('courses', 'courses.id = payments.course_id');
        return $this->db->get()->result_array();
    }
}
