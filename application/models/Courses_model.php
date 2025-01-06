<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses_model extends CI_Model
{
    public function getAllCourses()
    {
        return $this->db->get('courses')->result_array();
    }

    public function getCourseById($id)
    {
        return $this->db->get_where('courses', ['id' => $id])->row_array();
    }

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

                $this->db->insert('courses', $data_insert);
            } else {
                return 'default.jpg';
            }
        }
    }

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
        $this->db->update('courses', $data);
    }

    public function deletecourses($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('courses');
    }
}
