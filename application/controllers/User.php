<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/index');
    }
    public function courses()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/courses');
    }
    public function user()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/user');
    }
    public function transaction()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/transaction');
    }
    public function report()
    {
        $this->load->view('templates/nav-admin');
        $this->load->view('user/report');
    }
}
