<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('templates/home_header.php', $data);
        $this->load->view('templates/home_navbar.php', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer.php', $data);
    }
    public function courses()
    {
        $data['title'] = 'Courses';
        $this->load->view('templates/home_header.php', $data);
        $this->load->view('templates/home_navbar.php', $data);
        $this->load->view('home/courses', $data);
        $this->load->view('templates/home_footer.php', $data);
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
