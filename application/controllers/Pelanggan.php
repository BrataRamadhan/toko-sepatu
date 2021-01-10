<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_pelanggan');
		$this->load->model('m_auth');
	}


	public function register()
	{

		$this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required', array(
			'required' => 'wajib diisi'
		));
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_pelanggan.email]', array(
			'required' => 'wajib diisi',
			'is_unique' => 'email sudah terdaftar'
		));
		$this->form_validation->set_rules('password', 'password', 'required', array(
			'required' => 'wajib diisi'
		));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi password', 'required|matches[password]', array(
			'required' => 'wajib diisi',
			'matches' => 'Password salah'
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Register Pelanggan',
				'contents' => 'v_register',
			);
			$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$this->m_pelanggan->register($data);
			$this->session->set_flashdata('pesan', 'Berhasil register, Silahkan Login!!!');
			redirect('pelanggan/register');
		}

		$data = array(
			'title' => 'Register Pelanggan',
			'contents' => 'v_register',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function login()
	{

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->pelanggan_login->login($email, $password);
		}

		$data = array(
			'title' => 'Login Pelanggan',
			'contents' => 'v_login_pelanggan',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function logout()
	{
		$this->pelanggan_login->logout();
	}

	public function akun()
	{
		$this->pelanggan_login->cekLogin();
		$data = array(
			'title' => 'Akun saya',
			'contents' => 'v_akun_saya',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}
}
