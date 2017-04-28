<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_authentication extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_authentication');
	}

	public function index(){
		if($this->session->userdata('status') != "login"){
			$this->load->view('login');
		} else {
			$hakakses = $this->session->userdata('hakakses');
			
			if ($hakakses == 'dokter'){
				redirect(base_url('c_dokter'));
			} elseif ($hakakses == 'pendaftaran') {
				redirect(base_url('c_petugaspendaftaran'));
			} elseif ($hakakses == 'logistik') {
				redirect(base_url('c_logistik'));
			}

		}	
	}

	public function authenticate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username_user' => $username,
			'password_user' => md5($password));

		$jmlbaris = $this->m_authentication->data_login('t_user',$where)->num_rows();

		if ($jmlbaris > 0){
			$query = $this->m_authentication->data_login('t_user',$where)->result();
			$pengguna = '';
			foreach($query as $data){
				$hakakses = $data->level_user;
				if($hakakses == 'dokter'){
					$pengguna = $this->m_authentication->get_nama_dokter($username);
				}else{
					$pengguna = $data->username_user;
				}
				
			}

			$data_session = array(
								'id' => $username,
								'nama' => $pengguna,
								'status' => 'login',
								'hakakses' => $hakakses);

			$this->session->set_userdata($data_session);

			if ($hakakses == 'pendaftaran'){
				redirect(base_url('c_petugaspendaftaran'));
			} elseif ($hakakses == 'dokter'){
				redirect(base_url('c_dokter'));
			} elseif ($hakakses == 'logistik'){
				redirect(base_url('c_logistik'));
			}

		} else {
			$this->load->view('login');
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
}