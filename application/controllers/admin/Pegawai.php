<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('user_model');
		//Proteksi halaman
		$this->simple_login->cek_login();
	}

	//Data pegawai
	public function index()
	{
		$pegawai = $this->pegawai_model->listing();
		foreach($pegawai as $key => $item) {
			$item->nama = $this->pegawai_model->getName($item->id_user)->nama;
		}

		$data = array(	'title'		=> 'Data Pegawai',
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/pegawai/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Tambah Pegawai
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('id_user','Nama pegawai','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'		=> 'Tambah Pegawai',
						'users'		=> $this->user_model->listing(),
						'isi'		=> 'admin/pegawai/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 				= $this->input->post();

			$data = array(	'id_user'			=> $i['id_user'],
							'jenis_kelamin'		=> $i['jenis_kelamin'],
							'alamat_pegawai'	=> $i['alamat_pegawai'],
							'telepon_pegawai'	=> $i['telepon_pegawai'],
							'status_pegawai'	=> $i['status_pegawai'],
							'tanggal_masuk'		=> date('Y-m-d') //case sesitive hours minutes second
							);
			$this->pegawai_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pegawai/'),'refresh');
		}
		// End masuk database
		
	}

	// Edit Pegawai
	public function edit($id_pegawai)
	{
		$pegawai = $this->pegawai_model->detail($id_pegawai);

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('id_user','Nama pegawai','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'		=> 'Edit Pegawai',
						'pegawai'	=> $pegawai,
						'users'		=> $this->user_model->listing(), 
						'isi'		=> 'admin/pegawai/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 				= $this->input->post();

			$data = array(	'id_pegawai'		=> $id_pegawai,
							'id_user'			=> $i['id_user'],
							'jenis_kelamin'		=> $i['jenis_kelamin'],
							'alamat_pegawai'	=> $i['alamat_pegawai'],
							'telepon_pegawai'	=> $i['telepon_pegawai'],
							'status_pegawai'	=> $i['status_pegawai'],
							'tanggal_masuk'		=> $i['tanggal_masuk']//case sesitive hours minutes second
							);
			$this->pegawai_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/pegawai/'),'refresh');
		}
		// End masuk database
	}

	// Delete pegawai
	public function delete($id_pegawai)
	{
		$data = array('id_pegawai' => $id_pegawai);
		$this->pegawai_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pegawai'),'refresh');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/admin/Pegawai.php */