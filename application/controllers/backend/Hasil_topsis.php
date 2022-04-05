<?php
class Hasil_topsis extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('backend/Topsis_model','topsis_model');
		$this->load->helper('text');
	}

	function index(){
		$x['data'] = $this->topsis_model->get_all_visitor();
		$this->load->view('backend/v_hasil_topsis',$x);
	}

	

	// function save(){
	// 	$category = strip_tags(htmlspecialchars($this->input->post('category',TRUE),ENT_QUOTES));
	// 	$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $category);
	// 	$trim     = trim($string);
	// 	$slug     = strtolower(str_replace(" ", "-", $trim));
	// 	$this->category_model->add_new_row($category,$slug);
	// 	$this->session->set_flashdata('msg','success');
	// 	redirect('backend/category');
	// }

	// function edit(){
	// 	$id		  = $this->input->post('kode',TRUE);
	// 	$category = strip_tags(htmlspecialchars($this->input->post('category2',TRUE),ENT_QUOTES));
	// 	$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $category);
	// 	$trim     = trim($string);
	// 	$slug     = strtolower(str_replace(" ", "-", $trim));
	// 	$this->category_model->edit_row($id,$category,$slug);
	// 	$this->session->set_flashdata('msg','info');
	// 	redirect('backend/category');
	// }

	function delete(){
		$id = $this->input->post('id',TRUE);
		$this->kriteria_model->delete_row($id);
		$this->session->set_flashdata('msg','success-delete');
		redirect('backend/hasil_topsis');
	}
}