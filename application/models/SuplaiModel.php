<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuplaiModel extends CI_Model
{

    public $id_suplai;
    public $id_produk;
    public $id_toko;
    public $nomor_kuitansi;
    public $harga_total;
    public $jumlah;
    public $satuan;
    public $nama_pegawai;
    public $bukti;
    public $waktu_transaksi;
    public $penyuplai;
    public $catatan;
    public $created_at;
}
