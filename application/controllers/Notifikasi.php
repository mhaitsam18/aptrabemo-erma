<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
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
    }
    public function index()
    {
    }

    public function notifPemesanan($id_penjualan = null, $id_penerima = null)
    {
        $this->db->insert('notifikasi', [
            'id_target' => $id_penjualan,
            'judul' => 'Pesanan Masuk',
            'keterangan' => 'Produk Anda ada yang memesan',
            'role_pengirim' => 'pembeli',
            'id_pengirim' => $this->session->userdata('id_user'),
            'role_penerima' => 'pedagang',
            'id_penerima' => $id_penerima,
            'kategori' => 'pemesanan',
        ]);
    }
}
