<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        Parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }
    public function index()
    {
        $data['title'] = "Toko";

        $this->load->view('pedagang/toko/index', $data);
    }
    public function create()
    {
        $data['title'] = "Buat Toko";

        $this->load->view('pedagang/toko/create', $data);
    }
    public function store()
    {
    }
    public function show($id_toko = null)
    {
        $data['title'] = "Lihat Toko";
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_toko])->row();
        $data['data_produk'] = $this->db->get_where('produk', ['id_toko' => $id_toko])->result();
        $this->load->view('pedagang/toko/show', $data);
    }
    public function edit($id_toko = null)
    {
        $data['title'] = "Edit Toko";

        $this->load->view('pedagang/toko/edit', $data);
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
