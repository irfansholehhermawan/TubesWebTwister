<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dokter extends CI_Controller {

	private $id_dokter;

	public function __construct(){
		parent::__construct();
		$this->load->model('m_dokter');
		$this->id_dokter = $this->session->userdata('id');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_authentication'));
		} elseif ($this->session->userdata('hakakses') == 'pendaftaran'){
			redirect(base_url('c_petugaspendaftaran'));
		} elseif ($this->session->userdata('hakakses') == 'logistik'){
			redirect(base_url('c_logistik'));
		}
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('dokter/dashboard');
		$this->load->view('footer');
	}

	public function input_diagnosa(){
		$data['berobat'] = $this->m_dokter->get_data_berobat($this->id_dokter);
		$this->load->view('header');
		$this->load->view('dokter/data_pasien_berobat',$data);
		$this->load->view('footer');
	}

	public function form_input_diagnosa(){
		$id = $this->uri->segment(3);

		$data['berobat'] = $this->m_dokter->get_pasien_berobat($id);
		$data['obat'] = $this->m_dokter->list_obat()->result();
		$this->load->view('header');
		$this->load->view('dokter/form_input_diagnosa',$data);
		$this->load->view('footer');
	}

	public function simpan_diagnosa(){
		$id_berobat = $this->input->post('id_berobat');
		$keluhan = $this->input->post('keluhan');
		$diagnosa = $this->input->post('diagnosa');
		$tgldiagnosa = date('Y-m-d');
		$id_dokter = $this->session->userdata('id');
		$id_pasien = $this->input->post('id_pasien');
		$data = array(
			'data_keluhan' => $keluhan,
			'data_diagnosa' => $diagnosa,
			'tgl_diagnosa' => $tgldiagnosa,
			'id_dokter' => $id_dokter,
			'id_pasien' => $id_pasien
			);

		$this->m_dokter->input_diagnosa($data);

		$data = array('status' => 'Sudah');
		$where = array('id_berobat' => $id_berobat);
		$this->m_dokter->update_berobat($where,$data,'t_berobat');

		redirect('c_dokter/input_diagnosa');

	}

	public function tampil_rekam_medis_pasien(){
		if(isset($_POST['id'])){
			$id = $this->input->post('id');
			$data['pasien'] = $this->m_dokter->get_pasien($id);
			$data['rekammedispasien'] = $this->m_dokter->get_rekam_medis_pasien($id);
			$this->load->view('header');
			$this->load->view('dokter/data_rekam_medis_pasien',$data);
			$this->load->view('footer');
		} else {
			$this->load->view('header');
			$this->load->view('dokter/cari_rekam_medis_pasien');
			$this->load->view('footer');
		}
	}

	public function statistik_kunjungan(){
		
	}

}