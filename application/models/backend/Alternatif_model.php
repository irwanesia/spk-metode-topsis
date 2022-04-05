<?php
class Alternatif_model extends CI_Model{

	function get_all_alternatif(){
		$result = $this->db->get('tbl_alternatif');
		return $result; 
	}

	function add_new_row($kode,$alternatif,$image,$url,$website,$k01,$k02,$k03,$k04,$k05){
		$data = array(
	        'kode_alt' => $kode,
	        'nama_alt' => $alternatif,
	        'gambar' => $image,
	        'website' => $url,
	        'website_seo' => $website,
	        'k01' => $k01,
	        'k02' => $k02,
	        'k03' => $k03,
	        'k04' => $k04,
	        'k05' => $k05
		);
		$this->db->insert('tbl_alternatif', $data);
	}

	function edit_row($kode,$alternatif,$image,$url,$website,$k01,$k02,$k03,$k04,$k05){
		$data = array(
	        'kode_alt' => $kode,
	        'nama_alt' => $alternatif,
	        'gambar' => $image,
	        'website' => $url,
	        'website_seo' => $website,
	        'k01' => $k01,
	        'k02' => $k02,
	        'k03' => $k03,
	        'k04' => $k04,
	        'k05' => $k05
		);
		$this->db->where('id_alt', $id);
		$this->db->update('tbl_alternatif', $data);
	}

	function delete_row($id){
		$this->db->where('id_alt', $id);
		$this->db->delete('tbl_alternatif');
	}


}