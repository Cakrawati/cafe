<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('meja_model');
		// load helper random string
		$this->load->helper('string');
	}
	// routing
	// controller + model
	// view

	// Halaman Belanja
	public function index()
	{
		$keranjang	= $this->cart->contents();

		$data	= array(	'title'		=> 'Keranjang Belanja',
							'keranjang'	=> $keranjang,
							'isi'		=> 'belanja/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Halaman Belanja kosong
	public function kosong()
	{
		$keranjang	= $this->cart->contents();

		$data	= array(	'title'		=> 'Keranjang Belanja Kosong',
							'isi'		=> 'belanja/kosong'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Halaman Belanja kosong
	public function spesial()
	{
		$keranjang	= $this->cart->contents();

		$data	= array(	'title'		=> 'Keranjang Belanja Kosong',
							'isi'		=> 'belanja/spesial'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// Halaman Belanja sukses
	public function sukses()
	{
		if (empty($this->session->flashdata('id_keranjang'))) {
			redirect(base_url('/'), 'refresh');
		}
		// id_kerangjang == kode transaksi
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($this->session->flashdata('id_keranjang'));
		$transaksi   		= $this->transaksi_model->kode_transaksi($this->session->flashdata('id_keranjang'));
		

		$data	= array(	'title'		=> 'Belanja Berhasil',
							'header_transaksi' => $header_transaksi,
							'transaksi' => $transaksi,
							'isi'		=> 'belanja/sukses'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Checkout
	public function checkout()
	{
		// die('hehe');
		$keranjang			= $this->cart->contents();
		//var_dump(count($keranjang) == 0);
		//die();
		//$header_transaksi 	= $this->header_transaksi_model->meja();
		$meja 				= $this->meja_model->listing();

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		// $valid->set_rules('telepon','Telepon','required',
		//  	array(	'required'		=> '%s harus diisi'));
		//die($valid->run()); true
		if($valid->run()===FALSE)
		{
			//die('test if first');
			//End validasi

			$data = array( 	'title'				=> 'Checkout',
							'keranjang'			=> $keranjang,
							'meja'				=> $meja,
							'isi'				=> count($keranjang) == 0 ? 'belanja/kosong' : 'belanja/checkout'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input->post();
			//var_dump($this->input->post());
			// $data = array(	'status_pelanggan' 	=> 'Pending',
			// 				'nama_pelanggan'	=> $i['nama_pelanggan'],
			// 				'email'				=> $i['email'],
			// 				'telepon'			=> $i['telepon'],
			// 				'tanggal_daftar'	=> date('Y-m-d H:i:s')
			// 				);
			// $this->pelanggan_model->tambah($data);
			//var_dump($this->meja_model->getNameById($i['id_meja']));
			//die();
			$data = array(	'nama_meja'			=> $i['nama_meja'],
							'nama_pelanggan'	=> $i['nama_pelanggan'],
							'kode_transaksi'	=> $i['kode_transaksi'],
							'tanggal_transaksi'	=> $i['tanggal_transaksi'],
							'jumlah_transaksi'	=> $i['jumlah_transaksi'],
							'status_bayar'		=> 'Belum',
							'tanggal_post'		=> date('Y-m-d H:i:s')
							);
			//var_dump($data);
			//die();
			// Proses masuk ke header transaksi 
			$this->header_transaksi_model->tambah($data);
			// Proses masuk ke tabel transaksi
			foreach ($keranjang as $keranjang) {
				$sub_total = $keranjang['price'] * $keranjang['qty'];

				$data  = array(	'kode_transaksi'	=> $i['kode_transaksi'],
								'id_produk'			=> $keranjang['id'],
								'harga'				=> $keranjang['price'],
								'jumlah'			=> $keranjang['qty'],
								'total_harga'		=> $sub_total,
								'tanggal_transaksi'	=> $i['tanggal_transaksi']
							  );
				$this->transaksi_model->tambah($data);
			}
			// Create session login pelanggan
			// $this->session->set_userdata('email', $i['email']);
			$this->session->set_userdata('nama_pelanggan', $i['nama_pelanggan']);
			// End create session
			// Setelah masuk ke transaksi, maka keranjang dikosongkan lagi
			$this->cart->destroy();
			// End pengosongan keranjang
			$this->session->set_flashdata('sukses', 'Check out berhasil');
			$this->session->set_flashdata('id_keranjang', $i['kode_transaksi']); // baru lempar kode transaksi di flash data
			// flash data sementara nanti otomatis kehapus sendiri
			redirect(base_url('belanja/sukses'),'refresh');
		}
		// End masuk database	
	}

	//Tambahkan ke keranjang belanja
	public function add()
	{
		//Ambil data dari form
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page	= $this->input->post('redirect_page');
		//Proses memasukkan ke keranjang belanja
		$data = array( 	'id'	=> $id,
						'qty'	=> $qty,
						'price'	=> $price,
						'name'	=> $name
						);
		$this->cart->insert($data);
		// Redirect page
		redirect($redirect_page,'refresh'); 
	}

	// Update cart
	public function update_cart($rowid)
	{
		// jika ada data rowid
		if ($rowid) {
			$data = array( 	'rowid' 	=> $rowid,
							'qty'		=> $this->input->post('qty'), 
						);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data keranjang telah diupdate');
			redirect(base_url('belanja/checkout'),'refresh');
		}else{
			// jika tidak ada rowid
			redirect(base_url('belanja/checkout'),'refresh');
		}
	}				

	// Hapus semua isi keranjang belanja 
	public function hapus($rowid)
	{
		// if ($rowid) {
			// Hapus per item keranjang
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data keranjang belanja telah dihapus');
			redirect(base_url('belanja/checkout'),'refresh');
		// }else{
			// Hapus semua
			// $this->cart->destroy();
			// $this->session->set_flashdata('sukses', 'Data keranjang belanja telah dihapus');
			// redirect(base_url('belanja'),'refresh');
		// }
	}

	public function delete()
	{
		$this->cart->destroy();
		$this->session->set_flashdata('sukses', 'Data keranjang belanja telah dihapus');
		redirect(base_url('belanja/checkout'),'refresh');
	}

}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */