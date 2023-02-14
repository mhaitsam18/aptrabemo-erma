<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
    public function index()
    {
        $data['title'] = "Home Pedagang";

        $this->load->view('pedagang/home/index', $data);
    }

    public function profil()
    {
        $data['title'] = "Profil";
        $user = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row();
        $data['pedagang'] = $user;
        $data['user'] = $user;

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
            $this->load->view('pedagang/home/profil', $data);
        } else {
            $this->updateProfil();
        }
    }

    private function updateProfil()
    {
        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/img/uploads/foto-profil/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
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
        $this->db->update('users', [
            'username' => $this->input->post('username'),
            // 'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'foto' => $new_image,
            'alamat' => $this->input->post('alamat'),
            'link_map' => $this->input->post('link_map')
        ]);

        $user = $this->db->get_where('users', ['id_user' => $this->input->post('id_user')])->row_array();
        // $this->session->sess_destroy();
        $this->session->set_userdata($user);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data profil berhasil diubah!</div>');
        redirect('pedagang/home/profil');
    }
}
