<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        is_logged_in(); // Pastikan fungsi ini sudah terdefinisi di helper atau di tempat lain
        $this->load->model('Courses_model'); // Pastikan model ini tersedia
=======
        // Memastikan pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('authuser/login'); // Redirect ke halaman login jika tidak terautentikasi
        }
>>>>>>> edb51df161b0226810e9473ef1cd3d7c9f89d4c9
    }

    // Fungsi mendapatkan semua data materi
    public function getAllMaterials()
    {
        $this->db->select('course_id, file_path'); // Sesuaikan kolom dengan tabel Anda
        $this->db->from('course_materials'); // Pastikan nama tabel benar
        return $this->db->get()->result_array();
    }

    // Fungsi index
    public function index()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/index');
    }

    // Fungsi untuk menampilkan daftar kursus
    public function courses()
    {
        // Ambil data dari model
        $data['materials'] = $this->Courses_model->get_all_courses();

        // Load view dengan data
        $this->load->view('templates/nav-admin');
        $this->load->view('user/courses', $data);
    }

    // Fungsi untuk halaman user
    public function user()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/user');
    }

    // Fungsi untuk halaman transaksi
    public function transaction()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/transaction');
    }

    // Fungsi untuk halaman laporan
    public function report()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/report');
    }
}
