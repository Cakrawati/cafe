<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('merchandise_model');
		//Proteksi halaman
		$this->simple_login->cek_login();
	}

	//Data merchandise
	public function index()
	{
		$merchandise = $this->merchandise_model->listing();

		$data = array(	'title'			=> 'Data Merchandise',
						'merchandise'	=> $merchandise,
						'isi'			=> 'admin/merchandise/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	//Gambar
	public function gambar($id_merchandise)
	{
		$merchandise 	= $this->merchandise_model->detail($id_merchandise);
		$gambar 		= $this->merchandise_model->gambar($id_merchandise);	

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('judul_gambar','Judul/Nama Gambar','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run())
		{
			$config['upload_path'] 		= './assets/upload/image/thumbs/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
				
				
		//End validasi

		$data = array(	'title'			=> 'Tambah Gambar '.$merchandise->nama_merchandise,
						'merchandise'	=> $merchandise,
						'gambar'		=> $gambar,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/merchandise/gambar'
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
			$data = array(	'id_merchandise'	=> $id_merchandise,
							'judul_gambar'		=> $i['judul_gambar'],
							//Disimpan nama file gambar
							'gambar'			=> $upload_gambar['upload_data']['file_name'],
							);
			$this->merchandise_model->tambah_gambar($data);
			$this->session->set_flashdata('sukses', 'Data gambar telah ditambah');
			redirect(base_url('admin/merchandise/gambar/'.$id_merchandise),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Tambah Gambar '.$merchandise->nama_merchandise,
						'merchandise'	=> $merchandise,
						'gambar'		=> $gambar,
						'isi'			=> 'admin/merchandise/gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah Merchandise
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_merchandise','Nama Merchandise','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_merchandise','Kode Merchandise','required|is_unique[merchandise.kode_merchandise]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat kode merchandise baru'
				));

		if($valid->run())
		{
			$config['upload_path'] 		= './assets/upload/image/thumbs/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
				
				
		//End validasi

		$data = array(	'title'		=> 'Tambah Merchandise',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/merchandise/tambah'
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
			//slug product
			$slug_merchandise = url_title($this->input->post('nama_merchandise').'-'.$this->input->post('kode_merchandise'), 'dash', TRUE);

			$data = array(	'id_user'				=> $this->session->userdata('id_user'),
							'kode_merchandise'		=> $i['kode_merchandise'],
							'nama_merchandise'		=> $i['nama_merchandise'],
							'slug_merchandise'		=> $slug_merchandise,
							'keterangan'			=> $i['keterangan'],
							'keywords'				=> $i['keywords'],
							'harga'					=> $i['harga'],
							'stok_merchandise'		=> $i['stok_merchandise'],
							//Disimpan nama file gambar
							'gambar'				=> $upload_gambar['upload_data']['file_name'],
							'ukuran'				=> $i['ukuran'],
							'status_merchandise'	=> $i['status_merchandise'],
							'tanggal_post'			=> date('Y-m-d H:i:s') //case sesitive hours minutes second
							);
			$this->merchandise_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/merchandise/'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Merchandise',
						'isi'		=> 'admin/merchandise/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit Merchandise
	public function edit($id_merchandise)
	{
		// Ambil data merchandise
		$merchandise 	= $this->merchandise_model->detail($id_merchandise);
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_merchandise','Nama Merchandise','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_merchandise','Kode Merchandise','required',
			array(	'required'		=> '%s harus diisi'	));

		if($valid->run())
		{
			// Check jika gambar diganti
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/thumbs/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		//End validasi

		$data = array(	'title'			=> 'Edit Merchandise: '.$merchandise->nama_merchandise,
						'merchandise'	=> $merchandise,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/merchandise/edit'
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
			//slug product
			$slug_merchandise = url_title($this->input->post('nama_merchandise').'-'.$this->input->post('kode_merchandise'), 'dash', TRUE);

			$data = array(	'id_merchandise'		=> $id_merchandise,
							'id_user'				=> $this->session->userdata('id_user'),
							'kode_merchandise'		=> $i['kode_merchandise'],
							'nama_merchandise'		=> $i['nama_merchandise'],
							'slug_merchandise'		=> $slug_merchandise,
							'keterangan'			=> $i['keterangan'],
							'keywords'				=> $i['keywords'],
							'harga'					=> $i['harga'],
							'stok_merchandise'		=> $i['stok_merchandise'],
							//Disimpan nama file gambar
							'gambar'				=> $upload_gambar['upload_data']['file_name'],
							'ukuran'				=> $i['ukuran'],
							'status_merchandise'	=> $i['status_merchandise']
							);
			$this->merchandise_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/merchandise/'),'refresh');
		}}else{
			// Edit merchandise tanpa ganti gambar
			$i = $this->input->post();
			//slug product
			$slug_merchandise = url_title($this->input->post('nama_merchandise').'-'.$this->input->post('kode_merchandise'), 'dash', TRUE);

			$data = array(	'id_merchandise'	=> $id_merchandise,
							'id_user'			=> $this->session->userdata('id_user'),
							'kode_merchandise'	=> $i['kode_merchandise'],
							'nama_merchandise'	=> $i['nama_merchandise'],
							'slug_merchandise'	=> $slug_merchandise,
							'keterangan'		=> $i['keterangan'],
							'keywords'			=> $i['keywords'],
							'harga'				=> $i['harga'],
							'stok_merchandise'	=> $i['stok_merchandise'],
							// Disimpan nama file gambar (Gambar tidak diganti)
							//'gambar'			=> $upload_gambar['upload_data']['file_name'],
							'ukuran'			=> $i['ukuran'],
							'status_merchandise'=> $i['status_merchandise']
							);
			$this->merchandise_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/merchandise/'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Edit Merchandise: '.$merchandise->nama_merchandise,
						'merchandise'	=> $merchandise,
						'isi'			=> 'admin/merchandise/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Delete merchandise
	public function delete($id_merchandise)
	{
		// Proses hapus gambar
		$merchandise = $this->merchandise_model->detail($id_merchandise);
		unlink('./assets/upload/image/'.$merchandise->gambar);
		unlink('./assets/upload/image/thumbs/'.$merchandise->gambar);
		//End Proses hapus
		$data = array('id_merchandise' => $id_merchandise);
		$this->merchandise_model->delete($data);
		$this->merchandise_model->deletegambarmerchandise($id_merchandise);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/merchandise'),'refresh');
	}

	//Delete gambar merchandise
	public function delete_gambar($id_merchandise,$id_gambar)
	{
		// Proses hapus gambar
		$merchandise = $this->merchandise_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
		//End Proses hapus
		$data = array('id_gambar' => $id_gambar);
		$this->merchandise_model->delete_gambar($data);
		$this->session->set_flashdata('sukses', 'Data gambar telah dihapus');
		redirect(base_url('admin/merchandise/gambar/'.$id_merchandise),'refresh');
	}


}

/* End of file Merchandise.php */
/* Location: ./application/controllers/admin/Merchandise.php */