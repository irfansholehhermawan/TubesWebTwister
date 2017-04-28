<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function input_diagnosa($data){
		$this->db->insert('t_diagnosa', $data);
	}

	public function get_data_berobat($id){
    	$this->db->select('*');
	    $this->db->from('t_berobat');
	    $this->db->join('t_pasien', 't_berobat.id_pasien = t_pasien.id_pasien');
	    $this->db->join('t_dokter', 't_berobat.id_dokter = t_dokter.id_dokter');
	    $this->db->where('status = "Belum"');
	    $this->db->where('t_dokter.id_dokter = '.$id);

	    $query = $this->db->get(); 
        
        if ($query->num_rows() >0){
            foreach ($query->result() as $data) {
                $hasilJoin[] = $data;
            }
        	return $hasilJoin;
        }
	}

	public function get_pasien_berobat($id){
    	$this->db->select('*');
	    $this->db->from('t_berobat');
	    $this->db->join('t_pasien', 't_berobat.id_pasien = t_pasien.id_pasien');
	    $this->db->join('t_dokter', 't_berobat.id_dokter = t_dokter.id_dokter');
	    $this->db->where('id_berobat = '.$id);

	    $query = $this->db->get(); 
        
        if ($query->num_rows() >0){
            foreach ($query->result() as $data) {
                $hasilJoin[] = $data;
            }
        	return $hasilJoin;
        }
	}

	public function get_rekam_medis_pasien($id){
    	$this->db->select('*');
	    $this->db->from('t_diagnosa');
	    $this->db->join('t_pasien', 't_diagnosa.id_pasien = t_pasien.id_pasien');
	    $this->db->join('t_dokter', 't_diagnosa.id_dokter = t_dokter.id_dokter');
	    $this->db->where('t_diagnosa.id_pasien = '.$id);
	    $this->db->order_by('t_diagnosa.tgl_diagnosa','desc');

	    $query = $this->db->get(); 
        
        if ($query->num_rows() >0){
            foreach ($query->result() as $data) {
                $hasilJoin[] = $data;
            }
        	return $hasilJoin;
        }

	}

	public function get_pasien($id){
    	$this->db->select('*');
	    $this->db->from('t_pasien');
	    $this->db->where('id_pasien = '.$id);

	    $query = $this->db->get(); 
        
	    return $query;
	}

	public function update_berobat($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function list_obat(){
		return $this->db->get('t_obat');
	}
	
}