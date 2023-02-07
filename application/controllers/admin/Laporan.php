<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('DetailPenjualanModel');
        $this->load->model('TokoModel');
        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }
    public function index()
    {
        $data['title'] = "Laporan";
        $data['data_toko'] = $this->TokoModel->getTokoJoinUser();
        $this->load->view('admin/laporan/index', $data);
    }

    public function toko($id_toko = null)
    {
        $data['title'] = "Laporan Penjualan Toko";

        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_toko])->row();
        $data['data_laporan'] = $this->DetailPenjualanModel->getDetailPenjualanByTokoJoinLengkap($id_toko);
        $this->load->view('admin/laporan/toko', $data);
    }
}
