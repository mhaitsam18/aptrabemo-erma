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

    public function getDetailPenjualanByPenjualanJoinProduk($id_penjualan)
    {
        $this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');
        return $this->db->get_where('detail_penjualan', [
            'id_penjualan' => $id_penjualan
        ])->result();
    }
}
