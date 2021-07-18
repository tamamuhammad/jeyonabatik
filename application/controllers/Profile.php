<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
        // $this->load->model('Tablemodel');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Profile';
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('profile/index', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');

            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['width'] = '480';
                    $config['height'] = '480';
                    $config['x_axis'] = '480';
                    $config['y_axis'] = '480';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->crop();
                    $oldgambar = $data['user']['gambar'];
                    if ($oldgambar != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $oldgambar);
                    }
                    $newgambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $newgambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->where('username', $username);
            $this->db->update('admin');
            $this->session->set_flashdata('message', 'Diubah');
            redirect('profile');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Ganti Password';
        $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim|min_length[6]|matches[ulangipassword]');
        $this->form_validation->set_rules('ulangipassword', 'Ulangi Password Baru', 'required|trim|min_length[6]|matches[passwordbaru]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('passwordlama');
            $newPassword = $this->input->post('passwordbaru');
            if (password_verify($currentPassword, $data['user']['password'])) {
                if ($newPassword == $currentPassword) {
                    $this->session->set_flashdata('danger', '<div class="alert alert-danger">Password baru tidak boleh sama dengan Password lama</div>');
                    redirect('profile/edit');
                } else {
                    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $newPassword);
                    $this->db->where('username', $data['user']['username']);
                    $this->db->update('admin');
                    $this->session->set_flashdata('message', 'Diubah');
                    redirect('profile/edit');
                }
            } else {
                $this->session->set_flashdata('danger', '<div class="alert alert-danger">Password lama salah!</div>');
                redirect('profile/edit');
            }
        }
    }
}
