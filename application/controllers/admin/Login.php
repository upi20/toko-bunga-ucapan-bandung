<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends Render_Controller
{

	public function index()
	{
		$this->sesion->cek_login();
		$this->content = 'login';
		$this->render();
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel', 'login');
		$this->default_template = 'templates/login';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */