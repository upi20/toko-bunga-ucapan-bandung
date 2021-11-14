<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends Render_Controller
{
    public function index()
    {
        // Page Settings
        $this->title                    = 'Ganti Password';
        $this->title_show               = false;
        $this->content                  = 'pengaturan/password';
        $this->navigation               = ['Ganti Password'];
        $this->plugins               = ['validation'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Ganti Password';
        $this->breadcrumb_2_url         = '#';

        $this->render();
    }

    // cek current password
    public function cek_password()
    {
        $current_password = $this->input->post("current_password");
        $id_user = $this->input->post("id_user");
        $id_user = ($id_user == null) ? $this->id_user : $id_user;

        $result = $this->password->cekPpassword($id_user, $current_password);
        $this->output_json($result);
    }

    // update
    public function update_password()
    {
        $new_password = $this->input->post("new_password");
        $id_user = $this->input->post("id_user");
        $id_user = ($id_user == null) ? $this->id_user : $id_user;

        $result = $this->password->updatePassword($id_user, $new_password);
        $this->output_json($result);
    }

    function __construct()
    {
        parent::__construct();
        $this->sesion->cek_session();
        $this->id_user = $this->session->userdata('data')['id'];
        $this->default_template = 'templates/dashboard';
        $this->load->model("pengaturan/PasswordModel", 'password');
        $this->load->helper('url');
    }
}
