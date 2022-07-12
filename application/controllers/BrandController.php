<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BrandController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function checkLogin()
	{
		if (!$this->session->userdata('loggedIn')) {
			redirect(base_url('/login'));
		}
	}

	public function index()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('BrandModel');
		$data['brand'] = $this->BrandModel->selectBrand();

		$this->load->view('brand/list', $data);
		$this->load->view('admin_template/footer');
	}

	public function create()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('brand/create');
		$this->load->view('admin_template/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('slug_brand', 'Slug', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn nên điền %s']);
		if ($this->form_validation->run() == TRUE) {
			//upload image
			$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
			$config = [
				'upload_path' => './uploads/brand',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$ImageError = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('brand/create', $ImageError);
				$this->load->view('admin_template/footer');
			} else {
				$brand_filename = $this->upload->data('file_name');
				$data = [
					'title' => $this->input->post('title'),
					'slug_brand' => $this->input->post('slug_brand'),
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),
					'image' => $brand_filename,
				];
				$this->load->model('BrandModel');
				$this->BrandModel->insertBrand($data);
				$this->session->set_flashdata('success', 'Add Success Brand');
				redirect(base_url('brand/create'));
			}
		} else {
			$this->create();
		}
	}
}

