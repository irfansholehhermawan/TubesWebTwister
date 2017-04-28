<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_authentication extends CI_Model {

	public function data_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function get_nama_dokter($id){
		$query = $this->db->query('select nama_dokter from t_dokter where id_dokter = '.$id);
		return $query->row('nama_dokter');
	}
	
}