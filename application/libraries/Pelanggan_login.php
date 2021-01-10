<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('M_auth');
	}

	public function login($email, $password)
	{
		$cek = $this->ci->M_auth->login_pelanggan($email, $password);
		if ($cek) {
			$nama_pelanggan = $cek->nama_pelanggan;
			$email = $cek->email;
			$foto = $cek->foto;

			$this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
			$this->ci->session->set_userdata('email', $email);
			$this->ci->session->set_userdata('foto', $foto);


			redirect('home');
		} else {
			$this->ci->session->set_flashdata('pesan', 'email dan password salah');
			redirect('pelanggan/login');
		}
	}

	public function cekLogin()
	{
		if ($this->ci->session->userdata('nama_pelanggan') == '') {
			$this->ci->session->set_flashdata('error', 'anda belum login');
			redirect('pelanggan/login');
		}
	}
	public function logout()
	{
		$this->ci->session->unset_userdata('nama_pelanggan');
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('foto');
		$this->ci->session->set_flashdata('pesan', 'anda berhasil logout');
		redirect('home');
	}
}

/* End of file LibraryName.php */
