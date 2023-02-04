<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('user_model');
		//Proteksi halaman
		$this->simple_login->cek_login();
	}

	// profil
	public function index()
	{
		$idUser = $this->session->userdata['id_user'];
		$user = $this->user_model->detail($idUser);
		$pegawai = $this->pegawai_model->detailByIduser($idUser);

		$data = array(	'title'			=> 'Profil',
						'pegawai'		=> $pegawai,
						'user' 			=> $user,
						'users'			=> $this->user_model->listing(), 
						'isi'			=> 'admin/profil'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function update_profile($id_pegawai)
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama pegawai','required',
			array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', 
			array('required' => '%s harus diisi'));
		$valid->set_rules('alamat_pegawai', 'Alamat Pegawai', 'required', 
			array('required' => '%s harus diisi'));
		$valid->set_rules('telepon_pegawai', 'Telepon Pegawai', 'required', 
			array('required' => '%s telepon di isi'));
		if ($valid->run() === false) {
			$this->session->set_flashdata('error', 'Data tidak bisa diubah');
			redirect(base_url('admin/profil/','refresh'));
		} else {
			$pegawai = $this->pegawai_model->detail($id_pegawai);
			$user = $this->session->userdata;
			if ($pegawai->id_user != $user['id_user']) {
				$this->session->set_flashdata('error', 'Data tidak bisa diubah');
				return redirect(base_url('admin/profil/','refresh'));
			}

			$input = $this->input->post();
			if ($input['nama'] !== $user['nama']) {
				$nama = $input['nama'];
				$data = array(
					'id_user' => $user['id_user'],
					'nama'	=> $nama,
				);
				$this->user_model->edit($data);
			}
			$data = array(	
				'id_pegawai'		=> $id_pegawai,
				'jenis_kelamin'		=> $input['jenis_kelamin'],
				'alamat_pegawai'	=> $input['alamat_pegawai'],
				'telepon_pegawai'	=> $input['telepon_pegawai'],
			);
			$this->pegawai_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil diubah');
			redirect(base_url('admin/profil'),'refresh');
		}
	}

	public function update_password()
	{
		// Validasi input
		$valid = $this->form_validation;
		$valid->set_rules('old_password', "Password Lama", 'required', array('required' => '%s harus diisi'));
		$valid->set_rules('new_password', "Password Baru", 'required', array('required' => '%s harus diisi'));
		$valid->set_rules('conf_password', "Password Baru Konfirmasi", 'required', array('required' => '%s harus diisi'));
		if ($valid->run() === false) {
			$this->session->set_flashdata('error', 'Password tidak bisa diubah. silahkan ulangi lagi');
			return redirect(base_url('admin/profil/','refresh'));
		} else {
			$input = $this->input->post();
			if ($input['new_password'] != $input['conf_password']) {
				$this->session->set_flashdata('error', 'Password baru dan konfirmasi password tidak cocok');
				return redirect(base_url('admin/profil'),'refresh');
			}

			$idUser = $this->session->userdata['id_user'];
			$user = $this->user_model->detail($idUser);
			$oldPassword = md5($input['old_password']);

			// checking old password
			if ($oldPassword !== $user->password) {
				$this->session->set_flashdata('error', 'Password lama tidak cocok silahkan diulangi kembali.');
				return redirect(base_url('admin/profil/','refresh'));	
			}

			$data = array(
				'id_user' => $idUser,
				'password' => md5($input['new_password']),
			);
			$this->user_model->edit($data);
			$this->logout();
		}
	}
	public function logout()
	{
		// Ambil fungsi dari simple_login
		$this->simple_login->logout();
	}
}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */