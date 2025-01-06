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
        $this->load->model('Payment_model');
        $this->load->model('CourseMaterials_model');
        $this->load->model('User_model');
        $this->load->model('Report_model');
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
        $data = ['title' => 'Admin Dashboard'];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('admin/dashboard', $data);
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

    public function payments()
    {
        $data['title'] = 'List Payments';
        $data['payments'] = $this->Payment_model->getAllPayments(); // Ambil semua data pembayaran

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('admin/payment', $data);
        $this->load->view('templates/admin_footer', $data);
    }


    public function verify_payment($payment_id, $status)
    {
        if ($this->Payment_model->updateStatus($payment_id, $status)) {
            $this->session->set_flashdata('success', 'Payment status updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update payment status.');
        }

        redirect('admin/payments');
    }

    public function courseMaterials()
    {
        $data['title'] = 'Course Materials Management';
        $data['materials'] = $this->CourseMaterials_model->getAllCourseMaterials();
        $data['courses'] = $this->CourseMaterials_model->getAllCourses();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('admin/courseMaterials', $data);
        $this->load->view('templates/admin_footer');
    }

    public function addCourseMaterial()
    {
        $this->form_validation->set_rules('course_id', 'Course', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed to add course material. Please check your input.</div>');
            redirect('admin/courseMaterials');
        } else {
            $config['upload_path'] = './assets/img/materi/';
            $config['allowed_types'] = 'pdf|doc|docx|mp4|mkv';
            $config['max_size'] = 10240; // Maksimal 10 MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_path')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                redirect('admin/courseMaterials');
            } else {
                $fileData = $this->upload->data();
                $filePath = './assets/img/materi/' . $fileData['file_name'];

                $data = [
                    'course_id' => $this->input->post('course_id'),
                    'type' => $this->input->post('type'),
                    'file_path' => $filePath,
                ];

                $this->CourseMaterials_model->addCourseMaterial($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">New course material added successfully!</div>');
                redirect('admin/courseMaterials');
            }
        }
    }

    public function editCourseMaterial($id)
    {
        $data['title'] = 'Edit Course Material';
        $data['material'] = $this->CourseMaterials_model->getCourseMaterialById($id);
        $data['courses'] = $this->CourseMaterials_model->getAllCourses();

        $this->form_validation->set_rules('course_id', 'Course', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/editCourseMaterial', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './assets/img/materi/';
            $config['allowed_types'] = 'pdf|doc|docx|mp4|mkv';
            $config['max_size'] = 10240; // Maksimal 10 MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_path')) {
                $fileData = $this->upload->data();
                $filePath = './assets/img/materi/' . $fileData['file_name'];

                // Hapus file lama jika file baru diunggah
                if (file_exists($data['material']['file_path'])) {
                    unlink($data['material']['file_path']);
                }
            } else {
                $filePath = $this->input->post('old_file_path');
            }

            $updateData = [
                'course_id' => $this->input->post('course_id'),
                'type' => $this->input->post('type'),
                'file_path' => $filePath,
            ];

            $this->CourseMaterials_model->updateCourseMaterial($id, $updateData);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Course material updated successfully!</div>');
            redirect('admin/courseMaterials');
        }
    }

    public function deleteCourseMaterial($id)
    {
        $this->CourseMaterials_model->deleteCourseMaterial($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Course material deleted successfully!</div>');
        redirect('admin/courseMaterials');
    }

    public function users()
    {
        $data['title'] = 'Users Management';
        $search = $this->input->get('search');
        $this->load->model('User_model');

        $data['users'] = $this->User_model->getAllUsers($search);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('admin/usersManagement', $data);
        $this->load->view('templates/admin_footer');
    }

    public function editUser($id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->User_model->getUserById($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_nav', $data);
            $this->load->view('admin/users_edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $is_active = $this->input->post('is_active') ? 1 : 0;
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'is_active' => $is_active
            ];

            $this->User_model->updateUser($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">User updated successfully!</div>');
            redirect('admin/users');
        }
    }

    public function deleteUser($id)
    {
        $this->User_model->deleteUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">User deleted successfully!</div>');
        redirect('admin/users');
    }

    public function report()
    {
        $data['title'] = 'Payment Report';

        // Get filter dates
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Fetch data with optional date filter
        $data['reports'] = $this->Report_model->getReports($start_date, $end_date);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('templates/admin_footer');
    }

    public function reportpdf()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Ambil data dari model
        $this->load->model('Report_model');
        $reports = $this->Report_model->getReports($start_date, $end_date);

        // Kirim data ke view
        $data['reports'] = $reports;
        $html = $this->load->view('admin/payment_report_pdf', $data, true);

        // Generate PDF menggunakan helper
        generate_pdf($html, 'Payment_Report_' . date('Ymd'));
    }
}
