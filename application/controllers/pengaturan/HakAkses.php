<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HakAkses extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Pengaturan Hak Akses';
		$this->content 					= 'pengaturan/hakakses';
		$this->navigation 				= ['Pengaturan', 'Hak Akses'];
		$this->plugins 					= ['datatables', 'datatables-btn'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Pengaturan';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Hak Akses';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->hakAkses->getAllData();
		$this->data['level'] 			= $this->hakAkses->getDataLevel();
		$this->data['parent'] 			= $this->hakAkses->getDataParent();

		$this->render();
	}


	// Sub menu
	public function subMenu()
	{
		$menu 							= $this->input->post('menu');

		$exe 							= $this->hakAkses->getDataChild($menu);

		$this->output_json($exe);
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->hakAkses->getAllData($id);

		$this->output_json(
			[
				'id' 			=> $exe[0]['rola_id'],
				'level' 		=> $exe[0]['rola_lev_id'],
				'menu' 			=> $exe[0]['parent_id'],
				'sub_menu' 		=> $exe[0]['menu_id'],
			]
		);
	}


	// Insert data
	public function insert()
	{
		$level 							= $this->input->post('level');
		$menu 							= $this->input->post('menu');
		$sub_menu 						= $this->input->post('sub_menu');

		$exe 							= $this->hakAkses->insert($level, $menu, $sub_menu);

		$this->output_json(
			[
				'id' 			=> $exe['id'],
				'level' 		=> $exe['level'],
				'menu' 			=> $exe['parent'],
				'sub_menu' 		=> $exe['child'],
			]
		);
	}


	// Update data
	public function update()
	{
		$id 							= $this->input->post('id');
		$level 							= $this->input->post('level');
		$menu 							= $this->input->post('menu');
		$sub_menu 						= $this->input->post('sub_menu');

		$exe 							= $this->hakAkses->update($id, $level, $menu, $sub_menu);

		$this->output_json(
			[
				'id' 			=> $id,
				'level' 		=> $exe['level'],
				'menu' 			=> $exe['parent'],
				'sub_menu' 		=> $exe['child'],
			]
		);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->hakAkses->delete($id);

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
		$this->load->model('pengaturan/hakAksesModel', 'hakAkses');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file HakAkses.php */
/* Location: ./application/controllers/pengaturan/HakAkses.php */