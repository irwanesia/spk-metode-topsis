<?php
class Kriteria_model extends CI_Model{

	function get_all_kriteria(){
		$result = $this->db->get('tbl_kriteria');
		return $result; 
	}

	function add_new_row($kode,$nama){
		$data = array(
	        'kode_krt' => $kode,
	        'nama_krt' => $nama
		);
		$this->db->insert('tbl_kriteria', $data);
	}

	function edit_row($id,$kode,$nama){
		$data = array(
	        'kode_krt' => $kode,
	        'nama_krt' => $nama
		);
		$this->db->where('id_krt', $id);
		$this->db->update('tbl_kriteria', $data);
	}

	function delete_row($id){
		$this->db->where('id_krt', $id);
		$this->db->delete('tbl_kriteria');
	}


}