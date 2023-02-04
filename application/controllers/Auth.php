<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
    }

    public function index()
    {
        $this->load->view('auth/login');
    }
    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect('home');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Log In';
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        if ($this->session->userdata('username')) {
            redirect('home');
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($user) {
            if ($user['is_active'] ==  1) {
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata($user);
                    if ($user['role'] == 'admin') {
                        redirect('admin/home');
                    } elseif ($user['role'] == 'pembeli') {
                        redirect('pembeli/home');
                    } elseif ($user['role'] == 'pedagang') {
                        redirect('pedagang/home');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Username dan Katasandi tidak sesuai!
						</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Username belum diaktivasi, silahkan cek Email Anda!
					</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Username tidak terdaftar!
				</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Anda sudah log out
			</div>');
        redirect('auth');
    }
}
