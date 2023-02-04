<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_transaksi_model');
	}

	// Halaman Dasor Admin
	public function index()
	{
		//month(now())
		// $result = $this->header_transaksi_model->countIncomeByMonth();
		// var_dump($result);
		// die();
		// total produk, jumlah income per bulan, total semua income
		$datas = array();
		$datas['TotalProduk']   = $this->db->get('produk')->num_rows();
        $datas['TotalIncomeMonth'] = $this->header_transaksi_model->countIncomeByMonth();
        $datas['TotalIncomeAll']  = $this->header_transaksi_model->totalIncome();

        // $this->template->display('admin/home_v', $data);
		$data = array(	'title' 	=> 'Halaman Administrator',
						'isi' 		=> 'admin/dasbor/list',
						'data'		=> $datas);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file dasbor.php */
/* Location: ./application/controllers/admin/dasbor.php */