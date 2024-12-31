<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    public function getReports($start_date = null, $end_date = null)
    {
        $this->db->select('payments.id, users.name as user_name, users.email, courses.title as course_name, payments.amount, payments.created_at');
        $this->db->from('payments');
        $this->db->join('users', 'payments.user_id = users.id');
        $this->db->join('courses', 'payments.course_id = courses.id');

        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('payments.created_at >=', $start_date);
            $this->db->where('payments.created_at <=', $end_date);
        }

        return $this->db->get()->result_array();
    }
}
