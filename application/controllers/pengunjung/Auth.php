<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$data['title'] = 'Login';
        $data['msg']   = $this->session->flashdata('msg') ? $this->session->flashdata('msg') : '';
        // $data['msg']   = '<p style="color:red">Email atau Password yang kamu masukkan, salah!</p>';
        $data['email']      = $param['email']       = $this->input->post('email') ? $this->input->post('email') : '';
        $data['password']   = $param['password']    = $this->input->post('password') ? $this->input->post('password') : '';
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->input->post('login')){
            $cekemail   = $this->Auth_model->cekemailuser($data['email']);

            if($cekemail == 1){
                $cekloginuser = $this->Auth_model->cekloginuser($data['email'], sha1($data['password']));

                if(isset($cekloginuser) && !empty($cekloginuser)){
                    $data['msg']   = '<p style="color:green">Berhasil login!</p>';

                    $this->session->set_userdata('pengunjung', $cekloginuser); 
                    
                    redirect('Pengunjung/Booking/index');
                    
                }else{
                    $data['msg']   = '<p style="color:red">Password yang kamu masukkan, salah!</p>';
                }
            }else{
                $data['msg']   = '<p style="color:red">Email yang kamu masukkan tidak terdaftar pada sistem</p>';
            }
        }


        $this->load->view('pengunjung/templates/header', $data);
		$this->load->view('pengunjung/auth/login', $data);
        $this->load->view('pengunjung/templates/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('pengunjung');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Anda Berhasil Logout.</div>');
		redirect('pengunjung/Home');
	}

    public function register(){
        $data = array();
        $data['msg']            = '';
        $data['title']          = 'Form Pendaftaran Akun';
        $data['nama_lengkap']   = $this->input->post('nama_lengkap') ? $this->input->post('nama_lengkap') : '';
        $data['born_date']      = $this->input->post('born_date') ? $this->input->post('born_date') : '';
        $data['jenis_kelamin']  = $this->input->post('jenis_kelamin') ? $this->input->post('jenis_kelamin') : '';
        $data['alamat']         = $this->input->post('alamat') ? $this->input->post('alamat') : '';
        $data['notelp']         = $this->input->post('notelp') ? $this->input->post('notelp') : '';
        $data['email']          = $this->input->post('email') ? $this->input->post('email') : '';
        $data['username']       = $this->input->post('username') ? $this->input->post('username') : '';
        $data['password']       = $this->input->post('password') ? $this->input->post('password') : '';

        if($this->input->post('register')){
            $data_insert = array(
                'name'      => $data['nama_lengkap'],
                'born'      => date('Y-m-d', strtotime($data['born_date'])),
                'jenis_kelamin' => $data['jenis_kelamin'],
                'alamat'    => $data['alamat'],
                'email'     => $data['email'],
                'no_telp'   => $data['notelp'],
                'role'      => 3,
                'username'  => $data['username'],
                'password'  => sha1($data['password']),
                'status'    => 1,
                'date_updated' => date('Y-m-d H:i:s')
            );

            $cek_email = $this->Auth_model->cek_email($data['email']);

            if($cek_email != 0){
                $data['msg']   = '<p style="color:red">Email telah digunakan, silahkan gunakan email lain!</p>';
            }else{
                $proses = $this->Auth_model->register_user($data_insert);

                if($proses){
                    $data['msg']            = '<p style="color:green">Berhasil melakukan pendaftaran, silahkan login pada halaman login!</p>';
                    $data['title']          = 'Form Pendaftaran Akun';
                    $data['nama_lengkap']   = '';
                    $data['born_date']      = '';
                    $data['jenis_kelamin']  = '';
                    $data['alamat']         = '';
                    $data['notelp']         = '';
                    $data['email']          = '';
                    $data['username']       = '';
                    $data['password']       = '';
                }else{
                    $data['msg']   = '<p style="color:red">Pendaftaran akun gagal!</p>';
                }
            }
        }

        $data['opt_jk'] = array(
            'Laki-laki' => 'Laki-laki',
            'Perempuan' => 'Perempuan'
        );

        $this->load->view('pengunjung/templates/header', $data);
		$this->load->view('pengunjung/auth/register', $data);
        $this->load->view('pengunjung/templates/footer');
    }
}