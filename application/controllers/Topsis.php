<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topsis extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Topsiss_model', 'topsiss_model');
		$this->load->model('Visitor_model','visitor_model');
		$this->visitor_model->count_visitor();
	}

	function index()
	{
		//$this->output->enable_profiler(TRUE);
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$data['title'] = "Hitung TOPSIS";
		$data['alternatif'] = $this->topsiss_model->get_alternatif();
		$data['total_alternatif'] = $this->topsiss_model->get_total_alternatif();
		$data['kriteria'] = $this->topsiss_model->get_kriteria();
		$data['min_max'] = $this->topsiss_model->get_min_max_alternatif();
		// $data['pref'] = $this->topsiss_model->get_preferensi();
		$this->load->view('topsiss_view', $data);
	}
}