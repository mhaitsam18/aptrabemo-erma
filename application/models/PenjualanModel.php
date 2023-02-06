<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjualanModel extends CI_Model
{
    public $id_penjualan;
    public $kode_transaksi;
    public $id_pembeli;
    public $id_toko;
    public $id_kurir;
    public $servis;
    public $ongkir;
    public $keterangan;
    public $proses;
    public $waktu_transaksi;
    public $is_canceled;

    public function getPenjualanByTokoJoinPembeli($id_toko)
    {
        $this->db->join('users', 'penjualan.id_pembeli = users.id_user');
        return $this->db->get_where('penjualan', ['id_toko' => $id_toko])->result();
    }
    public function findPenjualanJoinPembeli($id_penjualan)
    {
        $this->db->join('users', 'penjualan.id_pembeli = users.id_user');
        return $this->db->get_where('penjualan', ['id_penjualan' => $id_penjualan])->row();
    }
}
