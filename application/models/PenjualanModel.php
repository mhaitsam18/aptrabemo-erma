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
}
