<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Pengaturan Pengguna';
		$get_lv = $this->session->userdata('data')['level'];
		if ($get_lv == 'Partner L2') {
			$this->content      = 'pengaturan/pengguna-p';
		} else {
			// content
			$this->content      = 'pengaturan/pengguna';
		}
		$this->navigation 				= ['Pengaturan', 'Pengguna'];
		$this->plugins 					= ['datatables', 'datatables-btn'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Pengaturan';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Pengguna';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->pengguna->getAllData();
		$this->data['level'] 			= $this->pengguna->getDataLevel();

		$this->render();
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 						= $this->input->post('id');

		$exe 						= $this->pengguna->getDataDetail($id);

		$this->output_json(
			[
				'id' 			=> $exe['role_user_id'],
				'level' 		=> $exe['role_lev_id'],
				'nama' 			=> $exe['user_nama'],
				'phone' 		=> $exe['user_phone'],
				'username' 		=> $exe['user_email'],
				'status' 		=> $exe['user_status'],
			]
		);
	}


	// Insert data
	public function insert()
	{
		$level 						= $this->input->post('level');
		$nama 						= $this->input->post('nama');
		$telepon 					= $this->input->post('telepon');
		$username 					= $this->input->post('username');
		$status 					= $this->input->post('status');
		$password 					= $this->input->post('password');

		$exe 						= $this->pengguna->insert($level, $nama, $telepon, $username, $password, $status);

		$this->output_json(
			[
				'id' 			=> $exe['id'],
				'level' 		=> $exe['level'],
				'username' 		=> $username,
				'nama' 			=> $nama,
				'telepon' 		=> $telepon,
				'status' 		=> $status,
			]
		);
	}


	// Update data
	public function update()
	{
		$id 						= $this->input->post('id');
		$level 						= $this->input->post('level');
		$nama 						= $this->input->post('nama');
		$telepon 					= $this->input->post('telepon');
		$username 					= $this->input->post('username');
		$status 					= $this->input->post('status');
		$password 					= $this->input->post('password');

		$exe 						= $this->pengguna->update($id, $level, $nama, $telepon, $username, $password, $status);

		$this->output_json(
			[
				'id' 			=> $id,
				'level' 		=> $exe['level'],
				'username' 		=> $username,
				'nama' 			=> $nama,
				'telepon' 		=> $telepon,
				'status' 		=> $status,
			]
		);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->pengguna->delete($id);

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
		$akses = ['Super Admin', 'Admin Staff', 'Partner L1', 'Partner L2'];
		$get_lv = $this->session->userdata('data')['level'];
		if (!in_array($get_lv, $akses)) {
			redirect('my404', 'refresh');
		}
		$this->load->model('pengaturan/penggunaModel', 'pengguna');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Pengguna.php */
/* Location: ./application/controllers/pengaturan/Pengguna.php */