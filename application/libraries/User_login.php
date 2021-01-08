<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('M_auth');
	}
	
	public function login($username, $password){
		$cek = $this->ci->M_auth->login_user($username, $password);
		if ($cek){
			$nama_user = $cek->nama_user;
			$username = $cek->username;
			$level_user = $cek->level_user;

			$this->ci->session->set_userdata('username',$username);
			$this->ci->session->set_userdata('nama_user',$nama_user);
			$this->ci->session->set_userdata('level_user',$level_user);

			redirect('admin');
		}else{
			$this->ci->session->set_flashdata('pesan', 'username dan password salah');
			redirect('auth/login_user');
		}
	}

	public function cekLogin(){
		if($this->ci->session->userdata('username')==''){
			$this->ci->session->set_flashdata('error', 'anda belum login');
			redirect('auth/login_user');
		}
	}
	public function logout(){
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('nama_user');
		$this->ci->session->unset_userdata('level_user');
		$this->ci->session->set_flashdata('pesan', 'anda berhasil logout');
		redirect('auth/login_user');
	}
}

/* End of file LibraryName.php */
