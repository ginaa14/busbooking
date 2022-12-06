<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

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
		
		$date_now	= date('Y-m-d');
		$month_now	= date('Y-m');

		$view_today	= $this->db->like('created_at', $date_now, 'after')->get('access')->num_rows();
		$view_month = $this->db->like('created_at', $month_now, 'after')->get('access')->num_rows();

		$lkota 	= $this->db->where('area', 2)->get('booked')->num_rows();
		$dkota 	= $this->db->where('area', 1)->get('booked')->num_rows();

		$institusi 	= $this->db->where('sifat', 2)->get('booked')->num_rows();
		$pribadi 	= $this->db->where('sifat', 1)->get('booked')->num_rows();

		$data = [
			'today' 	=> $view_today,
			'month' 	=> $view_month,
			'luar' 		=> $lkota,
			'dalam'		=> $dkota,
			'pribadi' 	=> $pribadi,
			'institusi'	=> $institusi,
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