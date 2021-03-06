<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
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
		$this->config->config['pageAdmin'] = 'List Category';
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('CategoryModel');
		$data['category'] = $this->CategoryModel->selectCategory();

		$this->load->view('category/list', $data);
		$this->load->view('admin_template/footer');
	}

	public function create()
	{
		$this->checkLogin();
		$this->config->config['pageAdmin'] = 'Create Category';
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->view('category/create');

		$this->load->view('admin_template/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('slug_category', 'Slug', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn nên điền %s']);
		if ($this->form_validation->run() == TRUE) {
			//upload image
			$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
			$config = [
				'upload_path' => './uploads/category',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$ImageError = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('category/create', $ImageError);
				$this->load->view('admin_template/footer');
			} else {
				$category_filename = $this->upload->data('file_name');
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'image' => $category_filename,
					'status' => $this->input->post('status'),
					'slug_category' => $this->input->post('slug_category'),
				];
				$this->load->model('CategoryModel');
				$this->CategoryModel->insertCategory($data);
				$this->session->set_flashdata('success', 'Add Success Category');
				redirect(base_url('category/create'));
			}
		} else {
			$this->create();
		}
	}

	public function edit($id)
	{
		$this->checkLogin();
		$this->config->config['pageAdmin'] = 'Edit Category';
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('CategoryModel');
		$data['category'] = $this->CategoryModel->selectCategoryById($id);

		$this->load->view('category/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('slug_category', 'Slug', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn nên điền %s']);
		if ($this->form_validation->run() == TRUE) {
			if (!empty($_FILES['image']['name'])) {
				//upload image
				$ori_filename = $_FILES['image']['name'];
				$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/category',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$ImageError = array('error' => $this->upload->display_errors());
					$this->load->view('admin_template/header');
					$this->load->view('admin_template/navbar');
					$this->load->view('category/edit', $ImageError);
					$this->load->view('admin_template/footer');
				} else {
					$category_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'image' => $category_filename,
						'status' => $this->input->post('status'),
						'slug_category' => $this->input->post('slug_category'),
					];
				}
			} else {
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),
					'slug_category' => $this->input->post('slug_category'),
				];
			}
			$this->load->model('CategoryModel');
			$this->CategoryModel->updateCategory($id, $data);
			$this->session->set_flashdata('success', 'Update Success Category');
			redirect(base_url('category/list'));
		} else {
			$this->edit($id);
		}
	}

	public function delete($id){
		$this->load->model('CategoryModel');
		$this->CategoryModel->deleteCategory($id);
		$this->session->set_flashdata('success', 'Delete Success Category');
		redirect(base_url('category/list'));
	}
}

