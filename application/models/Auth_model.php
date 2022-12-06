<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	public function getAuthUserPegawai($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.username', $username);
		return $this->db->get();
	}

	public function cekemailuser($email){
		$this->db->where('role', 3);
		$this->db->where('email', $email);
		$this->db->select('count(*) as jumlah');
		$this->db->from('users');
		return $this->db->get()->row()->jumlah;
	}

	public function cekloginuser($email, $pass){
		$this->db->where('email', $email);
		$this->db->where('password', $pass);
		$this->db->where('role', 3);
		$this->db->select('*');
		$this->db->from('users');
		return $this->db->get()->row();
	}

	public function register_user($data){
        $this->db->insert('users', $data);
        return true;
    }

	public function cek_email($email){
		$this->db->where('email', $email);
		$this->db->select('count(*) as jumlah');
		$this->db->from('users');
		return $this->db->get()->row()->jumlah;
	}

}