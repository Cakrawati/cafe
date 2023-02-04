<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_level_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all level
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('users_level');
		$this->db->order_by('nama', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// detail all level
	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('users_level');
		$this->db->where('level_id', $id);
		$this->db->order_by('level_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('users_level', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('level_id', $data['level_id']);
		$this->db->update('users_level', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('level_id', $data['level_id']);
		$this->db->delete('users_level', $data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */