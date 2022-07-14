<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->data['category'] = $this->IndexModel->getCategoryHome();
		$this->data['brand'] = $this->IndexModel->getBrandHome();

	}

	public function index()
	{
		$this->data['allProduct'] = $this->IndexModel->getAllProduct();
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);
		$this->load->view('pages/layout', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function category($id)
	{
		$this->data['categoryProduct'] = $this->IndexModel->getCategoryProduct($id);
		$this->data['title'] = $this->IndexModel->getCategoryTitle($id);
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function brand($id)
	{
		$this->data['brandProduct'] = $this->IndexModel->getBrandProduct($id);
		$this->data['title'] = $this->IndexModel->getBrandTitle($id);
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);
		$this->load->view('pages/brand', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function product($id)
	{
		$this->data['product_details'] = $this->IndexModel->getProductDetails($id);
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);
		$this->load->view('pages/product-details', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function login()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}

	public function cart()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}
}
