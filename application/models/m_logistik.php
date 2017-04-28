<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logistik extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function input_diagnosa($data){
		$this->db->insert('t_diagnosa', $data);
	}

	public function input_obat($data){
		$this->db->insert('t_obat', $data);
	}

	public function tampil_obat(){
		$this->db->order_by('nama_obat','asc');
		return $this->db->get('t_obat');
	}

	public function edit_data_obat($data, $where){
        $this->db->where($where);
        $this->db->update('t_obat',$data);
    }

    public function hapus_obat($where){
    	$this->db->where($where);
		$this->db->delete('t_obat');
    }

    public function cari_obat($where){
		return $this->db->get_where('t_obat', $where);
	}

	public function select($number, $offset){
		$this->db->order_by('nama_obat','asc');
		return $this->db->get('t_obat', $number, $offset);
	}

	public function total_obat(){
		return $this->db->get('t_obat')->num_rows();
	}

	public function input_item_non_obat($data){
		$this->db->insert('t_medis', $data);
	}

	public function tampil_item_non_obat(){
		$this->db->order_by('nama_item_medis','asc');
		return $this->db->get('t_medis');
	}

	public function edit_item_non_obat($data, $where){
        $this->db->where($where);
        $this->db->update('t_medis',$data);
    }

    public function cari_item_medis($where){
		return $this->db->get_where('t_medis', $where);
	}

	public function hapus_item_medis($where){
    	$this->db->where($where);
		$this->db->delete('t_medis');
    }

}