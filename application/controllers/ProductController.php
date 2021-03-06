<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
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
		$this->config->config['pageAdmin'] = 'List Product';
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('ProductModel');
		$data['product'] = $this->ProductModel->selectAllProduct();

		$this->load->view('product/list', $data);
		$this->load->view('admin_template/footer');
	}

	public function create()
	{
		$this->checkLogin();
		$this->config->config['pageAdmin'] = 'Create Product';
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		//goi brand
		$this->load->model('BrandModel');
		$data['brand'] = $this->BrandModel->selectBrand();

		// goi category
		$this->load->model('CategoryModel');
		$data['category'] = $this->CategoryModel->selectCategory();

		$this->load->view('product/create', $data);
		$this->load->view('admin_template/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('slug_product', 'Slug', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('price', 'Price', 'trim|required', ['required' => 'Bạn nên điền %s']);
		if ($this->form_validation->run() == TRUE) {
			//upload image
			$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
			$config = [
				'upload_path' => './uploads/product',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$ImageError = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('product/create', $ImageError);
				$this->load->view('admin_template/footer');
			} else {
				$product_filename = $this->upload->data('file_name');
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'image' => $product_filename,
					'status' => $this->input->post('status'),
					'slug_product' => $this->input->post('slug_product'),
					'category_id' => $this->input->post('category_id'),
					'brand_id' => $this->input->post('brand_id'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price'),
				];
				$this->load->model('ProductModel');
				$this->ProductModel->insertProduct($data);
				$this->session->set_flashdata('success', 'Add Success Product');
				redirect(base_url('product/create'));
			}
		} else {
			$this->create();
		}
	}

	public function edit($id)
	{
		$this->checkLogin();
		$this->config->config['pageAdmin'] = 'Edit Product';
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		//goi product id
		$this->load->model('ProductModel');
		$data['product'] = $this->ProductModel->selectProductById($id);

		//goi brand
		$this->load->model('BrandModel');
		$data['brand'] = $this->BrandModel->selectBrand();

		// goi category
		$this->load->model('CategoryModel');
		$data['category'] = $this->CategoryModel->selectCategory();

		$this->load->view('product/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('slug_product', 'Slug', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn nên điền %s']);
		$this->form_validation->set_rules('price', 'Price', 'trim|required', ['required' => 'Bạn nên điền %s']);
		if ($this->form_validation->run() == TRUE) {
			if (!empty($_FILES['image']['name'])) {
				//upload image
				$ori_filename = $_FILES['image']['name'];
				$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/product',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$ImageError = array('error' => $this->upload->display_errors());
					$this->load->view('admin_template/header');
					$this->load->view('admin_template/navbar');
					$this->load->view('product/edit', $ImageError);
					$this->load->view('admin_template/footer');
				} else {
					$product_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'image' => $product_filename,
						'status' => $this->input->post('status'),
						'slug_product' => $this->input->post('slug_product'),
						'category_id' => $this->input->post('category_id'),
						'brand_id' => $this->input->post('brand_id'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price'),
					];
				}
			} else {
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),
					'slug_product' => $this->input->post('slug_product'),
					'category_id' => $this->input->post('category_id'),
					'brand_id' => $this->input->post('brand_id'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price'),
				];
			}
			$this->load->model('ProductModel');
			$this->ProductModel->updateProduct($id, $data);
			$this->session->set_flashdata('success', 'Update Success Product');
			redirect(base_url('product/list'));
		} else {
			$this->edit($id);
		}
	}

	public function delete($id)
	{
		$this->load->model('ProductModel');
		$this->ProductModel->deleteProduct($id);
		$this->session->set_flashdata('success', 'Delete Success Product');
		redirect(base_url('product/list'));
	}


}

