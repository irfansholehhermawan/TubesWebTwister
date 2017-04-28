<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_logistik extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_logistik');
		$this->load->library('pagination');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_authentication'));
		} elseif ($this->session->userdata('hakakses') == 'dokter'){
			redirect(base_url('c_dokter'));
		} elseif ($this->session->userdata('hakakses') == 'pendaftaran'){
			redirect(base_url('c_petugaspendaftaran'));
		}

	}

	public function index(){
		$this->load->view('header');
		$this->load->view('logistik/dashboard');
		$this->load->view('footer');
	}

	public function input_obat(){
		$this->load->view('header');
		$this->load->view('logistik/input_obat');
		$this->load->view('footer');
	}

	public function tampil_obat(){
		$jumlah_data = $this->m_logistik->total_obat();

		$config['base_url']		= base_url().'c_logistik/tampil_obat/';
		$config['total_rows']	= $jumlah_data;
		$config['per_page']		= 3;
		$page 					= $this->uri->segment(3);

		$this->pagination->initialize($config);
		$data['obat'] = $this->m_logistik->select($config['per_page'], $page)->result();

		$this->load->view('header');
		$this->load->view('logistik/data_obat', $data);
		$this->load->view('footer');
	}

	public function simpan_obat(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$tanggal = date_format(date_create($this->input->post('tanggal')), "Y-m-d");
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		
		$where = array('id_obat' => $id);

		$data = array(
				'nama_obat' => $nama,
				'jenis_obat' => $jenis,
				'tglkadaluarsa_obat' => $tanggal,
				'hargajual_obat' => $harga,
				'stok_obat' => $stok
				);

		if(isset($_POST['id'])){
			$this->m_logistik->edit_data_obat($data, $where);
			redirect('c_logistik/tampil_obat');
		} else {
			$this->m_logistik->input_obat($data);
			redirect('c_logistik/tampil_obat');
		}

	}

	public function edit_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_obat' => $id);
		$data['obat'] = $this->m_logistik->cari_obat($where)->result();

		$this->load->view('header');
		$this->load->view('logistik/edit_obat', $data);
		$this->load->view('footer');
	}

	public function hapus_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_obat' => $id);
		$this->m_logistik->hapus_obat($where);
		redirect('c_logistik/tampil_obat');
	}

	public function tampil_item_non_obat(){
		$data['item'] = $this->m_logistik->tampil_item_non_obat()->result();

		$this->load->view('header');
		$this->load->view('logistik/data_medis_non_obat', $data);
		$this->load->view('footer');
	}

	public function input_item_non_obat(){
		$this->load->view('header');
		$this->load->view('logistik/input_medis_non_obat');
		$this->load->view('footer');
	}

	public function simpan_item_non_obat(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tanggal = date_format(date_create($this->input->post('tanggal')), "Y-m-d");
		$harga = $this->input->post('harga');
		$kuantitas = $this->input->post('kuantitas');
		
		$where = array('id_item_medis' => $id);

		$data = array(
				'nama_item_medis' => $nama,
				'tanggal_kadaluarsa_item_medis' => $tanggal,
				'harga_jual_item_medis' => $harga,
				'kuantitas_item_medis' => $kuantitas
				);

		if(isset($_POST['id'])){
			$this->m_logistik->edit_item_non_obat($data, $where);
			redirect('c_logistik/tampil_item_non_obat');
		} else {
			$this->m_logistik->input_item_non_obat($data);
			redirect('c_logistik/tampil_item_non_obat');
		}

	}

	public function edit_item_non_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_item_medis' => $id);
		$data['item'] = $this->m_logistik->cari_item_medis($where)->result();

		$this->load->view('header');
		$this->load->view('logistik/edit_medis_non_obat', $data);
		$this->load->view('footer');
	}

	public function hapus_item_non_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_item_medis' => $id);
		$this->m_logistik->hapus_item_medis($where);
		redirect('c_logistik/tampil_item_non_obat');
	}

}