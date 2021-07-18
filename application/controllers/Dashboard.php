<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
        // $this->load->model('Tablemodel');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('admin', ['username' => $username])->row_array();
        $data['produk'] = $this->db->get('produk')->num_rows();
        $data['kategori'] = $this->db->get('kategori')->num_rows();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function produk()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('admin', ['username' => $username])->row_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['kat'] = $this->db->get('kategori')->result_array();
        $data['title'] = 'Produk';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/produk', $data);
            $this->load->view('templates/footer');
        } else {
            $img = $_FILES['foto']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $newImage = 'default.jpg';
            }
            $data = [
                'nama' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('kategori'),
                'ukuran' => $this->input->post('ukuran'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),
                'popularitas' => 0
            ];
            $this->db->insert('produk', $data);
            $idproduk = $this->db->order_by('id', 'DESC');
            $idproduk = $this->db->get('produk')->result_array();
            $idp = $idproduk[0]['id'];
            $foto = [
                'id_produk' => $idp,
                'foto' => $newImage
            ];
            $this->db->insert('foto', $foto);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('dashboard/produk');
        }
    }

    public function kategori()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('admin', ['username' => $username])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['title'] = 'Kategori';
        $this->form_validation->set_rules('kat', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori' => $this->input->post('kat')
            ];
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('dashboard/kategori');
        }
    }

    public function detail($id)
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('admin', ['username' => $username])->row_array();
        $data['produk'] = $this->db->get_where('produk', ['id' => $id])->row_array();
        $data['foto'] = $this->db->get_where('foto', ['id_produk' => $id])->result_array();
        $data['title'] = $data['produk']['nama'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('produk');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/produk');
    }

    public function fetch()
    {
        echo json_encode($this->db->get_where('produk', ['id' => $_POST['id']])->row_array());
    }

    public function edit($id)
    {
        $gambar = $this->db->get_where('produk', ['id' => $id])->row_array();
        $img = $_FILES['foto']['name'];

        if ($img) {
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $oldgambar = $gambar['foto'];
                if ($oldgambar != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/' . $oldgambar);
                }
                $newImage = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $newImage = $gambar['foto'];
        }
        $data = [
            'nama' => $this->input->post('nama'),
            'id_kategori' => $this->input->post('kategori'),
            'ukuran' => $this->input->post('ukuran'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('produk');
        $this->session->set_flashdata('message', 'Diubah');
        redirect('dashboard/produk');
    }

    public function fetchk()
    {
        echo json_encode($this->db->get_where('kategori', ['id' => $_POST['id']])->row_array());
    }

    public function editk($id)
    {
        $data = [
            'kategori' => $this->input->post('kat')
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('kategori');
        $this->session->set_flashdata('message', 'Diubah');
        redirect('dashboard/kategori');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/kategori');
    }

    public function foto($id)
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('admin', ['username' => $username])->row_array();
        $data['produk'] = $this->db->get_where('produk', ['id' => $id])->row_array();
        $data['foto'] = $this->db->get_where('foto', ['id_produk' => $id])->result_array();
        $data['title'] = 'Foto ' . $data['produk']['nama'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/foto', $data);
        $this->load->view('templates/footer');
    }

    public function addfoto()
    {

        $idproduk = $this->input->post('idproduk');
        $img = $_FILES['foto']['name'];
        if (!$img) {
            $this->session->set_flashdata('gagal', 'Ditambahkan');
            redirect('dashboard/foto/' . $idproduk);
        } else {

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $newImage = 'default.jpg';
            }
            $data = [
                'id_produk' => $idproduk,
                'foto' => $newImage
            ];
            $this->db->insert('foto', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('dashboard/foto/' . $idproduk);
        }
    }

    public function remove($id, $idproduk)
    {
        $this->db->where('id', $id);
        $this->db->delete('foto');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/foto/' . $idproduk);
    }
}
