<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends Ci_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isAuthorized('student');
        $this->load->model('Student_model');
    }

    public function viewCourses()
    {
        $data['courses'] = $this->Student_model->getAvailableCourses();
        $this->load->view('student/view_courses', $data);
    }

    public function enrollCourse($id)
    {
        $this->Student_model->enrollCourse($this->session->userdata('user_id'), $id);
        redirect('student/viewCourses');
    }

    public function viewProgress()
    {
        $data['progress'] = $this->Student_model->getCourseProgress($this->session->userdata('user_id'));
        $this->load->view('student/view_progress', $data);
    }
}
