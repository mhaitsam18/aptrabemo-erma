<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotifikasiModel extends CI_Model
{

    public $id_notifikasi;
    public $id_target;
    public $judul;
    public $keterangan;
    public $role_pengirim;
    public $id_pengirim;
    public $role_penerima;
    public $id_penerima;
    public $kategori;
    public $is_read;
    public $created_at;


    public function insertPemesananProduk($id_produk = null, $id_penerima = null)
    {
        $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row();
        $this->db->insert('notifikasi', [
            'id_target' => $id_produk,
            'judul' => 'Pesanan Masuk',
            'keterangan' => "Produk $produk->nama_produk ada yang memesan, silahkan cek menu pemesanan Anda",
            'role_pengirim' => 'pembeli',
            'id_pengirim' => $this->session->userdata('id_user'),
            'role_penerima' => 'pedagang',
            'id_penerima' => $id_penerima,
            'kategori' => 'pemesanan',
        ]);
    }
    public function insertPemesanan($id_penjualan = null, $id_penerima = null)
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
