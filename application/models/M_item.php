<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_item extends CI_Model
{

	public function getData()
	{
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_item.id_kategori', 'left');
		$this->db->order_by('tbl_item.id_item', 'desc');
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_item', $data);
	}

	public function get_data($id_item)
	{
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_item.id_kategori', 'left');

		$this->db->where('id_item', $id_item);

		return $this->db->get()->row();
	}

	public function edit($data)
	{
		$this->db->where('id_item', $data['id_item']);
		$this->db->update('tbl_item', $data);
	}

	function delete($id)
	{
		$this->db->where('id_item', $id);
		$this->db->delete('tbl_item');
	}
}
