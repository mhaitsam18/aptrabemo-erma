<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public $id_user;
    public $username;
    public $email;
    public $nama_lengkap;
    public $password;
    public $jenis_kelamin;
    public $nomor_telepon;
    public $foto;
    public $alamat;
    public $role;
    public $is_active;
    public $created_at;
}
