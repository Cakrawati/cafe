

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		// $this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('produk_model');
	}

	// Load data transaksi
	public function bayar()
	{
		// var_dump(date("Y-m-d H:i:s", strtotime($tanggal_bayar)));
		//var_dump($tanggal_transaksi);
		// die();
		// string(10) "2022-09-20"
		// Y-m-d H:i:s
		$kode_transaksi   = $this->input->post('kode_transaksi', 'true');
		$getTransaction = $this->transaksi_model->kode_transaksi($kode_transaksi);
		// checking stock product is exist
		foreach ($getTransaction as $key => $value) {
			$count = $value->stok_produk - $value->jumlah;
			if ($count < 0) {
				$this->session->set_flashdata('error', 'Stok habis woi di '. $value->nama_produk);
        		redirect(base_url('admin/transaksi/detail/'.$kode_transaksi),'refresh');
        		return;
			}
		}
		
        // $dataJumlah = $this->db->select_sum('jumlah', 'qty')->get_where('transaksi', array('kode_transaksi' => $kode_transaksi))->row();
        // $qty        = $dataJumlah->qty;
        $grandtotal = $this->input->post('grandtotal', 'true');
        $jumlah_bayar = $this->input->post('bayar', 'true');
        if($jumlah_bayar < $grandtotal) {
        	$this->session->set_flashdata('error', 'Duitnya kurang woi');
        	redirect(base_url('admin/transaksi/detail/'.$kode_transaksi),'refresh');
        }
        $data       = array(
            'diskon'    	=> $this->input->post('diskon', 'true'),
            'jumlah_bayar'  => $this->input->post('bayar', 'true'),
            'kembali'   	=> $this->input->post('kembali', 'true'),
            'tanggal_bayar' => date("Y-m-d H:i:s", strtotime($this->input->post('tanggal_bayar', true))),
            'nama_kasir' 	=> $this->session->userdata('nama'),
            'status_bayar'  => 1, // Bayar
        );

        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('header_transaksi', $data);

        //updating stock produk
        // getTransaction from function transaksi_model->kode_transaksi
        $statUpdate = $this->produk_model->updateStokProduk($getTransaction, "minus");
        if ($statUpdate == false) {
        	var_dump("ada error");
        	die();
        }
        $this->session->set_flashdata('sukses', 'Transaksi telah dibayar');
		redirect(base_url('admin/transaksi/detail/'.$kode_transaksi),'refresh');

	}

	// Load data transaksi
	public function index()
	{
		$header_transaksi	= $this->header_transaksi_model->listing();
		// var_dump($header_transaksi);
		// die();

		$data = array( 	'title' 			=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list' 
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi   		= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi' 				=> 'admin/transaksi/detail' 
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	
	// Cetak
	public function cetak($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi   		= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

	public function status($kode_transaksi)
	{
		// kalau status bayar di db 0
		// disini kan mau diubah jadi 1 atau sebaliknya
		// cek status bayar itu kalau kondisi 0 mau di ubah ke satu 
		// kalau sebaliknya dia yang kirim ke db itu null
		$header = $this->header_transaksi_model->findByTransaction($kode_transaksi);
		$getTransaction = $this->transaksi_model->kode_transaksi($kode_transaksi);

		// checking if transaction still need approve
		// if from approve to disapprove will not execute
		if (!$header->status_bayar) {
			// checking stock product is exist
			foreach ($getTransaction as $key => $value) {
				$count = $value->stok_produk - $value->jumlah;
				if ($count < 0) {
					$this->session->set_flashdata('error', 'Stok habis woi di'. $value->nama_produk);
	        		redirect(base_url('admin/transaksi/detail/'.$kode_transaksi),'refresh');
	        		return;
				}
			}
		}

		$header->tanggal_bayar = $header->status_bayar ? 'NULL' : date('Y-m-d H:i:s'); // 9-08-2022, 2022-08-09 00:00:00
		$header->jumlah_bayar = $header->status_bayar ? 'NULL' : $header->jumlah_transaksi;
		$header->status_bayar = !$header->status_bayar;  // dari database 0 trus diclick update !0 == 1
		$header->nama_kasir = $this->session->userdata('nama');
		$header = json_decode(json_encode($header), true);
		$this->header_transaksi_model->edit($header);

		//counting stock again
		// 1 == true
		// 0 == false
		if ($header->status_bayar) {
			$statUpdate = $this->produk_model->updateStokProduk($getTransaction, "minus");
	        if ($statUpdate == false) {
	        	var_dump("update minus");
	        	die();
	        }
		} else {
			$statUpdate = $this->produk_model->updateStokProduk($getTransaction, "plus");
	        if ($statUpdate == false) {
	        	var_dump("update plus");
	        	die();
	        }
		}

		redirect('admin/transaksi');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */