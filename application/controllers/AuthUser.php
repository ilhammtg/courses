<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Courses_model');
    }

    public function register()
    {
        // Tangkap parameter 'course' dari URL jika ada
        $selected_course = $this->input->get('course');

        $courses = $this->Courses_model->getAllCourses();

        if ($this->input->post()) {
            // Validasi form
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if ($this->form_validation->run() === TRUE) {
                $data = $this->input->post();
                $data['selected_course'] = $data['selected_course'] ?? $selected_course;

                $this->User_model->register($data);

                $this->session->set_flashdata('success', 'Registration successful! Please log in.');
                redirect('authuser/login?course=' . $data['selected_course']);
            }
        }

        // Kirimkan data selected_course dan courses ke view
        $this->load->view('auth/user_register', ['selected_course' => $selected_course, 'courses' => $courses]);
    }

    public function login()
    {
        // Tangkap parameter 'course' dari URL jika ada
        $selected_course = $this->input->get('course');

        if ($this->input->post()) {
            // Validasi form
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === TRUE) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                // Periksa kredensial user
                $user = $this->User_model->get_user_by_email($email);

                if ($user && password_verify($password, $user['password'])) {
                    // Set session data
                    $this->session->set_userdata([
                        'user_id' => $user['id'],
                        'user_name' => $user['name'],
                        'logged_in' => TRUE
                    ]);

                    if ($selected_course) {
                        redirect('payment/form/' . $selected_course);
                    }

                    redirect('user');
                } else {
                    $this->session->set_flashdata('error', 'Invalid email or password');
                }
            }
        }

        $this->load->view('auth/user_login');
    }

    public function logout()
    {
        $this->session->unset_userdata(['user_id', 'user_name', 'logged_in']);
        $this->session->set_flashdata('success', 'You have been logged out.');
        redirect('authuser/login');
    }

    public function blocked()
    {
        // Tampilkan halaman akses ditolak
        $this->load->view('auth/user_blocked');
    }
}
