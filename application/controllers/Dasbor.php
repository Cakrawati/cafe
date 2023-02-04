<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		// halaman ini diproteksi dengan Simple_pelanggan => check login
		// $this->simple_pelanggan->cek_login();
	}

	// Halaman Dasbor
	public function index()
	{
		// Ambil data login id_pelanggan dari sistem
		// $id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(	'title' 			=> 'Halaman Dasboard Pelanggan',
						'header_transaksi'	=> $header_transaksi,
						'isi' 				=> 'dasbor/list' 
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// belanja
	public function belanja()
	{
		// Ambil data login id_pelanggan dari sistem
		// $id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'isi' 				=> 'dasbor/belanja' 
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($kode_transaksi)
	{
		// Ambil data login id_pelanggan dari sistem
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi   		= $this->transaksi_model->kode_transaksi($kode_transaksi);

		// pastikan pelanggan hanya mengakses data transaksinya
		if ($header_transaksi->id_pelanggan !=$id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
			redirect(base_url('refresh'));
		}

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi' 				=> 'dasbor/detail' 
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Profil
	public function profil()
	{
		// Ambil data login id_pelanggan dari sistem
		// $id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('alamat','Alamat lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('telepon','Nomot telepon','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title' 			=> 'Profil Saya',
						'pelanggan'			=> $pelanggan,
						'isi' 				=> 'dasbor/profil' 
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input->post();

			// Kalau password lebih dari 6 karakter, maka password diganti
			if (strlen($i['password']) >= 6) {
				$data = array(	'id_pelanggan' 		=> $id_pelanggan,
								'nama_pelanggan'	=> $i['nama_pelanggan'],
								'password'			=> md5($i['password']),
								'telepon'			=> $i['telepon'],
								'alamat'			=> $i['alamat']
								);
			}else{
				// kalau password kurang dari 6 maka password ga diganti
				$data = array(	'id_pelanggan' 		=> $id_pelanggan,
								'nama_pelanggan'	=> $i['nama_pelanggan'],
								'telepon'			=> $i['telepon'],
								'alamat'			=> $i['alamat']
								);
			}
			// End data update
			$this->pelanggan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Update profil berhasil');
			redirect(base_url('dasbor/profil'),'refresh');
			
		}
		// End masuk database	
	}	

	// Konfirmasi pembayaran
	public function konfirmasi($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank','Nama Bank','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pembayaran','Nomor Rekening','required',
			array(	'required'		=> '%s harus diisi'	));

		$valid->set_rules('rekening_pelanggan','Nama Pemilik Rekening','required',
			array(	'required'		=> '%s harus diisi'	));

		$valid->set_rules('tanggal_bayar','Tanggal Pembayaran','required',
			array(	'required'		=> '%s harus diisi'	));

		$valid->set_rules('jumlah_bayar','Jumlah Pembayaran','required',
			array(	'required'		=> '%s harus diisi'	));

		if($valid->run())
		{
			// Check jika gambar diganti
			if(!empty($_FILES['bukti_bayar']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/thumbs/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){
				
		//End validasi

		$data = array(	'title' 			=> 'Konfirmasi Pembayaran',
						'header_transaksi'	=> $header_transaksi,
						'rekening'			=> $rekening,
						'error'				=> $this->upload->display_errors(),
						'isi' 				=> 'dasbor/konfirmasi' 
					);
		$this->load->view('layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// create thumnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250; //pixel
			$config['height']       	= 250; //pixel
			$config['thumb_maker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// end create tumbnail

			$i = $this->input->post();

			$data = array(	'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
							'status_bayar'			=> 'Konfirmasi',
							'jumlah_bayar'			=> $i['jumlah_bayar'],
							'rekening_pembayaran'	=> $i['rekening_pembayaran'],
							'rekening_pelanggan'	=> $i['rekening_pelanggan'],
							// Disimpan nama file gambar (Gambar tidak diganti)
							'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
							'id_rekening'			=> $i['id_rekening'],
							'tanggal_bayar'			=> $i['tanggal_bayar'],
							'nama_bank'				=> $i['nama_bank']
							);
			$this->header_transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil');
			redirect(base_url('dasbor'),'refresh');
		}}else{
			// Edit produk tanpa ganti gambar
			$i = $this->input->post();

			$data = array(	'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
							'status_bayar'			=> 'Konfirmasi',
							'jumlah_bayar'			=> $i['jumlah_bayar'],
							'rekening_pembayaran'	=> $i['rekening_pembayaran'],
							'rekening_pelanggan'	=> $i['rekening_pelanggan'],
							// Disimpan nama file gambar (Gambar tidak diganti)
							// 'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
							'id_rekening'			=> $i['id_rekening'],
							'tanggal_bayar'			=> $i['tanggal_bayar'],
							'nama_bank'				=> $i['nama_bank']
							);
			$this->header_transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil');
			redirect(base_url('dasbor'),'refresh');
		}}
		// End masuk database

		$data = array(	'title' 			=> 'Konfirmasi Pembayaran',
						'header_transaksi'	=> $header_transaksi,
						'rekening'			=> $rekening,
						'isi' 				=> 'dasbor/konfirmasi' 
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */