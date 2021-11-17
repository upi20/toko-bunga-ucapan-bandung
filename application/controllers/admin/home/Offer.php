<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offer extends Render_Controller
{
    private $key_head = 'offer';
    private $key_body = 'offer_decritpion';
    private $key_head2 = 'offer2';
    private $key_body2 = 'offer_decritpion2';
    public function index()
    {
        // get title
        $this->data['head'] = $this->model->get($this->key_head);
        $this->data['body'] = $this->model->get($this->key_body);

        $this->data['head2'] = $this->model->get($this->key_head2);
        $this->data['body2'] = $this->model->get($this->key_body2);


        // get fill
        // Page Settings
        $this->title = 'Penawaran Halaman Depan';
        $this->navigation = ['Penawaran'];
        $this->plugins = ['summernote'];
        $this->title_show = false;
        $this->breadcrumb_show = false;

        // Breadcrumb setting
        $this->breadcrumb_1 = 'Dashboard';
        $this->breadcrumb_1_url = base_url() . 'admin/dashboard';
        $this->breadcrumb_3 = 'Home';
        $this->breadcrumb_3_url = '#';
        $this->breadcrumb_4 = 'Penawaran';
        $this->breadcrumb_4_url = base_url() . 'home/offer';
        // content
        $this->content      = 'admin/home/offer';

        // Send data to view
        $this->render();
    }

    public function update()
    {
        $temp_foto = $this->input->post("temp_foto");
        if (isset($_FILES['foto'])) {
            if ($_FILES['foto']['name'] != '') {
                $foto = $this->uploadImage('foto');
                $foto = $foto['data'];
                $this->deleteFile($temp_foto);
            } else {
                $foto = $temp_foto;
            }
        }

        // get post
        $head_value1 = $this->input->post("head_value1", false);
        $head_value2 = $this->input->post("head_value2", false);

        $body_value1 = $this->input->post("body_value1", false);
        $body_value2 = $this->input->post("body_value2", false);

        // update
        $head = $this->model->set($this->key_head, $head_value1, $head_value2);
        $body = $this->model->set($this->key_body, $body_value1, $body_value2);

        // result
        $result = $head && $body;
        $this->output_json($result);
    }

    public function update2()
    {
        $temp_foto = $this->input->post("temp_foto");
        if (isset($_FILES['foto'])) {
            if ($_FILES['foto']['name'] != '') {
                $foto = $this->uploadImage('foto');
                $foto = $foto['data'];
                $this->deleteFile($temp_foto);
            } else {
                $foto = $temp_foto;
            }
        }

        // get post
        $head_value1 = $this->input->post("head_value1", false);
        $head_value2 = $this->input->post("head_value2", false);

        $body_value1 = $this->input->post("body_value1", false);
        $body_value2 = $this->input->post("body_value2", false);

        // update
        $head = $this->model->set($this->key_head2, $head_value1, $head_value2);
        $body = $this->model->set($this->key_body2, $body_value1, $body_value2);

        // result
        $result = $head && $body;
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
        $this->photo_path = './files/home/slider/';
        $this->load->model("admin/KeyValueModel", 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
    }
}
