<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{
		$data = array(
			'title' => 'Admin',
			'contents' => 'v_admin',
		);
		$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
	}
}
