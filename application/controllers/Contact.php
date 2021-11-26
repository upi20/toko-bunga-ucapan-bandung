<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends Render_Controller
{

	public function index()
	{
		$this->data['maps'] = $this->key_get($this->key_contact_maps);
		$this->data['contacts'] = $this->model->contactGet();
		$this->title = "Home";
		$this->content = 'front/contact';
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