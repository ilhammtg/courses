<?php
class Home_model extends CI_Model
{
    function tambah()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'course' => $this->input->post('course'),
            'price' => $this->input->post('price'),
            'resi_pembayaran' => $this->input->post('resi_pembayaran'),
            'status' => $this->input->post('status')
        );
        $this->db->insert('student', $data);
    }

    // Function to fetch data of a specific student
    function get_one($id)
    {
        $indeks = array('id_student' => $id);
        return $this->db->get_where('student', $indeks);
    }
}
