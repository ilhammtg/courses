<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materialcourses_model extends CI_Model
{


    // Fungsi untuk mendapatkan data kursus berdasarkan ID
    public function getCourseById($id)
    {
        $this->db->select('courses.title, course_materials.course_id');
        $this->db->from('courses');
        $this->db->join('course_materials', 'course_materials.course_id = courses.id');
        $this->db->where('courses.id', $id);
        return $this->db->get()->row_array();
    }
    // Fungsi mendapatkan semua tebel
    public function getAllMaterials()
    {
        // Pastikan mengambil kolom title dan file_path
        return $this->db
            ->select('courses.id, courses.title, course_materials.file_path')
            ->from('courses')
            ->join('course_materials', 'course_materials.course_id = courses.id', 'left')
            ->get()
            ->result_array();
    }



    // Fungsi untuk menambah data kursus baru
    public function addCourse()
    {
        // Ambil data dari form untuk tabel courses
        $data_courses = [
            'title' => $this->input->post('title'),
            'price' => $this->input->post('price'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insert data ke tabel 'courses' terlebih dahulu
        $this->db->insert('courses', $data_courses);
        $course_id = $this->db->insert_id(); // Ambil ID course yang baru ditambahkan

        // Cek apakah file diunggah
        if (!empty($_FILES['materi']['name'])) {
            $config['upload_path'] = './assets/materi/'; // Direktori upload
            $config['allowed_types'] = 'pdf|docx|doc|mp4|mkv'; // Format file yang diizinkan
            $config['max_size'] = 204800; // Maksimal 200MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('materi')) {
                $upload_data = $this->upload->data();
                $file_path = 'assets/materi/' . $upload_data['file_name'];

                // Data untuk tabel course_materials
                $data_materials = [
                    'course_id' => $course_id,
                    'file_path' => $file_path,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                // Insert data ke tabel 'course_materials'
                $this->db->insert('course_materials', $data_materials);
            } else {
                // Tangani error upload
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);

                // Jika ada error, hapus data course yang sudah ditambahkan sebelumnya
                $this->db->delete('courses', ['id' => $course_id]);
                redirect('admin/addcourse');
                return;
            }
        }

        // Berikan feedback kepada pengguna
        $this->session->set_flashdata('success', 'Kursus berhasil ditambahkan!');
        redirect('admin/courses');
    }


    // Fungsi untuk mengupdate data kursus
    public function updateCourse($id)
    {
        // Ambil data dari form
        $data_courses = [
            'title' => $this->input->post('title'),
            'price' => $this->input->post('price'),
        ];

        // Data untuk tabel course_materials
        $data_materials = [];

        // Cek apakah file diunggah
        if (!empty($_FILES['materi']['name'])) {
            $config['upload_path'] = './assets/materi/'; // Direktori upload
            $config['allowed_types'] = 'pdf|docx|doc|mp4|mkv'; // Format file yang diizinkan
            $config['max_size'] = 204800; // Maksimal 200MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('materi')) {
                $upload_data = $this->upload->data();
                $data_materials['file_path'] = 'assets/materi/' . $upload_data['file_name']; // Path file

                // Update data tabel course_materials
                $data_materials['updated_at'] = date('Y-m-d H:i:s');
            } else {
                // Tangani error upload
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('admin/editcourse/' . $id);
                return;
            }
        }

        // Update data di tabel courses
        $this->db->where('id', $id);
        $this->db->update('courses', $data_courses);

        // Jika ada file baru, update data di tabel course_materials
        if (!empty($data_materials)) {
            $this->db->where('id', $id);
            $this->db->update('course_materials', $data_materials);
        }

        // Berikan feedback kepada pengguna
        $this->session->set_flashdata('success', 'Kursus berhasil diperbarui!');
        redirect('admin/courses');
    }



    // Fungsi untuk menghapus data kursus
    public function deletecourse_materials($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('courses');
    }
}
