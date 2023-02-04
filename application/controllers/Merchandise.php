<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('merchandise_model');
	}

	// Listing data merchandise
	public function index()
	{
		$site 				= $this->konfigurasi_model->listing();
		// Ambil data total
		$total 				= $this->merchandise_model->total_merchandise();
		// Paginasi start 
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'merchandise/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 8;
		$config['uri_segment'] 		= 4;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['first_url']		= base_url().'/merchandise/';
		$this->pagination->initialize($config);
		// Ambil data merchandise
		$page 		= ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) * $config['per_page']:0;
		$merchandise 	= $this->merchandise_model->merchandise($config['per_page'],$page);
		// Paginasi end

		$data = array( 	'title' 			=> 'Merchandise '.$site->namaweb,
						'site'				=> $site,
						'merchandise'		=> $merchandise,
						'pagin'				=> $this->pagination->create_links(),
						'isi'				=> 'merchandise/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	// Detailed merchandise
	public function detail($slug_merchandise)
	{
		$site 				= $this->konfigurasi_model->listing();
		$merchandise 		= $this->merchandise_model->read($slug_merchandise);
		$id_merchandise 	= $merchandise->id_merchandise;
		$merchandise_related= $this->merchandise_model->home();
		$gambar 			= $this->merchandise_model->gambar($id_merchandise);

		$data = array( 	'title' 				=> $merchandise->nama_merchandise,
						'site'					=> $site,
						'gambar'				=> $gambar,
						'merchandise'			=> $merchandise,
						'merchandise_related'	=> $merchandise_related,
						'isi'					=> 'merchandise/detail'
						);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

}

/* End of file Merchandise.php */
/* Location: ./application/controllers/Merchandise.php */