<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends Render_Controller
{

	public function index()
	{
		$search = $this->input->get('search');
		$category = $this->input->get('category');
		$color = $this->input->get('color');
		$sort = $this->input->get('sort');

		// sort value
		$sort_list = [
			[
				'id' => '01',
				'text' => 'Harga dari rendah ke tinggi'
			],
			[
				'id' => '10',
				'text' => 'Harga dari tinggi ke rendah'
			],
			[
				'id' => 'az',
				'text' => 'Nama dari A ke Z'
			],
			[
				'id' => 'za',
				'text' => 'Nama dari Z ke A'
			],
		];


		$this->data['products'] = [];
		$this->data['title_head'] = '';
		$this->data['form'] = [
			'name' => '',
			'value' => '',
		];
		if ($search) {
			$products = $this->model->getProductsSearch($search, $sort);
			$this->data['products'] = $products->data;
			$this->data['title_head'] = "Pecarian produk: {$products->title}";
			$this->data['form'] = [
				'name' => 'search',
				'value' => $search,
			];
		} elseif ($category) {
			$products = $this->model->getProductsByCategory($category, $sort);
			$this->data['products'] = $products->data;
			$this->data['title_head'] = "Produk berdasarkan kategori: {$products->title}";
			$this->data['form'] = [
				'name' => 'category',
				'value' => $category,
			];
		} elseif ($color) {
			$products = $this->model->getProductsByColor($color, $sort);
			$this->data['products'] = $products->data;
			$this->data['title_head'] = "Produk berdasarkan warna: {$products->title}";
			$this->data['form'] = [
				'name' => 'color',
				'value' => $color,
			];
		}
		$this->data['sort'] = $sort;
		$this->data['sort_list'] = $sort_list;
		$this->title = $this->data['title_head'];
		$this->data['whatsapp'] = $this->model->getNoWhatsapp();
		$this->content = 'front/produk';
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