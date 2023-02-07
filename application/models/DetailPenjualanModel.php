<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailPenjualanModel extends CI_Model
{
    public $id_detail_penjualan;
    public $id_penjualan;
    public $id_produk;
    public $jumlah;
    public $diskon;
    public $harga_jual;
    public $satuan;
    public $keterangan_order;
    public $komplain;
    public $created_at;

    public function getDetailPenjualanByPenjualanJoinProduk($id_penjualan)
    {
        $this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');
        return $this->db->get_where('detail_penjualan', [
            'id_penjualan' => $id_penjualan
        ])->result();
    }
    public function getDetailPenjualanByTokoJoinProduk($id_toko)
    {
        $this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
        return $this->db->get_where('detail_penjualan', [
            'penjualan.id_toko' => $id_toko
        ])->result();
    }
    public function getDetailPenjualanByTokoJoinLengkap($id_toko)
    {
        $this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
        $this->db->join('users', 'penjualan.id_pembeli = users.id_user');
        return $this->db->get_where('detail_penjualan', [
            'penjualan.id_toko' => $id_toko
        ])->result();
    }
}
