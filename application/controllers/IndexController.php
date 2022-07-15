<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->load->library('cart');

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

	public function cart()
	{
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}

	public function add_to_cart()
	{
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_cart_by_id'] = $this->IndexModel->selectProductCartById($product_id);

		//dat hang
		$data = [];
		foreach ($this->data['product_cart_by_id'] as $key => $product) {
			$data = array(
				'id' => $product->id,
				'qty' => $quantity,
				'price' => $product->price,
				'name' => $product->title,
				'options' => array('image' => $product->image)
			);
		}
		$this->cart->insert($data);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function delete_cart($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function delete_all_cart()
	{
		$this->cart->destroy();
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function update_cart_item()
	{
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		$data = [];
		foreach ($this->cart->contents() as $item) {
			if ($rowid == $item['rowid']) {
				$data = array(
					'rowid' => $rowid,
					'qty' => $quantity
				);
			}
		}
		$this->cart->update($data);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function order_cart()
	{
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);
		$this->load->view('pages/checkout');
		$this->load->view('pages/template/footer');
	}

	public function login()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}
}
