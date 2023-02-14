<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModel extends CI_Model
{

    public $id_produk;
    public $id_perusahaan;
    public $id_toko;
    public $id_kategori;
    public $nama_produk;
    public $satuan;
    public $harga_beli;
    public $harga_reseller;
    public $harga_konsumen;
    public $berat;
    public $satuan_berat;
    public $gambar_produk;
    public $tentang_produk;
    public $keterangan;
    public $is_active;
    public $tag;
    public $dilihat;
    public $disukai;
    public $minimum;
    public $stok;
    public $created_at;


    public function getProdukJoinToko()
    {
        $this->db->join('toko', 'produk.id_toko = toko.id_toko');
        return $this->db->get_where('produk', [
            'is_active' => 1
        ])->result();
    }
    public function findProdukJoinToko($id_produk)
    {
        $this->db->join('toko', 'produk.id_toko = toko.id_toko');
        return $this->db->get_where('produk', ['id_produk' => $id_produk])->row();
    }
}
