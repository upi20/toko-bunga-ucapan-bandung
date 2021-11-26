<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends Render_Controller
{

	public function index()
	{
		$this->data['about'] = $this->key_get($this->key_about);
		$this->data['about_foto'] = $this->key_get($this->key_about_foto);
		$this->data['about_history'] = $this->key_get($this->key_about_history);
		$this->title = "Home";
		$this->content = 'front/about';
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