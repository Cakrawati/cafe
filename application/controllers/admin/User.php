<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('user_level_model');
		//Proteksi halaman
		$this->simple_login->cek_login();
	}

	//Data user
	public function index()
	{
		$user = $this->user_model->listing();
		foreach($user as $key => $value) {
			$getRole = $this->user_model->getAccessRoleAuth($value->id_user);
			$value->akses_level = $getRole->nama;
		}

		$data = array(	'title'		=> 'Data Pengguna',
						'user'		=> $user,
						'isi'		=> 'admin/user/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Tambah User
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter',
					'is_unique'		=> '%s sudah ada Buat username baru.'));

		$valid->set_rules('password','Password','required',
			array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('akses_level', 'Akses Level', 'required', array( 'required' => '%s harus di isi'));
		if($valid->run()===FALSE)
		{
			//End validasi
			$data = array(	'title'		=> 'Tambah Pengguna',
							'akses_level' => $this->user_level_model->listing(),
							'isi'		=> 'admin/user/tambah'
						);
			// var_dump($data);
			// die();
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input->post();

			$data = array(	'nama'			=> $i['nama'],
							'email'			=> $i['email'],
							'username'		=> $i['username'],
							'password'		=> md5($i['password']),
							'akses_level'	=> $i['akses_level']
							);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user/'),'refresh');
		}
		// End masuk database
		
	}

	// Edit User
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('password','Password','required',
			array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('akses_level', 'Akses Level', 'required', array( 'required' => '%s harus di isi'));
		if($valid->run()===FALSE)
		{
		//End validasi

		$data = array(	'title'		=> 'Edit Pengguna',
						'user'		=> $user,
						'akses_level' => $this->user_level_model->listing(), 
						'isi'		=> 'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input->post();

			$data = array(	'id_user'		=> $id_user,
							'nama'			=> $i['nama'],
							'email'			=> $i['email'],
							'username'		=> $i['username'],
							'password'		=> md5($i['password']),
							'akses_level'	=> $i['akses_level']
							);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/user/'),'refresh');
		}
		// End masuk database
		
	}

	// Delete user
	public function delete($id_user)
	{
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */