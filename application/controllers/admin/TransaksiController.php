<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class TransaksiController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransaksiModel');
        $this->load->helper('url');
		cekSession();
		cekMenu();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$post = $this->input->post();
		$data['msg'] = '<div class="alert alert-info mt-4" role="alert">Menampilkan Data Transaksi</div>';
		$data['title'] = 'Data Transaksi';
        $data['key']   = $this->input->post('key') ? $this->input->post('key') : '';	

		

		if(isset($post['updatetransaksi']) && !empty($post['updatetransaksi'])){
			
			$data_update = array(
				'sifat'          => $post['editname']
			);

			$proses = $this->BusModel->update_sifat($post['editid'], $data_update);

			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal mengubah data.</div>';
                
			}

            // return redirect('admin/busController');
		}

		if(isset($post['deletetransaksi']) && !empty($post['deletetransaksi'])){
			$proses = $this->TransaksiModel->delete_sifat($post['delid']);
			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal menghapus data.</div>';
                
			}

		}

		$data['list']   = $this->TransaksiModel->list_data($data['key']);

        // echo "<pre>";
        // print_r($data['list']);
        // die;

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/list_transaksi.php', $data);
		$this->load->view('themeplates/footer');
	}
}