<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
        $this->load->model('PenjualanModel');
        $this->load->model('DetailPenjualanModel');
        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }
    public function index($id_toko = null)
    {
        $data['title'] = "Data Pemesanan";
        $data['data_penjualan'] = $this->PenjualanModel->getPenjualanByTokoJoinPembeli($id_toko);
        $this->load->view('pedagang/penjualan/index', $data);
    }

    public function show($id_penjualan = null)
    {
        $data['title'] = "Detail Pemesanan";
        $data['penjualan'] = $this->PenjualanModel->findPenjualanJoinPembeli($id_penjualan);
        $data['data_detail_penjualan'] = $this->DetailPenjualanModel->getDetailPenjualanByPenjualanJoinProduk($id_penjualan);
        $this->load->view('pedagang/penjualan/show', $data);
    }
}
