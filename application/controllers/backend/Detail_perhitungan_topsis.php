<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_perhitungan_topsis extends CI_Controller
{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('backend/Topsis_model','topsis_model');
		$this->load->model('backend/Visitor_model','visitor_model');
		$this->load->model('Visitor_model','visitor_model');
		// $this->visitor_model->count_visitor();
		$this->load->helper('text');
	}

	function index($id)
	{
		//$this->output->enable_profiler(TRUE);
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$data['title'] = "Hitung TOPSIS";
		$data['alternatif'] = $this->topsis_model->get_all_alternatif();
		$data['total_alternatif'] = $this->topsis_model->get_total_alternatif();
		$data['kriteria'] = $this->topsis_model->get_kriteria();
		$data['min_max'] = $this->topsis_model->get_min_max_alternatif();
		$data['ambil_id'] = $this->topsis_model->id_visitor($id);
		// $data['pref'] = $this->topsis_model->get_preferensi(); // error nilai float
		$this->load->view('backend/v_detail_perhitungan_topsis',$data);
	}

}