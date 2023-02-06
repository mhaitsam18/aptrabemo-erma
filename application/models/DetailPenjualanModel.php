<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjualanModel extends CI_Model
{
    public $id_detail_penjualan;
    public $id_penjualan;
    public $id_produk;
    public $jumlah;
    public $diskon;
    public $harga_jual;
    public $satuan;
    public $keterangan_order;
    public $is_canceled;
}
