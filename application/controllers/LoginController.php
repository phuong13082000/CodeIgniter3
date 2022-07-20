<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->config->config['pageAdmin'] = 'Login Admin';
		$this->load->view('admin_template/header');
		$this->load->view('login/index_login');
		$this->load->view('admin_template/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Bạn nên cung cấp %s']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Bạn nên cung cấp %s']);

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$this->load->model('LoginModel');
			$result = $this->LoginModel->checkLogin($email, $password);

			if ($result) {
				$session_array = ['id' => $result[0]->id, 'username' => $result[0]->username, 'email' => $result[0]->email,];
				$this->session->set_userdata('loggedIn', $session_array);
				$this->session->set_flashdata('success', 'Login Successfully');
				redirect(base_url('/dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Sai Email hoặc Password, Hãy đăng nhập lại');
				redirect(base_url('login'));
			}
		} else {
			$this->index();
		}
	}

}
