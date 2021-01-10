<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shooping extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}


	public function index()
	{
		if (empty($this->cart->contents())) {
			redirect('home');
		}
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
		// print_r($data);
		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}

	public function viewCart()
	{
		$data = array(
			'title' => 'View Cart',
			'contents' => 'v_cart',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, false);
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('shooping');
	}

	public function update()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $this->input->post($i . '[qty]'),
			);

			$this->cart->update($data);
			$i++;
		}
		redirect('shooping');
	}
}
