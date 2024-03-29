<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	//LOGO MODEL
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	// Konfigurasi Umum
	public function index()
	{
		$konfigurasi 	= $this->konfigurasi_model->listing();

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb','Nama website','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'			=> 'Konfigurasi Website',
						'konfigurasi' 	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 				= $this->input->post();

			$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
							'namaweb'				=> $i['namaweb'],
							'tagline'				=> $i['tagline'],
							'email'					=> $i['email'],
							'website'				=> $i['website'],
							'telepon'				=> $i['telepon'],
							'alamat'				=> $i['alamat'],
							'facebook'				=> $i['facebook'],
							'instagram'				=> $i['instagram'],
							'deskripsi'				=> $i['deskripsi'],
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi'),'refresh');
		}
		// End masuk database
	}

	// Konfigurasi logo website
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb','Nama Website','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run())
		{
			// Check jika gambar diganti
			if(!empty($_FILES['logo']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/thumbs/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo')){
				
		//End validasi

		$data = array(	'title'			=> 'Konfigurasi Logo Website',
						'konfigurasi'	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/logo'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
			
			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'namaweb'			=> $i['namaweb'],
							//Disimpan nama file gambar
							'logo'				=> $upload_gambar['upload_data']['file_name'],
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi/logo'),'refresh');
		}}else{
			// Edit produk tanpa ganti gambar
			$i = $this->input->post();
			
			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'namaweb'			=> $i['namaweb'],
							//Disimpan nama file gambar
							//'logo'				=> $upload_gambar['upload_data']['file_name'],
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi/logo'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Konfigurasi Logo Website',
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/logo'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Konfigurasi icon website
	public function icon()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb','Nama Website','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run())
		{
			// Check jika gambar diganti
			if(!empty($_FILES['icon']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/thumbs/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('icon')){
				
		//End validasi

		$data = array(	'title'			=> 'Konfigurasi Ikon Website',
						'konfigurasi'	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/icon'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
			
			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'namaweb'			=> $i['namaweb'],
							//Disimpan nama file gambar
							'icon'				=> $upload_gambar['upload_data']['file_name'],
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}else{
			// Edit produk tanpa ganti gambar
			$i = $this->input->post();
			
			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'namaweb'			=> $i['namaweb'],
							//Disimpan nama file gambar
							//'icon'				=> $upload_gambar['upload_data']['file_name'],
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Konfigurasi Ikon Website',
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/icon'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */