<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends Render_Controller
{
    public function index()
    {
        // Page Settings
        $this->title                     = 'Pengaturan Registrasi';
        $this->content                     = 'pengaturan/registrasi';
        $this->navigation                 = ['Registrasi'];
        $this->plugins                     = ['switch'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Pengaturan';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Registrasi';
        $this->breadcrumb_3_url         = '#';

        // data
        $this->data['siswa']            = $this->model->getData('siswa');
        $this->data['guru']             = $this->model->getData('guru');
        $this->render();
    }

    public function update()
    {
        // get data
        $nama = $this->input->post("nama");
        $nilai = $this->input->post("nilai");

        // eksekusi
        $result = $this->model->update($nama, $nilai);

        // kode header
        $kode = $result ? 200 : 500;

        // output
        $this->output_json($result, $kode);
    }

    function __construct()
    {
        parent::__construct();
        $this->sesion->cek_session();
        if ($this->session->userdata('data')['level'] != 'Super Admin') {
			redirect('my404', 'refresh');
		}
        $this->load->model('pengaturan/RegistrasiModel', 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
    }
}
