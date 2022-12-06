<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class ManagerController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ManagerModel');
        $this->load->helper('url');
		cekSession();
		cekMenu();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$post = $this->input->post();
		$data['msg'] = '<div class="alert alert-info mt-4" role="alert">Menampilkan Data Manager</div>';
		$data['title'] = 'Data Manager';
        $data['key']   = $this->input->post('key') ? $this->input->post('key') : '';
		
        
        
        

        if(isset($post['addmanager']) && !empty($post['addmanager']))
        {
            $data_insert = array(
                'name'         => $post['addname'],
				'born'			=> $post['addborn'],
                'jenis_kelamin' => $post['addjk'],
                'alamat'        => $post['addalamat'],
                'email'         => $post['addemail'],
                'no_telp'       => $post['addnotelp'],
                'role'          => 2,
                'username'      => $post['addusername'],
                'password'      => sha1($post['addpassword']),
                'status'       => 1,
                'date_updated' => date('Y-m-d H:i:s'),
            );

            $proses = $this->ManagerModel->insert($data_insert);

            if($proses){
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }else{
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }

            return redirect('admin/ManagerController', $data);
        }

		

		if(isset($post['updatemanager']) && !empty($post['updatemanager'])){
			
			$data_update = array(
				'name'          => $post['editname'],
				'born'			=> $post['editborn'],
                'jenis_kelamin' => $post['editjk'],
                'alamat'        => $post['editalamat'],
                'email'         => $post['editemail'],
                'no_telp'       => $post['editnotelp'],
                'role'          => 2,
                'username'      => $post['editusername'],
                'password'      => sha1($post['editpassword']),
                'status'        => $post['editstatus'],
                'date_updated'  => date('Y-m-d H:i:s'),
            );

			$proses = $this->ManagerModel->update($post['editid'], $data_update);

			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal mengubah data.</div>';
                
			}

            // return redirect('admin/userController');
		}

		if(isset($post['deletemanager']) && !empty($post['deletemanager'])){
			$proses = $this->ManagerModel->delete($post['delidmanager']);
			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal menghapus data.</div>';
                
			}

		}

		$data['list']   = $this->ManagerModel->list_data($data['key']);


		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/list_manager.php', $data);
		$this->load->view('themeplates/footer');
	}
}