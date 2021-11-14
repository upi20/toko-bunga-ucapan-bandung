<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunci extends Render_Controller
{
  public function index()
  {
    // Page Settings
    $this->title           = 'Kunci Pemungutan Suara';
    $this->title_show           = false;
    $this->content           = 'admin/kunci/page';
    $this->navigation         = ['Kunci Pemungutan Suara'];

    // Breadcrumb setting
    $this->breadcrumb_1       = 'Dashboard';
    $this->breadcrumb_1_url     = base_url() . 'dashboard';
    $this->breadcrumb_2       = 'Kunci Pemungutan Suara';
    $this->breadcrumb_2_url     = '#';

    $get = $this->db->select('nilai')->from('kpu_kunci')->where('id', 1)->get()->row_array();
    if ($get == null) {
      $this->db->insert('kpu_kunci', ['id' => 1, 'nilai' => 1]);
      $get = ['nilai' => 1];
    }

    $get = $get['nilai'];

    if ($this->input->post('kunci') != null) {
      $get = $get == 1 ? 0 : 1;
      $this->db->where('id', 1)->update('kpu_kunci', ['nilai' => $get]);
      $this->data['success'] = true;
    }

    $this->data['kunci'] = $get;
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