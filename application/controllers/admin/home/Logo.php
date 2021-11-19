<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logo extends Render_Controller
{
    public function index()
    {
        // get title
        $this->data['logo'] = $this->key_get($this->key_logo);
        $this->data['footer_descritpion'] = $this->key_get($this->key_footer_descritpion);

        // get fill
        // Page Settings
        $this->title = 'Logo';
        $this->navigation = ['Logo'];
        $this->title_show = false;
        $this->breadcrumb_show = false;

        // Breadcrumb setting
        $this->breadcrumb_1 = 'Dashboard';
        $this->breadcrumb_1_url = base_url() . 'admin/dashboard';
        $this->breadcrumb_3 = 'Home';
        $this->breadcrumb_3_url = '#';
        $this->breadcrumb_4 = 'Penawaran';
        $this->breadcrumb_4_url = base_url() . 'home/logo';
        // content
        $this->content      = 'admin/home/logo';

        // Send data to view
        $this->render();
    }

    public function update()
    {
        $temp_logo1 = $this->input->post("temp_logo1");
        if (isset($_FILES['logo1'])) {
            if ($_FILES['logo1']['name'] != '') {
                $foto1 = $this->uploadImage('logo1');
                $foto1 = $foto1['data'];
                $this->deleteFile($temp_logo1);
            } else {
                $foto1 = $temp_logo1;
            }
        }

        $temp_logo2 = $this->input->post("temp_logo2");
        if (isset($_FILES['logo2'])) {
            if ($_FILES['logo2']['name'] != '') {
                $foto2 = $this->uploadImage('logo2');
                $foto2 = $foto2['data'];
                $this->deleteFile($temp_logo2);
            } else {
                $foto2 = $temp_logo2;
            }
        }

        // get post
        $description = $this->input->post("footer_descritpion", false);
        // update
        $head = $this->key_set($this->key_logo, $foto1, $foto2);
        $description = $this->key_set($this->key_footer_descritpion, $description, null);

        // result
        $result = $head && $description;
        $this->output_json($result);
    }

    function __construct()
    {
        parent::__construct();
        $this->sesion->cek_session();
        $akses = ['Super Admin'];
        $get_lv = $this->session->userdata('data')['level'];
        if (!in_array($get_lv, $akses)) {
            redirect('my404', 'refresh');
        }
        $this->id = $this->session->userdata('data')['id'];
        $this->photo_path = './files/logo/';
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
    }
}
