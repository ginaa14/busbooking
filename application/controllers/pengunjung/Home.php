<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data['title']  = "Bus Booking Management System";
        $this->load->view('pengunjung/templates/header', $data);
		$this->load->view('pengunjung/home', $data);
        $this->load->view('pengunjung/templates/footer');
	}
}