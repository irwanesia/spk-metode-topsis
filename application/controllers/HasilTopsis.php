<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilTopsis extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Contact_model', 'contact_model');
		$this->load->model('Visitor_model', 'visitor_model');
		$this->load->model('Topsis_model', 'topsis_model');
		$this->visitor_model->count_visitor();
	}
	function index()
	{
		//$this->output->enable_profiler(TRUE);
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$this->load->view('galeri_view', $data);
	}
	
}
