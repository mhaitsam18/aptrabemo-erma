<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
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
        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }
    public function index($id_pedagang = null)
    {
        $data['title'] = "Toko";
        if ($id_pedagang) {
            $this->db->where('id_user', $id_pedagang);
        }
        $data['data_toko'] = $this->db->get('toko')->result();


        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
        $this->form_validation->set_rules('nama_toko', 'nama_toko', 'trim|required');
        $this->form_validation->set_rules('deskripsi_toko', 'deskripsi_toko', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/toko/index', $data);
        } else {
            $this->store();
        }
    }
    public function create($id_pedagang = null)
    {
        $data['title'] = "Buat Toko";
        $data['pedagang'] = $this->db->get_where('users', ['id_user' => $id_pedagang])->row();
        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
        $this->form_validation->set_rules('nama_toko', 'nama_toko', 'trim|required');
        $this->form_validation->set_rules('deskripsi_toko', 'deskripsi_toko', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/toko/create', $data);
        } else {
            $this->store();
        }
    }
    private function store()
    {
        $upload_image = $_FILES['gambar_toko']['name'];
        $gambar_toko = '';
        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/gambar-toko/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_toko')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $gambar_toko = 'gambar-toko/' . $this->upload->data('file_name');
            }
        } else {
            $this->db->insert('toko', [
                'id_user' => $this->input->post('id_user'),
                'nama_toko' => $this->input->post('nama_toko'),
                'deskripsi_toko' => $this->input->post('deskripsi_toko'),
                'gambar_toko' => $gambar_toko,
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Toko ditambahkan sukses!</div>');
            redirect('admin/toko/index/' . $this->input->post('id_user'));
        }
    }
    public function show($id_toko = null)
    {
        $data['title'] = "Lihat Toko";
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_toko])->row();
        $data['data_produk'] = $this->db->get_where('produk', ['id_toko' => $id_toko])->result();
        $this->load->view('admin/toko/show', $data);
    }
    public function edit($id_toko = null)
    {
        $data['title'] = "Edit Toko";
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_toko])->row();

        $this->form_validation->set_rules('nama_toko', 'nama_toko', 'trim|required');
        $this->form_validation->set_rules('deskripsi_toko', 'deskripsi_toko', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/toko/edit', $data);
        } else {
            $this->update();
        }
    }
    private function update()
    {
        $upload_image = $_FILES['gambar_toko']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/gambar-toko/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_toko')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $new_image = 'gambar-toko/' . $this->upload->data('file_name');
            }
        } else {
            $new_image = $this->input->post('oldImage');
        }
        $this->db->where('id_toko', $this->input->post('id_toko'));
        $this->db->update('toko', [
            'id_user' => $this->input->post('id_user'),
            'nama_toko' => $this->input->post('nama_toko'),
            'deskripsi_toko' => $this->input->post('deskripsi_toko'),
            'gambar_toko' => $new_image
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Toko berhasil diubah!</div>');
        redirect('admin/toko/index/' . $this->input->post('id_user'));
    }
    public function delete($id_toko = null)
    {
        $this->db->delete('toko', [
            'id_toko' => $id_toko
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Toko berhasil dihapus!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
