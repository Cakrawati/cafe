<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all produk
	public function listing()
	{
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		//JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

		public function listing_softdelete()
	{
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		//JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->where('deleted', '0');
		$query = $this->db->get();
		return $query->result();
	}

	// home
	public function home()
	{
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		//JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->where('produk.status_produk','Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	// read produk
	public function read($slug_produk)
	{
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		//JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->where('produk.status_produk','Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Produk
	public function produk($limit,$start)
	{
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		//JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->where('produk.status_produk','Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Total Produk
	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	// Kategori produk
	public function kategori($id_kategori, $limit,$start)
	{
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		//JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->where('produk.status_produk','Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Total Kategori Produk
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}

	// Listing kategori
	public function listing_kategori()
	{
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		//JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//END JOIN
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
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

	// detail all produk
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//Gambar
	public function gambar($id_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('produk', $data);
	}

	// Tambah
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}
		public function edit_softdelete($data,$data1)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data1);
	}
	// Delete
	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}

	// Delete
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);
	}

	public function deletegambarproduk($id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->delete('gambar');
	}

	public function updateStokProduk($getTransaction, $action)
	{
		try{
			foreach ($getTransaction as $key => $value) {
				if ($action == "plus") {
					$count = $value->stok_produk + $value->jumlah;
				} else {
					$count = $value->stok_produk - $value->jumlah;
				}
				$data = array(
					"id_produk" => $value->id_produk,
					"stok_produk" => $count,
				);
				$this->edit($data);
			}
			return true;
		} catch(Exception $e) {
			return false;
		}
	}


}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */