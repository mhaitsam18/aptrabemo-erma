<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
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
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('produkModel');
        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }
    public function index()
    {
    }

    public function tambah($id_produk, $rowid = '')
    {
        $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        $keranjang = $this->cart->get_item($rowid);
        if ($keranjang) {
            if ($produk['stok'] <= $keranjang['qty']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Mohon Maaf, Stok Produk tidak mencukupi!
    </div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } elseif ($produk['stok'] <= 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Mohon Maaf, Stok Produk tidak mencukupi!
        </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data = array(
            'id' => $produk['id_produk'],
            'qty' => 1,
            'price' => $produk['harga_konsumen'],
            'name' => $produk['nama_produk'],
            'gambar' => $produk['gambar_produk']
            // 'options' => array('Size' => 'L', 'Color' => 'Red')
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			1 Item ditambahkan
			</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function kurang($rowid, $qty)
    {
        $data = array(
            'rowid' => $rowid,
            'qty'   => ($qty - 1)
        );
        $this->cart->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			1 Item dikurangi!
			</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function bersihkan()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Keranjang dibersihkan
			</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapusItem($rowid)
    {
        $this->cart->remove($rowid);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Item dihapus
			</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function checkout()
    {
        $kode_transaksi = strtoupper(bin2hex(random_bytes(10)));
        $this->db->insert('penjualan', [
            'kode_transaksi' => $kode_transaksi,
            'id_pembeli' => $this->session->userdata('id_user'),
            'id_toko' => 1, //HARUS DIPERBAIKI, BUG
            'servis' => 'Reguler',
            'ongkir' => 0,
            'proses' => 1,
        ]);
        $id_penjualan = $this->db->insert_id();
        foreach ($this->cart->contents() as $item) {
            $produk = $this->db->get_where('produk', ['id_produk' => $item['id']])->row_array();
            $data = array(
                'id_penjualan' => $id_penjualan,
                'id_produk' => $item['id'],
                'jumlah' => $item['qty'],
                'diskon' => 0,
                'harga_jual' => $item['price'],
                'sub_total' => $item['subtotal'],
                'satuan' => $produk['satutan'],
            );
            $this->db->insert('detail_penjualan', $data);

            $new_stok = $produk['stok'] - $item['qty'];
            $this->db->where('id_produk', $item['id']);
            $this->db->update('produk', ['stok' => $new_stok]);
        }
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Transaksi berhasil!
			</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
