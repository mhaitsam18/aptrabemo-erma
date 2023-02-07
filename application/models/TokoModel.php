<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TokoModel extends CI_Model
{

    public $id_toko;
    public $id_user;
    public $nama_toko;
    public $deskripsi_toko;
    public $gambar_toko;
    public $created_at;

    public function getTokoJoinUser()
    {
        $this->db->join('users', 'toko.id_user = users.id_user');
        return $this->db->get('toko')->result();
    }
}
