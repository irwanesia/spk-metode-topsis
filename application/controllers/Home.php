<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Visitor_model','visitor_model');
		$this->load->model('Home_model','home_model');
		$this->load->model('Site_model','site_model');
        $this->visitor_model->count_visitor();
        $this->load->helper('text');
	}
	function index(){
		//$this->output->enable_profiler(TRUE);
		$site = $this->site_model->get_site_data()->row_array();
		$data['site_name'] = $site['site_name'];
		$data['site_title'] = $site['site_title'];
		$data['site_desc'] = $site['site_description'];
		$data['site_twitter'] = $site['site_twitter'];
		$data['post_header'] = $this->home_model->get_post_header();
		$data['post_header_2'] = $this->home_model->get_post_header_2();
		$data['post_header_3'] = $this->home_model->get_post_header_3();
		$data['latest_post'] = $this->home_model->get_latest_post();
		$data['popular_post'] = $this->home_model->get_popular_post();
		$data['header'] = $this->load->view('header','',TRUE);
		$data['footer'] = $this->load->view('footer','',TRUE);
		$this->load->view('home_view',$data);
	}

	function hasil_rekomendasi(){
		$site = $this->site_model->get_site_data()->row_array();
		$data['site_name'] = $site['site_name'];
		$data['site_title'] = $site['site_title'];
		$data['site_desc'] = $site['site_description'];
		$data['site_twitter'] = $site['site_twitter'];
		$data['post_header'] = $this->home_model->get_post_header();
		$data['post_header_2'] = $this->home_model->get_post_header_2();
		$data['post_header_3'] = $this->home_model->get_post_header_3();
		$data['latest_post'] = $this->home_model->get_latest_post();
		$data['popular_post'] = $this->home_model->get_popular_post();
		$data['header'] = $this->load->view('header','',TRUE);
		$data['footer'] = $this->load->view('footer','',TRUE);
		$data['title'] = "Hitung TOPSIS";
		$data['alternatif'] = $this->home_model->get_alternatif();
		$data['total_alternatif'] = $this->home_model->get_total_alternatif();
		$data['kriteria'] = $this->home_model->get_kriteria();
		$data['min_max'] = $this->home_model->get_min_max_alternatif();
		$this->load->view('topsis_view',$data);
	
	}
	// function index(){
	// 	$x['data'] = $this->category_model->get_all_category();
	// 	$this->load->view('backend/v_category',$x);
	// }

	function subscribe(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			$base_url = site_url();
			redirect($base_url);
		}else{
			$email=$this->input->post('email',TRUE);
			$checking_email = $this->home_model->checking_email($email);
			if($checking_email->num_rows() > 0){
				$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih telah berlangganan.</div>');
				$base_url = site_url();
				redirect($base_url);
			}else{
				$this->home_model->save_subcribe($email);
				$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih telah berlangganan.</div>');
				$base_url = site_url();
				redirect($base_url);
			}
			
		}
	}

	function simpan_data_kriteria() {
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$k01=htmlspecialchars($this->input->post('k01',TRUE),ENT_QUOTES);
		$k02=htmlspecialchars($this->input->post('k02',TRUE),ENT_QUOTES);
		$k03=htmlspecialchars($this->input->post('k03',TRUE),ENT_QUOTES);
		$k04=htmlspecialchars($this->input->post('k04',TRUE),ENT_QUOTES);
		$k05=htmlspecialchars($this->input->post('k05',TRUE),ENT_QUOTES);
		$tgl = $this->input->post('date',TRUE);

		// insert data kriteria/tbl visitor
		$this->home_model->add_topsis($nama, $email, $k01, $k02, $k03, $k04, $k05, $tgl);
		$this->session->set_flashdata('msg','success');

		// $this->home_model->hitung_topsis();

		// // insert nilai topsis/preferensi
		// $this->home_model->hasil_preferensi();

		// // join table preferensi dengan tbl alternatif
		// // tammpilkan hasil


		redirect('home/hasil_rekomendasi');

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
}