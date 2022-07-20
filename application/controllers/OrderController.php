<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
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

		$this->load->model('OrderModel');
		$data['order'] = $this->OrderModel->selectOrder();

		$this->load->view('order/list', $data);
		$this->load->view('admin_template/footer');
	}

	public function view($order_code)
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('OrderModel');
		$data['order_details'] = $this->OrderModel->selectOrderDetails($order_code);

		$this->load->view('order/view', $data);
		$this->load->view('admin_template/footer');
	}

	public function delete($order_code)
	{
		$this->checkLogin();
		$this->load->model('OrderModel');

		$del_order_details = $this->OrderModel->deleteOrderDetails($order_code);

		$del = $this->OrderModel->deleteOrder($order_code);

		if ($del) {
			$this->session->set_flashdata('success', 'Delete Order Successfully');
			redirect(base_url('order/list'));
		} else {
			$this->session->set_flashdata('error', 'Delete Order Failed');
			redirect(base_url('order/list'));
		}
	}

	public function process()
	{
		$value = $this->input->post('value');
		$order_code = $this->input->post('order_code');
		$data = array(
			'status' => $value
		);
		$this->load->model('OrderModel');
		$this->OrderModel->updateOrder($data, $order_code);
	}

}
