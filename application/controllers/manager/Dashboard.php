<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cekSession();
		cekMenu();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$pegawai 	= $this->db->get('pegawai')->num_rows();
		$admin 		= $this->db->get('pegawai', ['status' => '2'])->num_rows();
		$lemburan 	= $this->db->where('tanggal',date('Y-m-d'))->get('lembur')->num_rows();
		$absensi 	= $this->db->where('tangal',date('Y-m-d'))->get('kehadiran')->num_rows();
		$data = [
			'pegawai' => $pegawai,
			'admin' => $admin,
			'lemburan'	=>$lemburan,
			'absensi'	=> $absensi
		];
		$data['title'] = 'Dashboard';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('themeplates/footer');
	}


}