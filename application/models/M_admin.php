<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function totalItem()
	{
		return $this->db->get('tbl_item')->num_rows();
	}

	public function totalKategori()
	{
		return $this->db->get('tbl_kategori')->num_rows();
	}
}
