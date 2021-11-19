<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends Render_Controller
{

	public function index()
	{
		$this->title = "Home";
		$this->render();
	}

	public function detail($slug = null)
	{
		$product = $this->model->getProduct($slug);
		$this->data['data'] = (object)$product;
		$this->data['view_product'] = !is_null($product);
		$this->data['whatsapp'] = $this->model->getNoWhatsapp();
		$this->data['recent'] = $this->model->getProductsRecent();
		$this->data['title_recent'] = $this->key_value->get($this->key_product_head2);
		$this->title = is_null($product) ? 'Detail Produk' : $product['product']->name;
		$this->content = 'front/detail';
		$this->render();
	}

	function __construct()
	{
		parent::__construct();
		$this->default_template = 'templates/main';
		$this->navigation_type = 'front';
		$this->load->model('ProdukModel', 'model');
		$this->load->model("admin/KeyValueModel", 'key_value');
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */