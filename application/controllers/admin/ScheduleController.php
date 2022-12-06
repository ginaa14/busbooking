<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class ScheduleController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ScheduleModel');
        $this->load->helper('url');
		cekSession();
		cekMenu();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$post = $this->input->post();
		$data['msg'] = '<div class="alert alert-info mt-4" role="alert">Menampilkan Daftar Schedule</div>';
		$data['title'] = 'Data Schedule';
        $data['key']   = $this->input->post('key') ? $this->input->post('key') : '';
		
        
        
        

        if(isset($post['addschedule']) && !empty($post['addschedule']))
        {
            $idd = date('mdHis');
            $data_insert = array(
                'id'            => $idd,
                'bus_id'        => $post['addjenisbus'],
                'from_location' => $post['addfrom'],
                'to_location'   => $post['addto'],
                'departure_time'=> $post['addtdeptime'],
                'eta'           => $post['addeta'],
                'status'        => 1,
                'availability'  => $post['addavail'],
                'price'         => $post['addprice'],
                'date_updated'  => date('Y-m-d H:i:s')
            );

                for($i = 1; $i <= $post['addavail']; $i++){
                    $data_kursi = array(
                        'id_schedule'   => $idd,
                        'number'        => $i,
                        'status'        => 0,
                        'created_at'    => date('Y-m-d H:i:s')
                    );

                    $insert_kursi = $this->ScheduleModel->insertkursi($data_kursi);
                }
            $proses = $this->ScheduleModel->insert($data_insert);

            if($proses){
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }else{
                $data['msg'] = '<div class="alert alert-info mt-4" role="alert">Berhasil menambah data.</div>';
            }

            return redirect('admin/ScheduleController', $data);
        }

		

		if(isset($post['updateschedule']) && !empty($post['updateschedule'])){
			
			$data_update = array(
				'bus_id'        => $post['editjenisbus'],
                'from_location' => $post['editfrom'],
                'to_location'   => $post['editto'],
                'departure_time'=> $post['edittdeptime'],
                'eta'           => $post['editeta'],
                'status'        => 1,
                'availability'  => $post['editavail'],
                'price'         => $post['editprice'],
                'date_updated'  => date('Y-m-d H:i:s')
            );

			$proses = $this->ScheduleModel->update($post['editid'], $data_update);

			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal mengubah data.</div>';
                
			}

            // return redirect('admin/busController');
		}

		if(isset($post['deleteschedule']) && !empty($post['deleteschedule'])){
			$proses = $this->ScheduleModel->delete($post['delidschedule']);
            
			if($proses){
				$data['msg'] = '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus data.</div>';
                        
			}else{
				$data['msg'] = '<div class="alert alert-danger mt-4" role="alert">Gagal menghapus data.</div>';
                
			}

		}

        $data['optbus'] = $this->ScheduleModel->list_bus();
        $data['optloc'] = $this->ScheduleModel->list_loc();

        // echo "<pre>";
        // print_r($data['optbus']);
        // print_r($data['optloc']);
        // die;

		$data['list']   = $this->ScheduleModel->list_data($data['key']);

        // echo "<pre>";
        // print_r($data['list']);
        // die;

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/list_schedule.php', $data);
		$this->load->view('themeplates/footer');
	}
}