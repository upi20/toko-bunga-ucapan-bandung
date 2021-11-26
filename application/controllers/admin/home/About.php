<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends Render_Controller
{
    public function index()
    {
        // get title
        $this->data['about'] = $this->key_get($this->key_about);
        $this->data['about_foto'] = $this->key_get($this->key_about_foto);
        $this->data['about_history'] = $this->key_get($this->key_about_history);

        // Page Settings
        $this->title = 'Logo';
        $this->navigation = ['About'];
        $this->title_show = false;
        $this->breadcrumb_show = false;
        $this->plugins = ['summernote'];

        // Breadcrumb setting
        $this->breadcrumb_1 = 'Dashboard';
        $this->breadcrumb_1_url = base_url() . 'admin/dashboard';
        $this->breadcrumb_3 = 'Home';
        $this->breadcrumb_3_url = '#';
        $this->breadcrumb_4 = 'Penawaran';
        $this->breadcrumb_4_url = base_url() . 'home/about';
        // content
        $this->content      = 'admin/home/about';

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
        $about_title = $this->input->post('about_title');
        $about_description = $this->input->post('about_description', false);

        // get post
        $description = $this->input->post("footer_descritpion", false);
        // update
        $head = $this->key_set($this->key_about_foto, $foto1, null);
        $description = $this->key_set($this->key_about,  $about_title, $about_description);

        // result
        $result = $head && $description;
        $this->output_json($result);
    }

    public function update_history()
    {
        // get post
        $history_title = $this->input->post("history_title");
        $history_description = $this->input->post("history_description", false);
        // update
        $result = $this->key_set($this->key_about_history, $history_title, $history_description);

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
