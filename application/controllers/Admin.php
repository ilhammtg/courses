<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Courses_model');
        $this->isAuthorized();
    }

    private function isAuthorized()
    {
        if ($this->session->userdata('role_id') != 1) {
            redirect('user');
        }
    }

    public function index()
    {
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_nav');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/admin_footer');
    }
    public function managecourses()
    {
        $data['title'] = 'Manage Courses';

        // Ambil data dari database untuk ditampilkan di view
        $data['coursesManage'] = $this->db->get('courses')->result_array();

        // Cek jika ada request POST untuk tambah data
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New course added!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }

            redirect('admin/managecourses');
        }

        // Load tampilan
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('admin/managecourses', $data);
        $this->load->view('templates/admin_footer');
    }

    public function editcourses($id)
    {
        $data['title'] = 'Edit Course';
        $data['course'] = $this->Courses_model->getCourseById($id);

        $this->form_validation->set_rules('courses', 'Course Title', 'required');
        $this->form_validation->set_rules('price', 'Course Price', 'required');
        $this->form_validation->set_rules('description', 'Course Description', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_nav', $data);
            $this->load->view('admin/editcourses', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->Courses_model->updateCourse($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Course updated!</div>');
            redirect('admin/managecourses');
        }
    }



    function deletecourses()
    {
        $id = $this->uri->segment(3);
        $this->Courses_model->deletecourses($id);
        redirect('admin/managecourses');
    }
}
