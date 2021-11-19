<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Render_Controller
{

	public function index()
	{
		// whatsapp
		$this->data['whatsapp'] = $this->model->getNoWhatsapp();

		// slider
		$this->data['sliders'] = $this->model->getSliders();

		// keunggulan
		$this->data['excesses'] = $this->model->getExcess();

		// list produk
		$this->data['product_head'] = $this->key_get($this->key_product_head);
		$this->data['products'] = $this->model->getProducts();

		// penawaran
		$this->data['offer_head'] = $this->key_get($this->key_offer_head);
		$this->data['offer_body'] = $this->key_get($this->key_offer_body);

		// penawaran 2
		$this->data['offer_head2'] = $this->key_get($this->key_offer_head2);
		$this->data['offer_body2'] = $this->key_get($this->key_offer_body2);

		// testimoni
		$this->data['testimoni_head'] = $this->key_get($this->key_testimoni_head);
		$this->data['testimoni_body'] = $this->model->getTestimoni();
		$this->title = "Home";
		$this->content = 'front/home';
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