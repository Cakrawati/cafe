<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all meja
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('meja');
		$this->db->order_by('id_meja', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// detail meja
	public function detail($id_meja)
	{
		$this->db->select('*');
		$this->db->from('meja');
		$this->db->where('id_meja', $id_meja);
		$this->db->order_by('id_meja', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login meja
	public function login($mejaname,$password)
	{
		$this->db->select('*');
		$this->db->from('meja');
		$this->db->where(array( 'mejaname'	=>	$mejaname,
								'password'	=> md5($password)));
		$this->db->order_by('id_meja', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('meja', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_meja', $data['id_meja']);
		$this->db->update('meja', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_meja', $data['id_meja']);
		$this->db->delete('meja', $data);
	}

	// get name from findbyid
	public function getNameById($id)
	{
		$detail = $this->detail($id);
		return $detail->nama_meja;
	}

}

/* End of file Meja_model.php */
/* Location: ./application/models/Meja_model.php */