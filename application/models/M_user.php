<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	public function getData()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->order_by('id_user', 'desc');

		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user', $data);
	}
}

/* End of file ModelName.php */
