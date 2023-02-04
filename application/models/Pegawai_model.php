<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all pegawai
	public function listing()
	{
		$this->db->select('pegawai.*,
						users.nama');
		$this->db->from('pegawai');
		//JOIN
		$this->db->join('users', 'users.id_user = pegawai.id_user', 'left');
		//END JOIN
		$this->db->order_by('id_pegawai', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// detail pegawai
	public function detail($id_pegawai)
	{
		$this->db->select('pegawai.*,
						users.nama');
		$this->db->from('pegawai');
		//JOIN
		$this->db->join('users', 'users.id_user = pegawai.id_user', 'left');
		//END JOIN
		$this->db->where('id_pegawai', $id_pegawai);
		// $this->db->order_by('id_pegawai', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// detail pegai by iduser
	public function detailByIduser($id_user)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query->row();
	}

	// Login pegawai
	public function login($pegawainame,$password)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where(array( 'pegawainame'	=>	$pegawainame,
								'password'	=> md5($password)));
		$this->db->order_by('id_pegawai', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('pegawai', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->update('pegawai', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->delete('pegawai', $data);
	}

	// ambil nama pegawai dari nama tabel users
	public function getName($id)
	{
		$this->db->select('users.nama');
		$this->db->from('pegawai');
		$this->db->join('users', 'users.id_user = pegawai.id_user');
		$this->db->where('users.id_user', $id);
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */