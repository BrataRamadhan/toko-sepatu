<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

		$this->load->model('m_item');
		$this->load->model('m_kategori');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Item',
			'data' => $this->m_item->getData(),
			'contents' => 'item/v_item',
		);
		$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
	}

	// Add a new item
	public function add()
	{

		$this->form_validation->set_rules(
			'item',
			'Item',
			'required',
			array('required' => '%! Harus Diisi')
		);
		$this->form_validation->set_rules(
			'price',
			'Price',
			'required',
			array('required' => '%! Harus Diisi')
		);
		$this->form_validation->set_rules(
			'id_kategori',
			'Kategori',
			'required',
			array('required' => '%! Harus Diisi')
		);
		$this->form_validation->set_rules(
			'description',
			'Description',
			'required',
			array('required' => '%! Harus Diisi')
		);


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/image/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '3000';
			$this->upload->initialize($config);
			$field_name = "photo";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Add Item',
					'data' => $this->m_kategori->getData(),
					'error_upload' => $this->upload->display_errors(),
					'contents' => 'item/v_add',
				);
				$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/image/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'item' => $this->input->post('item'),
					'price' => $this->input->post('price'),
					'description' => $this->input->post('description'),
					'id_kategori' => $this->input->post('id_kategori'),
					'photo' => $upload_data['uploads']['file_name'],
				);
				$this->m_item->add($data);

				$this->session->set_flashdata('pesan', 'Menambahkan data');
				redirect('item');
			}
		}

		$data = array(
			'title' => 'Add Item',
			'data' => $this->m_kategori->getData(),
			'contents' => 'item/v_add',
		);
		$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
	}

	//Update item
	public function edit($id_item)
	{
		$this->form_validation->set_rules(
			'item',
			'Item',
			'required',
			array('required' => '%! Harus Diisi')
		);
		$this->form_validation->set_rules(
			'price',
			'Price',
			'required',
			array('required' => '%! Harus Diisi')
		);
		$this->form_validation->set_rules(
			'id_kategori',
			'Kategori',
			'required',
			array('required' => '%! Harus Diisi')
		);
		$this->form_validation->set_rules(
			'description',
			'Description',
			'required',
			array('required' => '%! Harus Diisi')
		);


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/image/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '3000';
			$this->upload->initialize($config);
			$field_name = "photo";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Update Item',
					'data' => $this->m_kategori->getData(),
					'item' => $this->m_item->get_data($id_item),
					'error_upload' => $this->upload->display_errors(),
					'contents' => 'item/v_edit',
				);
				$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
			} else {
				$item = $this->m_item->get_data($id_item);
				if ($item->photo != "") {
					unlink('./assets/image/' . $item->photo);
				}
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/image/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_item' => $id_item,
					'item' => $this->input->post('item'),
					'price' => $this->input->post('price'),
					'description' => $this->input->post('description'),
					'id_kategori' => $this->input->post('id_kategori'),
					'photo' => $upload_data['uploads']['file_name'],
				);
				$this->m_item->edit($data);

				$this->session->set_flashdata('pesan', 'Merubah data');
				redirect('item');
			}
			//jika mengedit kecuali dengan gambar
			$data = array(
				'id_item' => $id_item,
				'item' => $this->input->post('item'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'id_kategori' => $this->input->post('id_kategori'),
			);
			$this->m_item->edit($data);

			$this->session->set_flashdata('pesan', 'Merubah data');
			redirect('item');
		}

		$data = array(
			'title' => 'Update Item',
			'data' => $this->m_kategori->getData(),
			'item' => $this->m_item->get_data($id_item),
			'contents' => 'item/v_edit',
		);
		$this->load->view('layout/v_wrapper_beckend', $data, FALSE);
	}

	//Delete one item
	public function delete($id_item)
	{
		//hapus image yang berada di folder assets/image
		$item = $this->m_item->get_data($id_item);
		if ($item->photo != "") {
			unlink('./assets/image/' . $item->photo);
		}
		$this->m_item->delete($id_item);
		redirect('item');
	}
}

/* End of file Controllername.php */
