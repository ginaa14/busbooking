<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Booking extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->helpers('general_helper');
        $this->load->model('PengunjungModel');
	}

	public function index()
	{
        $data['title']  = "Booking Ticket";
        $data['terminal'] = $this->PengunjungModel->list_terminal();

        $this->load->view('pengunjung/templates/header', $data);
		$this->load->view('pengunjung/form_booking', $data);
        $this->load->view('pengunjung/templates/footer');
	}

    public function list_schedule(){
        $data   = array();
        $param  = array();
        $data['title']  = "Daftar Perjalanan";
        $data['from']   = $param['from'] = $this->input->get('from');
        $data['to']     = $param['to'] = $this->input->get('to');
        $data['type']   = $param['type'] = $this->input->get('type');

        $data['data_schedule'] = $this->PengunjungModel->list_schedule($param);

        // echo "<pre>";
        // print_r($data);
        // die;
        // $data['title']  = "List Perjalanan";

        $this->load->view('pengunjung/templates/header', $data);
		$this->load->view('pengunjung/list_schedule', $data);
        $this->load->view('pengunjung/templates/footer');
    }

    public function form_data()
    {
        cekPengunjung();
        $data = array();
        $data['title']      = 'Form Pengisian Data';

        $data['id']         = $this->input->get('id');

        $data['schedule']   = $this->PengunjungModel->data_schedule($data['id']);
        $data['pengunjung'] = $this->session->userdata('pengunjung');
        $data['kursi']      = $this->PengunjungModel->data_kursi($data['schedule']['id']);

        $this->load->view('pengunjung/templates/header', $data);
		$this->load->view('pengunjung/form_data', $data);
        // $this->load->view('pengunjung/templates/footer');
    }
}