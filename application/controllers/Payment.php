<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect('authuser/login');
        }
        $this->load->model('Courses_model');
        $this->load->model('Payment_model');
    }

    public function form($course_id)
    {
        $data['title'] = 'Payment';

        $course = $this->Courses_model->getCourseById($course_id);

        // Jika kursus tidak ditemukan, tampilkan error 404
        if (!$course) {
            show_404();
        }

        // Siapkan data untuk tampilan
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_navbar', $data);
        $this->load->view('home/payments', ['course' => $course]);
        $this->load->view('templates/home_footer', $data);
    }

    // Menyimpan pembayaran yang telah di-submit
    public function submit()
    {
        $data['title'] = 'Payment Submission';

        // Validasi form upload bukti pembayaran
        $this->load->library('form_validation');
        $this->form_validation->set_rules('course_id', 'Course ID', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/home_header', $data);
            $this->load->view('templates/home_navbar', $data);
            $this->load->view('home/payments', ['error' => 'Invalid Course ID']);
            $this->load->view('templates/home_footer', $data);
            return;
        }

        // Konfigurasi upload file
        $config['upload_path'] = './assets/img/payments_proof/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // Maksimal 2MB

        $this->load->library('upload', $config);

        // Jika upload gagal
        if (!$this->upload->do_upload('proof')) {
            $error = $this->upload->display_errors();
            $course = $this->Courses_model->getCourseById($this->input->post('course_id'));

            $this->load->view('templates/home_header', $data);
            $this->load->view('templates/home_navbar', $data);
            $this->load->view('home/payments', ['course' => $course, 'error' => $error]);
            $this->load->view('templates/home_footer', $data);
            return;
        }

        // Ambil data file yang diupload
        $file_data = $this->upload->data();

        // Ambil data kursus berdasarkan ID yang dipilih
        $course_id = $this->input->post('course_id');
        $course = $this->Courses_model->getCourseById($course_id);

        if (!$course) {
            $this->load->view('templates/home_header', $data);
            $this->load->view('templates/home_navbar', $data);
            $this->load->view('home/payments', ['error' => 'Invalid course ID']);
            $this->load->view('templates/home_footer', $data);
            return;
        }

        // Simpan data pembayaran ke database
        $payment_data = [
            'user_id' => $this->session->userdata('user_id'),
            'course_id' => $course_id,
            'amount' => $course['price'], // Ambil harga kursus
            'proof' => './assets/img/payments_proof/' . $file_data['file_name'],
            'status' => 'Pending', // Status pembayaran awal adalah Pending
        ];

        $this->Payment_model->create($payment_data);

        // Set flashdata sukses dan redirect ke dashboard
        $this->session->set_flashdata('success', 'Payment submitted. Please wait for admin verification.');
        redirect('user/index');
    }
}
