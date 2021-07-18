<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }
        $data['title'] = "Log In";

        $this->form_validation->set_rules('nama', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('nama');
        $password = $this->input->post('password');
        $user = $this->db->get_where('admin', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->session->set_userdata('username', $user['username']);
                redirect('dashboard');
                // var_dump($user);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password kurang tepat!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Username ini belum teregistrasi</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success">Log out berhasil!</div>');
        redirect('auth');
    }

    public function signup()
    {
        $data['title'] = 'Register Admin';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[6]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/signup');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_signup();
        }
    }

    private function _signup()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'gambar' => 'default.jpg',
        ];
        $this->db->insert('admin', $data);
        $this->session->set_flashdata('message', 'Ditambahkan');
        redirect('auth');
    }
}
