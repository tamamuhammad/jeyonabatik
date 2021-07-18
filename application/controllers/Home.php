<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['produk'] = $this->db->order_by('popularitas', 'DESC');
        $data['produk'] = $this->db->get('produk')->result_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer');
    }

    public function produk()
    {
        $data['title'] = 'Produk';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        // $data['produk'] = $this->db->get_where('produk', ['id_kategori' => $kategori])->result_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/produk', $data);
        $this->load->view('templates/home_footer');
    }

    public function detail($id)
    {
        $data['produk'] = $this->db->get_where('produk', ['id' => $id])->row_array();
        $data['title'] = 'Detail ' . $data['produk']['nama'];
        $data['foto'] = $this->db->get_where('foto', ['id_produk' => $id])->result_array();
        $data['kategori'] = $this->db->get_where('kategori', ['id' => $data['produk']['id_kategori']])->row_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('templates/home_footer');
    }

    public function popularitas()
    {
        $id = $this->input->post('id');

        $produk = $this->db->get_where('produk', ['id' => $id])->row_array();
        $popularitas = $produk['popularitas'] + 1;

        $this->db->set('popularitas', $popularitas);
        $this->db->where('id', $id);
        $this->db->update('produk');
    }
}
