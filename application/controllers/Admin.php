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
        $this->load->model('datastudent_model');
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

    public function studentManagement()
    {
        $data['title'] = 'Student Management';
        $data['studentManage'] = $this->datastudent_model->getAllStudents();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('admin/managestudent', $data);
        $this->load->view('templates/admin_footer');
    }

    // Method untuk menambahkan mahasiswa baru
    public function addStudent()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed to add student. Please check your input.</div>');
            redirect('admin/studentManagement');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'action' => $this->input->post('action'),
            ];
            $this->datastudent_model->addStudent($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">New student added successfully!</div>');
            redirect('admin/studentManagement');
        }
    }

    // Method untuk mengedit mahasiswa
    public function editStudent($id)
    {
        $data['title'] = 'Edit Student';
        $data['student'] = $this->datastudent_model->getStudentById($id);

        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/editStudent', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'action' => $this->input->post('action'),
            ];
            $this->datastudent_model->updateStudent($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Student data updated successfully!</div>');
            redirect('admin/studentManagement');
        }
    }

    // Method untuk menghapus mahasiswa
    public function deleteStudent($id)
    {
        $this->datastudent_model->deleteStudent($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Student deleted successfully!</div>');
        redirect('admin/studentManagement');
    }
}
