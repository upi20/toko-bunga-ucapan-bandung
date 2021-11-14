<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Pengaturan Level';
		$this->content 					= 'pengaturan/level';
		$this->navigation 				= ['Pengaturan', 'Level'];
		$this->plugins 					= ['datatables', 'datatables-btn'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Pengaturan';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Level';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->level->getAllData();

		$this->render();
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->level->getDataDetail($id);

		$this->output_json(
			[
				'id' 			=> $exe['lev_id'],
				'nama' 			=> $exe['lev_nama'],
				'keterangan' 	=> $exe['lev_keterangan'],
				'status' 		=> $exe['lev_status'],
			]
		);
	}


	// Insert data
	public function insert()
	{
		$nama 							= $this->input->post('nama');
		$keterangan 					= $this->input->post('keterangan');
		$status 						= $this->input->post('status');

		$exe 							= $this->level->insert($nama, $keterangan, $status);

		$this->output_json(
			[
				'id' 			=> $exe,
				'nama' 			=> $nama,
				'keterangan' 	=> $keterangan,
				'status' 		=> $status,
			]
		);
	}


	// Update data
	public function update()
	{
		$id 							= $this->input->post('id');
		$nama 							= $this->input->post('nama');
		$keterangan 					= $this->input->post('keterangan');
		$status 						= $this->input->post('status');

		$exe 							= $this->level->update($id, $nama, $keterangan, $status);

		$this->output_json(
			[
				'id' 			=> $id,
				'nama' 			=> $nama,
				'keterangan' 	=> $keterangan,
				'status' 		=> $status,
			]
		);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->level->delete($id);

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
		$this->load->model('pengaturan/levelModel', 'level');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Level.php */
/* Location: ./application/controllers/pengaturan/Level.php */