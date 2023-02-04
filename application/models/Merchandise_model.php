<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all merchandise
	public function listing()
	{
		$this->db->select('merchandise.*,
						users.nama,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('merchandise');
		//JOIN
		$this->db->join('users', 'users.id_user = merchandise.id_user', 'left');
		$this->db->join('gambar', 'gambar.id_merchandise = merchandise.id_merchandise', 'left');
		//END JOIN
		$this->db->group_by('merchandise.id_merchandise');
		$this->db->order_by('id_merchandise', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// home
	public function home()
	{
		$this->db->select('merchandise.*,
						users.nama,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('merchandise');
		//JOIN
		$this->db->join('users', 'users.id_user = merchandise.id_user', 'left');
		$this->db->join('gambar', 'gambar.id_merchandise = merchandise.id_merchandise', 'left');
		//END JOIN
		$this->db->where('merchandise.status_merchandise','Publish');
		$this->db->group_by('merchandise.id_merchandise');
		$this->db->order_by('id_merchandise', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	// read merchandise
	public function read($slug_merchandise)
	{
		$this->db->select('merchandise.*,
						users.nama,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('merchandise');
		//JOIN
		$this->db->join('users', 'users.id_user = merchandise.id_user', 'left');
		$this->db->join('gambar', 'gambar.id_merchandise = merchandise.id_merchandise', 'left');
		//END JOIN
		$this->db->where('merchandise.status_merchandise','Publish');
		$this->db->where('merchandise.slug_merchandise', $slug_merchandise);
		$this->db->group_by('merchandise.id_merchandise');
		$this->db->order_by('id_merchandise', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Merchandise
	public function merchandise($limit,$start)
	{
		$this->db->select('merchandise.*,
						users.nama,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('merchandise');
		//JOIN
		$this->db->join('users', 'users.id_user = merchandise.id_user', 'left');
		$this->db->join('gambar', 'gambar.id_merchandise = merchandise.id_merchandise', 'left');
		//END JOIN
		$this->db->where('merchandise.status_merchandise','Publish');
		$this->db->group_by('merchandise.id_merchandise');
		$this->db->order_by('id_merchandise', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Total Merchandise
	public function total_merchandise()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('merchandise');
		$this->db->where('status_merchandise', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}


	// detail all gambar
	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// detail all merchandise
	public function detail($id_merchandise)
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->where('id_merchandise', $id_merchandise);
		$this->db->order_by('id_merchandise', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Gambar
	public function gambar($id_merchandise)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_merchandise', $id_merchandise);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('merchandise', $data);
	}

	// Tambah
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_merchandise', $data['id_merchandise']);
		$this->db->update('merchandise', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_merchandise', $data['id_merchandise']);
		$this->db->delete('merchandise', $data);
	}

	// Delete
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);
	}

	public function deletegambarmerchandise($id_merchandise)
	{
		$this->db->where('id_merchandise', $id_merchandise);
		$this->db->delete('gambar');
	}


}

/* End of file Merchandise_model.php */
/* Location: ./application/models/Merchandise_model.php */