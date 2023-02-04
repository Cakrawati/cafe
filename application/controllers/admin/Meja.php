<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('meja_model');
		//Proteksi halaman
		$this->simple_login->cek_login();
	}

	//Data meja
	public function index()
	{
		$meja = $this->meja_model->listing();

		$data = array(	'title'		=> 'Data Meja',
						'meja'		=> $meja,
						'isi'		=> 'admin/meja/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Tambah Meja
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_meja','Nama meja','required|is_unique[meja.nama_meja]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '&s sudah ada. Buat meja baru!'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'		=> 'Tambah Meja ',
						'isi'		=> 'admin/meja/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 				= $this->input->post();

			$data = array(	'nama_meja'	=> $i['nama_meja']
							);
			$this->meja_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/meja/'),'refresh');
		}
		// End masuk database
		
	}

	// Edit Meja
	public function edit($id_meja)
	{
		$meja = $this->meja_model->detail($id_meja);

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_meja','Nama meja','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'		=> 'Edit Meja ',
						'meja'		=> $meja, 
						'isi'		=> 'admin/meja/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 				= $this->input;

			$data = array(	'id_meja'	=> $id_meja,
							'nama_meja'	=> $i->post('nama_meja')
							);
			$this->meja_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/meja/'),'refresh');
		}
		// End masuk database
		
	}

	// Delete meja
	public function delete($id_meja)
	{
		$data = array('id_meja' => $id_meja);
		$this->meja_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/meja'),'refresh');
	}

}

/* End of file Meja.php */
/* Location: ./application/controllers/admin/Meja.php */