<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_petugaspendaftaran extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function select_pasien(){
		$this->db->order_by('nama_pasien','asc');
		return $this->db->get('t_pasien');
	}
	
	public function cari_pasien($where){
		return $this->db->get_where('t_pasien', $where);
	}

	public function daftar_pasien($data){
		$this->db->insert('t_pasien', $data);
	}

	public function ubah_pasien($table, $data){
		$this->db->update($table, $data);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function edit_data_pasien($data,$id){
        $this->db->where('id_pasien',$id);
        $this->db->update('t_pasien',$data);
    }

    public function hapus_pasien($where){
    	$this->db->where($where);
		$this->db->delete('t_pasien');
    }

    public function daftar_berobat_pasien($data){
		$this->db->insert('t_berobat', $data);
	}

	public function cari_detil_pasien($nama){
		$this->db->from('t_pasien');
		$this->db->where('nama_pasien',$nama);
		$this->db->or_like('nama_pasien',$nama);
		$this->db->or_like('nama_pasien',$nama,'before');
		$this->db->or_like('nama_pasien',$nama,'after');
		return $this->db->get();
	}

	public function lihat_detil_pasien($id){
		$this->db->select('*');
		$this->db->from('t_diagnosa');
		$this->db->join('t_dokter','t_diagnosa.id_dokter = t_dokter.id_dokter');
		$this->db->where('t_diagnosa.id_pasien', $id);
		$this->db->order_by('tgl_diagnosa','desc');
		return $this->db->get();
	}

	public function list_data_berobat(){
		$this->db->select('*');
		$this->db->from('t_berobat');
		$this->db->join('t_dokter','t_berobat.id_dokter = t_dokter.id_dokter');
		$this->db->join('t_pasien','t_berobat.id_pasien = t_pasien.id_pasien');
		$this->db->where('t_berobat.status','Belum');
		return $this->db->get();
	}

}