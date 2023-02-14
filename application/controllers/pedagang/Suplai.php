<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplai extends CI_Controller
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
        $this->load->model('ProdukModel');
        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }
    public function index($id_toko = null, $id_produk = null)
    {
        $data['title'] = "Update Stok";
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_toko])->row();
        $data['data_produk'] = $this->db->get_where('produk', ['id_toko' => $id_toko])->result();
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row();


        if ($id_produk) {
            $this->db->where('suplai.id_produk', $id_produk);
        } else {
            $this->db->where('id_toko', $id_toko);
        }
        $this->db->join('produk', 'produk.id_produk = suplai.id_produk');
        $data['data_suplai'] = $this->db->get('suplai')->result();

        // $this->form_validation->set_rules('id_suplai', 'id_suplai', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id_produk', 'trim|required');
        // $this->form_validation->set_rules('id_toko', 'id_toko', 'trim|required');
        $this->form_validation->set_rules('nomor_kuitansi', 'Nomor Kuitansi', 'trim');
        $this->form_validation->set_rules('harga_total', 'Total Harga', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
        // $this->form_validation->set_rules('bukti', 'bukti', 'trim|required');
        $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal Transaksi', 'trim|required');
        $this->form_validation->set_rules('waktu_transaksi', 'Waktu Transaksi', 'trim');
        $this->form_validation->set_rules('penyuplai', 'Penyuplai', 'trim');
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim');
        // $this->form_validation->set_rules('created_at', 'catatan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('pedagang/suplai/index', $data);
        } else {
            $this->store();
        }
    }
    // public function create()
    // {
    // // $this->form_validation->set_rules('id_suplai', 'id_suplai', 'trim|required');
    // $this->form_validation->set_rules('id_produk', 'id_produk', 'trim|required');
    // // $this->form_validation->set_rules('id_toko', 'id_toko', 'trim|required');
    // $this->form_validation->set_rules('nomor_kuitansi', 'Nomor Kuitansi', 'trim');
    // $this->form_validation->set_rules('harga_total', 'Total Harga', 'trim|required');
    // $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
    // $this->form_validation->set_rules('satuan', 'Satuan', 'trim');
    // $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
    // // $this->form_validation->set_rules('bukti', 'bukti', 'trim|required');
    // $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal Transaksi', 'trim|required');
    // $this->form_validation->set_rules('waktu_transaksi', 'Waktu Transaksi', 'trim');
    // $this->form_validation->set_rules('penyuplai', 'Penyuplai', 'trim');
    // $this->form_validation->set_rules('catatan', 'Catatan', 'trim');
    // // $this->form_validation->set_rules('created_at', 'catatan', 'trim|required');
    //     if ($this->form_validation->run() == false) {
    //         redirect($_SERVER['HTTP_REFERER']);
    //     } else {
    //         $this->store();
    //     }
    // }

    private function store()
    {
        $upload_image = $_FILES['bukti']['name'];
        $bukti = '';
        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/gambar-bukti/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            // $config['max_width']            = 2048;
            // $config['max_height']           = 768;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $bukti = 'gambar-bukti/' . $this->upload->data('file_name');
            }
        }
        $produk = $this->db->get_where('produk', ['id_produk', $this->input->post('id_produk')])->row();
        $this->db->insert('suplai', [
            'id_produk' => $this->input->post('id_produk'),
            'id_toko' => $this->input->post('id_toko'),
            'nomor_kuitansi' => $this->input->post('nomor_kuitansi'),
            'harga_total' => $this->input->post('harga_total'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'bukti' => $bukti,
            'waktu_transaksi' => $this->input->post('tanggal_transaksi') . ' ' . $this->input->post('waktu_transaksi'),
            'penyuplai' => $this->input->post('penyuplai'),
            'catatan' => $this->input->post('catatan')
        ]);

        $new_stok = $produk->stok + $this->input->post('jumlah');
        $this->db->where('id_produk', $produk->id_produk);
        $this->db->update('produk', ['stok' => $new_stok]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Data Stok berhasil diperbarui sukses!
						</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function show($id_suplai = null)
    {
        $data['title'] = "Lihat Detail Suplai";
        $this->load->view('pedagang/suplai/show', $data);
    }
    public function edit($id_suplai = null)
    {
        $data['title'] = "Edit Data Suplai";
        $data['suplai'] = $this->db->get_where('suplai', ['id_suplai' => $id_suplai])->row();


        // $this->form_validation->set_rules('id_suplai', 'id_suplai', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id_produk', 'trim|required');
        // $this->form_validation->set_rules('id_toko', 'id_toko', 'trim|required');
        $this->form_validation->set_rules('nomor_kuitansi', 'Nomor Kuitansi', 'trim');
        $this->form_validation->set_rules('harga_total', 'Total Harga', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
        // $this->form_validation->set_rules('bukti', 'bukti', 'trim|required');
        $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal Transaksi', 'trim|required');
        $this->form_validation->set_rules('waktu_transaksi', 'Waktu Transaksi', 'trim');
        $this->form_validation->set_rules('penyuplai', 'Penyuplai', 'trim');
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim');
        // $this->form_validation->set_rules('created_at', 'catatan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('pedagang/suplai/edit', $data);
        } else {
            $this->update();
        }
    }
    private function update()
    {
        $upload_image = $_FILES['bukti']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/gambar-bukti/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            // $config['max_width']            = 2048;
            // $config['max_height']           = 768;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $new_image = 'gambar-bukti/' . $this->upload->data('file_name');
            }
        } else {
            $new_image = $this->input->post('oldImage');
        }
        $this->db->where('id_suplai', $this->input->post('id_suplai'));
        $this->db->update('suplai', [
            'id_produk' => $this->input->post('id_produk'),
            'id_toko' => $this->input->post('id_toko'),
            'nomor_kuitansi' => $this->input->post('nomor_kuitansi'),
            'harga_total' => $this->input->post('harga_total'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'bukti' => $new_image,
            'waktu_transaksi' => $this->input->post('tanggal_transaksi') . ' ' . $this->input->post('waktu_transaksi'),
            'penyuplai' => $this->input->post('penyuplai'),
            'catatan' => $this->input->post('catatan')
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Data Suplai berhasil diubah!
						</div>');
        redirect('pedagang/suplai/index/' . $this->input->post('id_toko'));
    }

    public function delete($id_suplai = null)
    {
        $this->db->delete('suplai', [
            'id_suplai' => $id_suplai
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Suplai berhasil dihapus!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
