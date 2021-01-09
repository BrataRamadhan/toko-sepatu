<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_kategori');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Kategori',
			'data' => $this->m_kategori->getData(),
			'contents' => 'v_kategori',
		);
		$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$this->m_kategori->add($data);

		$this->session->set_flashdata('pesan', 'Menambahkan data');
		redirect('kategori');
	}

	//Update one item
	public function edit()
	{
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$this->m_kategori->edit($data);

		$this->session->set_flashdata('pesan', 'Merubah data');
		redirect('kategori');
	}

	//Delete one item
	public function delete($id)
	{
		$this->m_kategori->delete($id);
		redirect('kategori');
	}
}

/* End of file Controllername.php */
