<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLevel extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_level_model');
		//Proteksi halaman
		$this->simple_login->cek_login();
	}

	//Data User Level Akses
	public function index()
	{
		$users_level = $this->user_level_model->listing();

		$data = array(	'title'			=> 'Data User Level Akses',
						'users_level'	=> $users_level,
						'isi'			=> 'admin/userlevel/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Tambah User Level Akses
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('level_id','Id User Level Akses','required|is_unique[users_level.level_id]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '&s sudah ada. Buat user level akses baru!'));

		$valid->set_rules('nama','Nama User Level Akses','required|is_unique[users_level.nama]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '&s sudah ada. Buat user level akses baru!'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'		=> 'Tambah User Level Akses',
						'isi'		=> 'admin/userlevel/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 				= $this->input->post();

			$data = array(	'level_id'		=> $i['level_id'],
							'nama'			=> $i['nama'],
							'keterangan'	=> $i['keterangan']
							);
			$this->user_level_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/userlevel/'),'refresh');
		}
		// End masuk database
		
	}

	// Edit User Level Akses
	public function edit($level_id)
	{
		$users_level = $this->user_level_model->detail($level_id);

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama user level akses','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'				=> 'Edit User Level Akses',
						'users_level'		=> $users_level, 
						'isi'				=> 'admin/userlevel/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 				= $this->input;

			$data = array(	'level_id'		=> $level_id,
							'nama'			=> $i->post('nama'),
							'keterangan'	=> $i['keterangan']
							);
			$this->user_level_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/userlevel/'),'refresh');
		}
		// End masuk database
		
	}

	// Delete meja
	public function delete($level_id)
	{
		$data = array('level_id' => $level_id);
		$this->user_level_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/userlevel'),'refresh');
	}

}

/* End of file UserLevel.php */
/* Location: ./application/controllers/admin/UserLevel.php */