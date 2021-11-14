<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Render_Controller
{

	public function index()
	{
		// Page Settings
		$this->title = 'Dashboard';
		$this->navigation = ['Dashboard'];
		$this->plugins = ['datatables'];
		$this->load->library('libs');

		// Breadcrumb setting
		$this->breadcrumb_1 = 'Dashboard';
		$this->breadcrumb_1_url = '#';

		if ($this->level == 'Super Admin') {
			$this->content = 'dashboard/admin';
			$this->data['calonKetua'] = $this->model->jumlahCalonKetua();
			$this->data['pemilih'] = $this->model->jumlahPemilih();
			$this->data['sudahPilih'] = $this->model->jumlahsudahPilih();
			$this->data['belumPilih'] =	$this->data['pemilih'] - 	$this->data['sudahPilih'];
		} else {
			$this->title = 'List Calon Ketua';
			$this->content = 'dashboard/pemilih';
			$this->data['calons'] = $this->model->getCalon($this->id);
			$get = $this->db->select('nilai')->from('kpu_kunci')->where('id', 1)->get()->row_array();
			if ($get == null) {
				$this->db->insert('kpu_kunci', ['id' => 1, 'nilai' => 1]);
				$get = ['nilai' => 1];
			}
			$this->data['finish'] = $get['nilai'];
		}

		// Send data to view
		$this->render();
	}

	public function pilih()
	{
		$id_calon = $this->input->post('id');
		$id_pemilih = $this->id;
		$get = $this->db->select('nilai')->from('kpu_kunci')->where('id', 1)->get()->row_array();
		if ($get == null) {
			$this->db->insert('kpu_kunci', ['id' => 1, 'nilai' => 1]);
			$get = ['nilai' => 1];
		}
		$get = $get['nilai'];
		if ($get == 0) {
			$result = $this->model->pilihSimpan($id_pemilih, $id_calon);
			$this->output_json(true, 200);
		} else {
			$this->output_json(false, 200);
		}
	}

	function __construct()
	{
		parent::__construct();
		$this->sesion->cek_session();
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');
		$this->level = $this->session->userdata('data')['level'];
		$this->id = $this->session->userdata('data')['id'];
		// Cek session

		// model
		$this->load->model("DashboardModel", 'model');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */