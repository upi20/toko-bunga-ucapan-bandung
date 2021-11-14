<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Render_Controller
{

	public function index()
	{
		$this->title = "Home";
		// $this->content = 'login_token';
		$this->render();
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel', 'login');
		$this->default_template = 'templates/main';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */