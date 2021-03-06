<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	// Load menu kategori produk
	public function nav_produk()
	{
		$this->db->select('produk.*,
						kategori.nama_kategori,
						kategori.slug_kategori');
		$this->db->from('produk');
		//JOIN
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		//$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('kategori.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Konigurasi_model.php */
/* Location: ./application/models/Konigurasi_model.php */