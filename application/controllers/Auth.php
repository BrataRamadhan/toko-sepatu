<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function loginUser()
	{
		$data = array(
			'title' => 'Login',
		);
		$this->load->view('v_login', $data, FALSE);
	}
}
