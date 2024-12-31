<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Courses_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('templates/home_header.php', $data);
        $this->load->view('templates/home_navbar.php', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer.php', $data);
    }

    public function optionlogin()
    {
        $data['title'] = 'Login Option';
        $this->load->view('templates/home_header.php', $data);
        $this->load->view('templates/home_navbar.php', $data);
        $this->load->view('home/optionlogin', $data);
        $this->load->view('templates/home_footer.php', $data);
    }
    public function courses()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('course', 'Course', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('resi_pembayaran', 'Resi Pembayaran', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Courses';
            $data['courses'] = $this->Courses_model->getAllCourses();

            $this->load->view('templates/home_header.php', $data);
            $this->load->view('templates/home_navbar.php', $data);
            $this->load->view('home/courses', $data);
            $this->load->view('templates/home_footer.php', $data);
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'course' => $this->input->post('course'),
                'price' => $this->input->post('price'),
                'resi_pembayaran' => $this->input->post('resi_pembayaran'),
                'status' => $this->input->post('status')
            ];

            $this->db->insert('student_pending', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Successful!</div>');
            redirect('home/courses');
        }
    }
    public function aboutus()
    {
        $data['title'] = 'About Us';
        $this->load->view('templates/home_header.php', $data);
        $this->load->view('templates/home_navbar.php', $data);
        $this->load->view('home/aboutus', $data);
        $this->load->view('templates/home_footer.php', $data);
    }
}
