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
    $data = array(
        'course_id' => $this->input->post('title'),
    );

    if ($this->input->post()) {
        $config['upload_path'] = './assets/materi/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 102400; // Maksimum 100MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('materi')) {
            $upload_data = $this->upload->data();
            $file_path = 'assets/materi/' . $upload_data['file_name'];

            $data_insert = [
                'course_id' => $this->input->post('title'),
                'pdf_file' => $file_path,
            ];

            // Insert data ke tabel 'course_materials'
            $this->db->insert('course_materials', $data_insert);
        } else {
            // Handle error upload
            return $this->upload->display_errors();
        }
    }
}


    // Fungsi untuk mengupdate data kursus
    public function updateCourse($id)
    {
        // Ambil data dari form
        $data = [
            'title' => $this->input->post('title'),
            'price' => $this->input->post('price'),
        ];
    
        // Cek apakah file diunggah
        if (!empty($_FILES['materi']['name'])) {
            $config['upload_path'] = './assets/materi/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 102400; // Maksimal 100MB
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('materi')) {
                $upload_data = $this->upload->data();
                $data['file_path'] = 'assets/materi/' . $upload_data['file_name']; // Tambahkan path file
            } else {
                // Tangani error upload
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('admin/editcourse/' . $id);
                return;
            }
        }
    
        // Update data di tabel course_materials
        $this->db->where('id', $id);
        $this->db->update('course_materials', $data);
    
        // Update data di tabel courses
        $this->db->where('id', $id);
        $this->db->update('courses', $data);
    
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
