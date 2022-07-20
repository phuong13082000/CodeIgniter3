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
		$this->config->config['pageTitle'] = $this->data['title'];

		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);

		$this->load->view('pages/category', $this->data);

		$this->load->view('pages/template/footer');
	}

	public function brand($id)
	{
		$this->data['brandProduct'] = $this->IndexModel->getBrandProduct($id);
		$this->data['title'] = $this->IndexModel->getBrandTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];

		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);

		$this->load->view('pages/brand', $this->data);

		$this->load->view('pages/template/footer');
	}

	public function product($id)
	{
		$this->data['product_details'] = $this->IndexModel->getProductDetails($id);
		$this->data['title'] = $this->IndexModel->getProductTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];

		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);

		$this->load->view('pages/product-details', $this->data);

		$this->load->view('pages/template/footer');
	}

	public function cart()
	{
		$this->config->config['pageTitle'] = 'Cart';
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
		//redirect(base_url() . 'gio-hang', 'refresh');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function checkout()
	{
		$this->config->config['pageTitle'] = 'Checkout';
		//đăng nhập
		//có hàng hóa trong giỏ hàng
		if ($this->session->userdata('LoggedInCustomer') && $this->cart->contents()) {
			$this->load->view('pages/template/header', $this->data);
			$this->load->view('pages/template/navbar', $this->data);
			$this->load->view('pages/checkout');
			$this->load->view('pages/template/footer');
		} else {
			redirect(base_url() . 'gio-hang');
		}
	}

	public function login()
	{
		$this->config->config['pageTitle'] = 'Login';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/navbar', $this->data);
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success', 'Logout Successfully');
		redirect(base_url('/dang-nhap'));
	}

	public function login_customer()
	{
		$this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Bạn nên cung cấp %s']);

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$this->load->model('LoginModel');
			$result = $this->LoginModel->checkLoginCustomer($email, $password);

			if (count($result) > 0) {
				$session_array = [
					'id' => $result[0]->id,
					'username' => $result[0]->name,
					'email' => $result[0]->email,
				];

				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'Login Successfully');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'Sai Email hoặc Password, Hãy đăng nhập lại');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->login();
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('address', 'Address', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Bạn nên cung cấp %s']);

		if ($this->form_validation->run()) {
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$data = array(
				'name' => $name,
				'phone' => $phone,
				'address' => $address,
				'email' => $email,
				'password' => $password,
			);

			$this->load->model('LoginModel');
			$result = $this->LoginModel->newCustomer($data);

			if ($result) {
				$session_array = [
					'username' => $name,
					'email' => $email
				];

				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'Login Successfully');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'Lỗi');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->login();
		}
	}

	public function confirm_checkout()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('address', 'Address', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Bạn nên cung cấp %s']);
		if ($this->form_validation->run() == TRUE) {
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$shipping_method = $this->input->post('shipping_method');

			$data = array(
				'name' => $name,
				'phone' => $phone,
				'address' => $address,
				'email' => $email,
				'method' => $shipping_method,
			);

			$this->load->model('LoginModel');
			$result = $this->LoginModel->newShipping($data);

			if ($result) {
				//order
				$order_code = rand(00, 9999);
				$data_order = array(
					'order_code' => $order_code,
					'shipping_id' => $result,
					'status' => 1
				);
				$insert_order = $this->LoginModel->insert_order($data_order);

				//order details
				foreach ($this->cart->contents() as $items) {
					$data_order_details = array(
						'order_code' => $order_code,
						'product_id' => $items['id'],
						'quantity' => $items['qty']
					);
					$insert_order_details = $this->LoginModel->insert_order_details($data_order_details);
				}

				$this->session->set_flashdata('success', 'Đặt hàng thành công!');
				$this->cart->destroy();
				redirect(base_url('/'));
			} else {
				$this->session->set_flashdata('error', 'Đặt hàng thất bại');
				redirect(base_url('/checkout'));
			}
		} else {
			$this->checkout();
		}
	}
}
