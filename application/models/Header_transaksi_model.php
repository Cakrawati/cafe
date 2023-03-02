<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all header_transaksi
	// public function listing()
	// {
	// 	$this->db->select('header_transaksi.*,
	// 						users.nama,
	// 						SUM(transaksi.jumlah) AS total_item');
	// 	$this->db->from('header_transaksi');
	// 	// JOIN
	// 	$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
	// 	$this->db->join('users', 'users.id_user = header_transaksi.id_user', 'left');
	// 	// $this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
	// 	// END JOIN
	// 	$this->db->group_by('header_transaksi.id_header_transaksi');
	// 	$this->db->order_by('id_header_transaksi', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// listing all header_transaksi
	public function listing()
	{
		$this->db->select('header_transaksi.*,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// JOIN
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		// END JOIN
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// detail header_transaksi
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->select('header_transaksi.*,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// JOIN
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		// END JOIN
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// detail header_transaksi
	public function detail($id_header_transaksi)
	{
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('id_header_transaksi', $id_header_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('header_transaksi', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->update('header_transaksi', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->delete('header_transaksi', $data);
	}

	// Find data by kode transaksi
	public function findByTransaction($kode_transaksi)
	{
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('kode_transaksi', $kode_transaksi);
		$query = $this->db->get();
		return $query->row();
	}

	public function countIncomeByMonth()
	{
		$this->db->select_sum("jumlah_bayar");
		$this->db->from('header_transaksi');
		$this->db->where('status_bayar', 1);
		$this->db->where('month(tanggal_bayar)', date('m'));
		$this->db->where('year(tanggal_bayar)', date('Y'));
		// month(tanggal_bayar) dia ngubah dari yang datetime 2022-09-20 H:i:s
		// month(tanggal_bayar) => 09
		// 08
		$query = $this->db->get();
		return $query->row();
	}

	public function totalIncome()
	{
		$this->db->select_sum("jumlah_bayar");
		$this->db->from('header_transaksi');
		$this->db->where('status_bayar', 1);
		$this->db->where('year(tanggal_bayar)', date('Y'));
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */