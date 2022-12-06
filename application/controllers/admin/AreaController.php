<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class AreaController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BusModel');
        $this->load->helper('url');
		cekSession();
		cekMenu();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$post = $this->input->post();
		$data['msg'] = '<div class="alert alert-info mt-4" role="alert">Menampilkan Data Area</div>';
		$data['title'] = 'Data Area';
        $data['key']   = $this->input->post('key') ? $this->input->post('key') : '';
		
        
        
        

        if(isset($post['addbus']) && !empty($post['addbus']))
        {
            $data_insert = array(
                'area'         => $post['addname']
            );

            $proses = $this->BusModel->insert_area($data_insert);

            if($proses){
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }else{
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }

            return redirect('admin/areaController', $data);
        }

		

		if(isset($post['updatebus']) && !empty($post['updatebus'])){
			
			$data_update = array(
				'area'          => $post['editname']
			);

			$proses = $this->BusModel->update_area($post['editid'], $data_update);

			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal mengubah data.</div>';
                
			}

            // return redirect('admin/busController');
		}

		if(isset($post['deletebus']) && !empty($post['deletebus'])){
			$proses = $this->BusModel->delete_area($post['delidbus']);
			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal menghapus data.</div>';
                
			}

		}

		$data['list']   = $this->BusModel->list_area($data['key']);

        // echo "<pre>";
        // print_r($data['list']);
        // die;

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/list_area.php', $data);
		$this->load->view('themeplates/footer');
	}
}