<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class BusController extends CI_Controller {
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
		$data['msg'] = '<div class="alert alert-info mt-4" role="alert">Menampilkan Data Bus</div>';
		$data['title'] = 'Data Bus';
        $data['key']   = $this->input->post('key') ? $this->input->post('key') : '';
		
        
        
        

        if(isset($post['addbus']) && !empty($post['addbus']))
        {
            $data_insert = array(
                'name'         => $post['addname'],
				'sifat'		   => $post['addsifat'],
                'bus_number'   => $post['addbusnumber'],
				'pabrikan'		   => $post['addpabrikan'],
				'nomesin'		=> $post['addnomesin'],
				'platnomor'		=> $post['addplatnomor'],
                'status'       => 1,
                'date_updated' => date('Y-m-d H:i:s'),
            );

            $proses = $this->BusModel->insert($data_insert);

            if($proses){
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }else{
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }

            return redirect('admin/busController', $data);
        }

		

		if(isset($post['updatebus']) && !empty($post['updatebus'])){
			
			$data_update = array(
				'name'          => $post['editname'],
				'sifat'			=> $post['editsifat'],
				'bus_number'    => $post['editbusnumber'],
				'pabrikan'		   => $post['editpabrikan'],
				'nomesin'		=> $post['editnomesin'],
				'platnomor'		=> $post['editplatnomor'],
				'status'        => $post['editstatus'],
                'date_updated'  => date('Y-m-d H:i:s')
			);

			$proses = $this->BusModel->update($post['editid'], $data_update);

			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal mengubah data.</div>';
                
			}

            // return redirect('admin/busController');
		}

		if(isset($post['deletebus']) && !empty($post['deletebus'])){
			$proses = $this->BusModel->delete($post['delidbus']);
			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal menghapus data.</div>';
                
			}

		}

		$data['list']   = $this->BusModel->list_data($data['key']);

        // echo "<pre>";
        // print_r($data['list']);
        // die;

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/list_bus.php', $data);
		$this->load->view('themeplates/footer');
	}
}