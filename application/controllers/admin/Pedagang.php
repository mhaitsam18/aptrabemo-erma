<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedagang extends CI_Controller
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
        $this->load->model('userModel');
        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }
    public function index()
    {
        $data['title'] = "Data Pedagang";
        $data['data_pedagang'] = $this->db->get_where('users', ['role' => 'pedagang'])->result();
        $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]', [
            'is_unique' => 'Username ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim|min_length[3]', [
            'matches' => 'Kata sandi tidak sama!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Kata sandi', 'required|trim|matches[password1]', ['matches' => 'Kata sandi tidak sama!']);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('link_map', 'Link Map', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/pedagang/index', $data);
        } else {
            $this->store();
        }
    }
    public function create()
    {
        $data['title'] = "Tambah Pedagang";

        // $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]', [
            'is_unique' => 'Username ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim|min_length[3]', [
            'matches' => 'Kata sandi tidak sama!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Kata sandi', 'required|trim|matches[password1]', ['matches' => 'Kata sandi tidak sama!']);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'trim|required');
        // $this->form_validation->set_rules('foto', 'foto', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('link_map', 'Link Map', 'trim|required');
        // $this->form_validation->set_rules('role', 'role', 'trim|required');
        // $this->form_validation->set_rules('is_active', 'is_active', 'trim|required');
        // $this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/pedagang/create', $data);
        } else {
            $this->store();
        }
    }
    private function store()
    {
        $upload_image = $_FILES['foto']['name'];
        $foto = '';
        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/foto-profil/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            // $config['max_width']            = 2048;
            // $config['max_height']           = 768;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $foto = 'foto-profil/' . $this->upload->data('file_name');
            }
        } else {
            $this->db->insert('users', [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'foto' => $foto,
                'alamat' => $this->input->post('alamat'),
                'link_map' => $this->input->post('link_map'),
                'role' => 'pedagang',
                // 'is_active' => $this->input->post('is_active'),
                // 'created_at' => $this->input->post('created_at'),
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pedagang ditambahkan sukses!</div>');
            redirect('admin/pedagang/index/');
        }
    }
    public function show($id_pedagang = null)
    {
        $data['title'] = "Lihat Detail Pedagang";
        $data['pedagang'] = $this->db->get_where('users', ['id_user' => $id_pedagang])->row();
        $this->load->view('admin/pedagang/show', $data);
    }
    public function edit($id_pedagang = null)
    {
        $data['title'] = "Edit data pedagang";
        $user = $this->db->get_where('users', ['id_user' => $id_pedagang])->row();
        $data['pedagang'] = $user;


        if ($this->input->post('username') != $user->username) {
            $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]', [
                'is_unique' => 'Username ini telah digunakan!'
            ]);
        }
        if ($this->input->post('email') != $user->email) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
                'is_unique' => 'Email ini telah digunakan!'
            ]);
        }
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('link_map', 'Link Map', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/pedagang/edit', $data);
        } else {
            $this->update();
        }
    }
    private function update()
    {
        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/foto-profil/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            // $config['max_width']            = 2048;
            // $config['max_height']           = 768;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $new_image = 'foto-profil/' . $this->upload->data('file_name');
            }
        } else {
            $new_image = $this->input->post('oldImage');
        }
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', [
            // 'id_perusahaan' => $this->input->post('id_perusahaan'),
            // 'id_kategori' => $this->input->post('id_kategori'),
            'nama_user' => $this->input->post('nama_user'),
            'satuan' => $this->input->post('satuan'),
            'harga_beli' => $this->input->post('harga_beli'),
            // 'harga_reseller' => $this->input->post('harga_reseller'),
            'harga_konsumen' => $this->input->post('harga_konsumen'),
            'berat' => $this->input->post('berat'),
            'foto' => $new_image,
            'tentang_user' => $this->input->post('tentang_user'),
            'keterangan' => $this->input->post('keterangan'),
            'tag' => $this->input->post('tag'),
            // 'minimum' => $this->input->post('minimum'),
            'stok' => $this->input->post('stok'),
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						user berhasil diubah!
						</div>');
        redirect('admin/user/index/' . $this->input->post('id_toko'));
    }
    public function tambah_stok()
    {
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', [
            'stok' => $this->input->post('stok') + $this->input->post('tambah_stok')
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok user berhasil ditambahkan!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function ubah_stok()
    {
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', [
            'stok' => $this->input->post('stok')
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok user berhasil ditambahkan!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete($id_user = null)
    {
        $this->db->delete('user', [
            'id_user' => $id_user
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">user berhasil dihapus!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
