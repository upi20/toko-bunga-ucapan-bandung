<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Pengaturan Menu';
		$this->content 					= 'pengaturan/menu';
		$this->navigation 				= ['Pengaturan', 'Menu'];
		$this->plugins 					= ['datatables', 'datatables-btn'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Pengaturan';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Menu';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->menu->getAllData();
		$this->data['parent'] 			= $this->menu->getMenuParent();

		$this->render();
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 						= $this->input->post('id');

		$exe 						= $this->menu->getDataDetail($id);

		$this->output_json(
			[
				'id' 			=> $exe['menu_id'],
				'parent' 		=> $exe['menu_menu_id'],
				'nama' 			=> $exe['menu_nama'],
				'index' 		=> $exe['menu_index'],
				'icon' 			=> $exe['menu_icon'],
				'url' 			=> $exe['menu_url'],
				'keterangan' 	=> $exe['menu_keterangan'],
				'status' 		=> $exe['menu_status'],
			]
		);
	}


	// Insert data
	public function insert()
	{
		$menu_menu_id 				= $this->input->post('menu_menu_id');
		$nama 						= $this->input->post('nama');
		$index 						= $this->input->post('index');
		$icon 						= $this->input->post('icon');
		$url 						= $this->input->post('url');
		$keterangan 				= $this->input->post('keterangan');
		$status 					= $this->input->post('status');

		$exe 						= $this->menu->insert($menu_menu_id, $nama, $index, $icon, $url, $keterangan, $status);

		$this->output_json(
			[
				'id' 			=> $exe['id'],
				'parent' 		=> $exe['parent'],
				'nama' 			=> $nama,
				'index' 		=> $index,
				'icon' 			=> $icon,
				'url' 			=> $url,
				'keterangan' 	=> $keterangan,
				'status' 		=> $status,
			]
		);
	}


	// Update data
	public function update()
	{
		$id 						= $this->input->post('id');
		$menu_menu_id 				= $this->input->post('menu_menu_id');
		$nama 						= $this->input->post('nama');
		$index 						= $this->input->post('index');
		$icon 						= $this->input->post('icon');
		$url 						= $this->input->post('url');
		$keterangan 				= $this->input->post('keterangan');
		$status 					= $this->input->post('status');

		$exe 						= $this->menu->update($id, $menu_menu_id, $nama, $index, $icon, $url, $keterangan, $status);

		$this->output_json(
			[
				'id' 			=> $id,
				'parent' 		=> $exe['parent'],
				'nama' 			=> $nama,
				'index' 		=> $index,
				'icon' 			=> $icon,
				'url' 			=> $url,
				'keterangan' 	=> $keterangan,
				'status' 		=> $status,
			]
		);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->menu->delete($id);

		$this->output_json(
			[
				'id' 			=> $id
			]
		);
	}


	function __construct()
	{
		parent::__construct();
		$this->sesion->cek_session();
		if ($this->session->userdata('data')['level'] != 'Super Admin') {
			redirect('my404', 'refresh');
		}
		$this->load->model('pengaturan/menuModel', 'menu');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/pengaturan/Menu.php */