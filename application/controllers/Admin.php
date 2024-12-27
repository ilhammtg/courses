<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
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
}
