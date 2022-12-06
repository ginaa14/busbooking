<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Locationcontroller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LocationModel');
        $this->load->helper('url');
		cekSession();
		cekMenu();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$post = $this->input->post();
		$data['msg'] = '<div class="alert alert-info mt-4" role="alert">Menampilkan Data Terminal</div>';
		$data['title'] = 'Data Terminal';
        $data['key']   = $this->input->post('key') ? $this->input->post('key') : '';
		
        
        
        

        if(isset($post['addloc']) && !empty($post['addloc']))
        {
            $data_insert = array(
                'terminal_name' => $post['addterminal_name'],
				'city'          => $post['addcity'],
				'state'         => $post['addstate'],
                'status'        => 1,
                'date_updated'  => date('Y-m-d H:i:s')
            );

            $proses = $this->LocationModel->insert($data_insert);

            if($proses){
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }else{
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }

            // return redirect('admin/locationController', $data);
        }

		

		if(isset($post['updateloc']) && !empty($post['updateloc'])){
			
			$data_update = array(
				'terminal_name' => $post['editterminal_name'],
				'city'          => $post['editcity'],
				'state'         => $post['editstate'],
                'status'        => $post['editstatus'],
                'date_updated'  => date('Y-m-d H:i:s')
			);

			$proses = $this->LocationModel->update($post['editid'], $data_update);

			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal mengubah data.</div>';
                
			}
		}

		if(isset($post['deleteloc']) && !empty($post['deleteloc'])){
			$proses = $this->LocationModel->delete($post['delidloc']);
			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal menghapus data.</div>';
                
			}

		}

		$data['list']   = $this->LocationModel->list_data($data['key']);

        // echo "<pre>";
        // print_r($data['list']);
        // die;

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/list_location.php', $data);
		$this->load->view('themeplates/footer');
	}
}