<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_admin');
	}


	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'totalItem' => $this->m_admin->totalItem(),
			'totalKategori' => $this->m_admin->totalKategori(),
			'contents' => 'v_admin',
		);
		$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
	}
}
