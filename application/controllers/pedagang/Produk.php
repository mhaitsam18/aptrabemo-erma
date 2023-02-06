<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
    public function index($id_toko = null)
    {
        $data['title'] = "Produk";
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_toko])->row();
        $data['data_produk'] = $this->db->get_where('produk', ['id_toko' => $id_toko])->result();

        $this->load->view('pedagang/produk/index', $data);
    }
    public function create($id_toko = null)
    {
        $data['title'] = "Buat Produk";
        if ($this->input->post('id_toko')) {
            $id_toko = $this->input->post('id_toko');
        }
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_toko])->row();
        // $this->form_validation->set_rules('id_perusahaan', 'Perusahaan', 'trim|required');
        // $this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required');
        // $this->form_validation->set_rules('harga_reseller', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('harga_konsumen', 'Harga Konsumen', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required');
        $this->form_validation->set_rules('tentang_produk', 'Tentang Produk', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tag', 'Tag', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('pedagang/produk/create', $data);
        } else {
            $this->store();
        }
    }
    private function store()
    {
        $upload_image = $_FILES['gambar_produk']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/gambar-produk/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            // $config['max_width']            = 2048;
            // $config['max_height']           = 768;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_produk')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->db->insert('produk', [
                    // 'id_perusahaan' => $this->input->post('id_perusahaan'),
                    'id_toko' => $this->input->post('id_toko'),
                    // 'id_kategori' => $this->input->post('id_kategori'),
                    'nama_produk' => $this->input->post('nama_produk'),
                    'satuan' => $this->input->post('satuan'),
                    'harga_beli' => $this->input->post('harga_beli'),
                    // 'harga_reseller' => $this->input->post('harga_reseller'),
                    'harga_konsumen' => $this->input->post('harga_konsumen'),
                    'berat' => $this->input->post('berat'),
                    'gambar_produk' => 'gambar-produk/' . $this->upload->data('file_name'),
                    'tentang_produk' => $this->input->post('tentang_produk'),
                    'keterangan' => $this->input->post('keterangan'),
                    'tag' => $this->input->post('tag'),
                    // 'minimum' => $this->input->post('minimum'),
                    'stok' => $this->input->post('stok'),
                ]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Produk ditambahkan sukses!
						</div>');
                redirect('pedagang/produk/index/' . $this->input->post('id_toko'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Wajib diupload</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function show($id_produk = null)
    {
        $data['title'] = "Lihat Produk";
        $data['produk'] = $this->ProdukModel->getProdukJoinToko($id_produk);
        $this->load->view('pedagang/produk/show', $data);
    }
    public function edit($id_produk = null)
    {
        $data['title'] = "Edit produk";
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row();

        // $this->form_validation->set_rules('id_perusahaan', 'Perusahaan', 'trim|required');
        // $this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required');
        // $this->form_validation->set_rules('harga_reseller', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('harga_konsumen', 'Harga Konsumen', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required');
        $this->form_validation->set_rules('tentang_produk', 'Tentang Produk', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tag', 'Tag', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('pedagang/produk/edit', $data);
        } else {
            $this->update();
        }
    }
    private function update()
    {
        $upload_image = $_FILES['gambar_produk']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/gambar-produk/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            // $config['max_width']            = 2048;
            // $config['max_height']           = 768;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_produk')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $new_image = 'gambar-produk/' . $this->upload->data('file_name');
            }
        } else {
            $new_image = $this->input->post('oldImage');
        }
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', [
            // 'id_perusahaan' => $this->input->post('id_perusahaan'),
            // 'id_kategori' => $this->input->post('id_kategori'),
            'nama_produk' => $this->input->post('nama_produk'),
            'satuan' => $this->input->post('satuan'),
            'harga_beli' => $this->input->post('harga_beli'),
            // 'harga_reseller' => $this->input->post('harga_reseller'),
            'harga_konsumen' => $this->input->post('harga_konsumen'),
            'berat' => $this->input->post('berat'),
            'gambar_produk' => $new_image,
            'tentang_produk' => $this->input->post('tentang_produk'),
            'keterangan' => $this->input->post('keterangan'),
            'tag' => $this->input->post('tag'),
            // 'minimum' => $this->input->post('minimum'),
            'stok' => $this->input->post('stok'),
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Produk berhasil diubah!
						</div>');
        redirect('pedagang/produk/index/' . $this->input->post('id_toko'));
    }
    public function tambah_stok()
    {
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', [
            'stok' => $this->input->post('stok') + $this->input->post('tambah_stok')
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok Produk berhasil ditambahkan!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function ubah_stok()
    {
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', [
            'stok' => $this->input->post('stok')
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok Produk berhasil ditambahkan!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete($id_produk = null)
    {
        $this->db->delete('produk', [
            'id_produk' => $id_produk
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil dihapus!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
