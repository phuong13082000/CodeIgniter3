<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('layout');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function login()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('login');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function contactUs()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('contact-us');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function checkout()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('checkout');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function blog()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('blog');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function blogSingle()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('blog-single');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function cart()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('cart');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function productDetails()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('product-details');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function shop()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('shop');
		$this->load->view('template/footer');
		$this->load->model('IndexModel');
	}

	public function error()
	{
		$this->load->view('template/header');
		$this->load->view('404');
		$this->load->model('IndexModel');
	}

}
