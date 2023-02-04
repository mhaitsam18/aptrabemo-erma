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
    public function index()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin/home');
            } elseif ($this->session->userdata('role') == 'pembeli') {
                redirect('pembeli/home');
            } elseif ($this->session->userdata('role') == 'pedagang') {
                redirect('pedagang/home');
            }
        } else {
            redirect('auth/login');
        }
        $this->load->view('home/index');
    }
}
