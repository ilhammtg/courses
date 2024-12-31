<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan semua data kursus
    public function get_all_courses()
{
    $this->db->select('courses.title, course_materials.file_path'); // Pastikan kolom benar
    $this->db->from('courses, course_materials'); // Sesuaikan nama tabel
    return $this->db->get()->result_array();
}

    // Fungsi untuk mendapatkan data kursus berdasarkan ID
    public function getCourseById($id)
    {
        return $this->db->get_where('course_materials', ['id' => $id])->row_array();
    }

    // Fungsi untuk menambah data kursus baru
    public function addCourse()
    {
        if ($this->input->post()) {
            $config['upload_path'] = './assets/img/courses_image/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // Maksimum 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image_path = 'assets/img/courses_image/' . $upload_data['file_name'];

                $data_insert = [
                    'title' => $this->input->post('courses'),
                    'price' => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'image' => $image_path,
                ];

                $this->db->insert('course_materials', $data_insert);
            } else {
                return 'default.jpg';
            }
        }
    }

    // Fungsi untuk mengupdate data kursus
    public function updateCourse($id)
    {
        $data = [
            'title' => $this->input->post('courses'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description')
        ];

        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './assets/img/courses_image/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // Maksimum 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $data['image'] = 'assets/img/courses_image/' . $upload_data['file_name'];
            }
        }

        $this->db->where('id', $id);
        $this->db->update('course_materials', $data);
    }

    // Fungsi untuk menghapus data kursus
    public function deletecourses($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('course_materials');
    }
}
