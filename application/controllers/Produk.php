<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends Render_Controller
{

	public function index()
	{
		$this->title = "Home";
		$this->render();
	}

	public function detail($slug)
	{
		$this->title = "Home";
		$this->render();
	}

	function __construct()
	{
		parent::__construct();
		$this->default_template = 'templates/main';
		$this->navigation_type = 'front';
		$this->load->model('ProdukModel', 'model');
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */