<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
	
	function get_post_header(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	function get_post_header_2(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(2,1);
		$query = $this->db->get();
		return $query;
	}

	function get_post_header_3(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(3,3);
		$query = $this->db->get();
		return $query;
	}

	function get_latest_post(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query;
	}

	function get_popular_post(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_views', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query;
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

	// menjumlahkan masing-masing alternatif
	// function sum_alternatif(){
	// 	$query = $this->db->query("SELECT SUM(pow(k01, 2)) AS total1, SUM(pow(k02, 2)) AS total2, SUM(pow(k03, 2)) AS total3, SUM(pow(k04, 2)) AS total4, SUM(pow(k05, 2)) AS total5 FROM tbl_alternatif");
	// }

	function checking_email($email){
		$query = $this->db->query("SELECT * FROM tbl_subscribe WHERE subscribe_email='$email'");
		return $query;
	}

	function save_subcribe($email){
		$query = $this->db->query("INSERT INTO tbl_subscribe (subscribe_email) VALUES ('$email')");
		return $query;
	}



	function add_topsis($nama, $email, $k01, $k02, $k03, $k04, $k05, $tgl){
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'k01' => $k01,
			'k02' => $k02,
			'k03' => $k03,
			'k04' => $k04,
			'k05' => $k05,
			'date' => $tgl
		);

		$this->db->insert('tbl_visitor', $data);
	}
	

	// function hitung_topsis() {

		// insert dan save nilai kriteria/tbl visitor
		// ambil nilai alternatif 
		// kosongkan table preferensi/truncate
		// hitung nilai topsis
		// insert nilai topsis/preferensi
		// join table preferensi dengan tbl alternatif
		// tammpilkan hasil


	// 	$query1 = $this->db->get('tbl_alternatif');

	// 	// kosongkan tabel preferensi
	// 	$this->db->truncate('tbl_preferensi');

	// 	$query2 = $this->db->query("SELECT SUM(pow(k01, 2)) AS total1, SUM(pow(k02, 2)) AS total2, SUM(pow(k03, 2)) AS total3, SUM(pow(k04, 2)) AS total4, SUM(pow(k05, 2)) AS total5 FROM tbl_alternatif");

	// 	foreach ($query2->result() as $a) {
	// 		$sum1 = $a->total1;
	// 		$sum2 = $a->total2;
	// 		$sum3 = $a->total3;
	// 		$sum4 = $a->total4;
	// 		$sum5 = $a->total5;
	// 	}

	// 	// $this->db->select('*');
	// 	// $this->db->from('tbl_visitor');
	// 	// $this->db->order_by('id', 'desc');
	// 	// $this->db->limit(1);

	// 	// mengambil nilai visitor
	// 	$query3 = $this->db->query("SELECT * FROM tbl_visitor ORDER BY id DESC limit 1");

	// 	$row = $query3->row_array(); // mysqli_fetch_assoc kalo pada nativenya
	// 	$kriteria1 = $row['k01'];
	// 	$kriteria2 = $row['k02'];
	// 	$kriteria3 = $row['k03'];
	// 	$kriteria4 = $row['k04'];
	// 	$kriteria5 = $row['k05'];
		

	// 	// mencari nilai max dan min
	// 	$query4 = $this->db->query("SELECT max(k01) as max1, min(k01) as min1, max(k02) as max2, min(k02) as min2, max(k03) as max3, min(k03) as min3, max(k04) as max4, min(k04) as min4, max(k05) as max5, min(k05) as min5 FROM tbl_alternatif");

	// 	foreach ($query4->result() as $maxmin) {
	// 		# code...
	// 		$maksimal1 = ($maxmin->max1 / sqrt($sum1)) * $kriteria1;
	// 		$maksimal2 = ($maxmin->max2 / sqrt($sum2)) * $kriteria2;
	// 		$maksimal3 = ($maxmin->max3 / sqrt($sum3)) * $kriteria3;
	// 		$maksimal4 = ($maxmin->max4 / sqrt($sum4)) * $kriteria4;
	// 		$maksimal5 = ($maxmin->max5  / sqrt($sum5)) * $kriteria5;

	// 		$minimal1 = ($maxmin->max1 / sqrt($sum1)) * $kriteria1;
	// 		$minimal2 = ($maxmin->max2 / sqrt($sum2)) * $kriteria2;
	// 		$minimal3 = ($maxmin->max3 / sqrt($sum3)) * $kriteria3;
	// 		$minimal4 = ($maxmin->max4 / sqrt($sum4)) * $kriteria4;
	// 		$minimal5 = ($maxmin->max5 / sqrt($sum5)) * $kriteria5;

	// 		foreach ($query1->result() as $a) {

	// 			$y1 = $a->k01 / sqrt($sum1) * $kriteria1;
	// 			$y2 = $a->k02 / sqrt($sum2) * $kriteria2;
	// 			$y3 = $a->k03 / sqrt($sum3) * $kriteria3;
	// 			$y4 = $a->k04 / sqrt($sum4) * $kriteria4;
	// 			$y5 = $a->k05 / sqrt($sum5) * $kriteria5;

	// 			$dPositif = number_format(sqrt(pow(($maksimal1 - $y1), 2) + pow(($maksimal2 - $y2), 2) + pow(($maksimal3 - $y3), 2) + pow(($maksimal4 - $y4), 2) + pow(($maksimal5 - $y5), 2)), 4);

	// 			$dNegatif = number_format(sqrt(pow(($minimal1 - $y1), 2) + pow(($minimal2 - $y2), 2) + pow(($minimal3 - $y3), 2) + pow(($minimal4 - $y4), 2) + pow(($minimal5 - $y5), 2)), 4);

	// 			$pref = $dNegatif / ($dNegatif + $dPositif);

	// 			// $data = array (
	// 			// 	'pref' => $pref
	// 			// );

	// 			$this->db->set("INSERT INTO tbl_preferensi VALUES('','$pref')");
				
	// 		}
	// 	}

	// }

	function hasil_preferensi() {
		$query6 = $this->db->query("SELECT * FROM tbl_preferensi INNER JOIN tbl_alternatif ON id_alt = id ORDER BY pref DESC LIMIT 1");
		return $query6;
	}

}