<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

	public function getData()
	{
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_item.id_kategori', 'left');
		$this->db->order_by('tbl_item.id_item', 'desc');
		return $this->db->get()->result();
	}

	public function getDataKategori()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->order_by('id_kategori', 'desc');

		return $this->db->get()->result();
	}

	public function kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get()->row();
	}

	public function getAllItem($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_item.id_kategori', 'left');
		$this->db->where('tbl_item.id_kategori', $id_kategori);;
		return $this->db->get()->result();
	}

	public function detailItem($id_item)
	{
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_item.id_kategori', 'left');
		$this->db->where('id_item', $id_item);

		return $this->db->get()->row();
	}
}
