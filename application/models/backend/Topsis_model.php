<?php
class Topsis_model extends CI_Model{
	


	function get_all_visitor(){
		$result = $this->db->get('tbl_visitor');
		return $result; 
	}


	function id_visitor($id){
		$this->db->select('*');
		$this->db->from('tbl_visitor');
		$this->db->where('id', $id);

		return $this->db->get();
	}
	
	function get_all_topsis() {
		$result = $this->db->get('tbl_visitor');
		return $result; 
	}

	function get_all_alternatif() {
		$result = $this->db->get('tbl_alternatif');
		return $result; 
	}
	// function get_all_preferensi() {
	// 	$result = $this->db->get('tbl_preferensi');
	// 	return $result; 
	// }
	function truncate_preferensi() {
		$result = $this->db->truncate('tbl_preferensi');
		return $result; 
	}
	
	function get_alternatif(){
		$sql = "SELECT * FROM tbl_alternatif";
		return $this->db->query($sql);
	}

	function get_total_alternatif(){
		$sql = "SELECT SUM(pow(k01, 2)) AS total1, SUM(pow(k02, 2)) AS total2, SUM(pow(k03, 2)) AS total3, SUM(pow(k04, 2)) AS total4, SUM(pow(k05, 2)) AS total5 FROM tbl_alternatif";
		return $this->db->query($sql);
	}

	function get_kriteria(){
		$sql = "SELECT * FROM tbl_visitor ORDER BY id DESC limit 1";
		return $this->db->query($sql);
	}

	function get_min_max_alternatif(){
		$sql = "SELECT max(k01) as max1, min(k01) as min1, max(k02) as max2, min(k02) as min2, max(k03) as max3, min(k03) as min3, max(k04) as max4, min(k04) as min4, max(k05) as max5, min(k05) as min5 FROM tbl_alternatif";
		return $this->db->query($sql);
	}

	// function get_preferensi() {
	// 	$sql = "SELECT * FROM tbl_preferensi INNER JOIN tbl_alternatif ON id_alt = id ORDER BY pref DESC limit 1";
	// 	return $this->db->query($sql);

	// }

	function delete_row($id){
		$this->db->where('id', $id);
		$this->db->delete('tbl_visitor');
	}

	// function jum_topsis() {
	// 	$sql = "SELECT nama_alt, total FROM tbl_topsis";
	// 	return $this->db->query($sql);
	// }

}