<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reset extends Render_Controller
{
  public function index()
  {
    // Page Settings
    $this->title           = 'Reset';
    $this->title_show           = false;
    $this->content           = 'pengaturan/reset';
    $this->navigation         = ['Reset Suara'];

    // Breadcrumb setting
    $this->breadcrumb_1       = 'Dashboard';
    $this->breadcrumb_1_url     = base_url() . 'dashboard';
    $this->breadcrumb_2       = 'Pengaturan';
    $this->breadcrumb_2_url     = '#';
    $this->breadcrumb_3       = 'Hak Akses';
    $this->breadcrumb_3_url     = '#';

    if ($this->input->post('reset') != null) {
      $this->db->query('TRUNCATE kpu_pemilihan');
      $this->data['success'] = true;
    }

    $this->render();
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