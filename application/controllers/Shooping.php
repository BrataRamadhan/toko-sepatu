<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shooping extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$data = array(
			'title' => 'Keranjang Belanja',

			'contents' => 'v_shooping',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, false);
	}

	public function add()
	{

		$redirect_page = $this->input->post('redirect_page');

		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
		);

		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}
}
