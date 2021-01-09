<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{



	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_home');
	}


	public function index()
	{
		$data = array(
			'title' => 'Home',
			'item' => $this->m_home->getData(),
			'contents' => 'v_home',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, false);
	}

	public function kategori($id_kategori)
	{
		$kategori = $this->m_home->kategori($id_kategori);
		$data = array(
			'title' => 'Kategori Item' . $kategori->nama_kategori,
			'item' => $this->m_home->getAllItem($id_kategori),
			'contents' => 'v_kategori_item',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, false);
	}

	public function detail_barang($id_item)
	{
		$data = array(
			'title' => 'Detail Item',
			'item' => $this->m_home->detailItem($id_item),
			'contents' => 'v_detail_item',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, false);
	}
}
