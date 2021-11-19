<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Footer extends Render_Controller
{
    public function index()
    {
        // get title
        $this->data['contact'] = $this->key_get($this->key_footer_contact);
        $this->data['list_head'] = $this->key_get($this->key_footer_list_head);
        $this->data['key_copyright'] = $this->key_get($this->key_footer_copyright);

        // Page Settings
        $this->title = 'Footer';
        $this->navigation = ['Footer'];
        $this->title_show = false;
        $this->breadcrumb_show = false;
        $this->plugins = ['summernote', 'datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1 = 'Dashboard';
        $this->breadcrumb_1_url = base_url() . 'admin/dashboard';
        $this->breadcrumb_3 = 'Home';
        $this->breadcrumb_3_url = '#';
        $this->breadcrumb_4 = 'Penawaran';
        $this->breadcrumb_4_url = base_url() . 'home/footer';
        // content
        $this->content      = 'admin/home/footer';

        // Send data to view
        $this->render();
    }

    // key update
    public function contact_title_update()
    {
        $title = $this->input->post("title", false);
        $body = $this->input->post("body", false);
        $head = $this->key_set($this->key_footer_contact, $title, $body);
        $this->output_json($head);
    }

    public function list_head_update()
    {
        $title = $this->input->post("title", false);
        $head = $this->key_set($this->key_footer_list_head, $title, null);
        $this->output_json($head);
    }

    public function copyright_update()
    {
        $title = $this->input->post("title", false);
        $head = $this->key_set($this->key_footer_copyright, $title, null);
        $this->output_json($head);
    }

    // list =========================================
    public function list_ajax()
    {
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $start = $this->input->post('start');
        $draw = $this->input->post('draw');
        $draw = $draw == null ? 1 : $draw;
        $length = $this->input->post('length');
        $cari = $this->input->post('search');

        if (isset($cari['value'])) {
            $_cari = $cari['value'];
        } else {
            $_cari = null;
        }
        $data = $this->model->list_ajax($draw, $length, $start, $_cari, $order)->result_array();
        $count = $this->model->list_ajax(null, null, null, $_cari, $order)->num_rows();

        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $_cari, 'data' => $data]);
    }

    public function list_insert()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->delete($this->cache_list_item);
        $this->db->trans_start();
        $name = $this->input->post("name");
        $link = $this->input->post("link");
        $status = $this->input->post("status");
        $user_id = $this->id;
        $result = $this->model->list_insert($user_id, $name, $link, $status);

        $this->db->trans_complete();
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function list_update()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->delete($this->cache_list_item);
        $this->db->trans_start();
        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $link = $this->input->post("link");
        $status = $this->input->post("status");
        $user_id = $this->id;
        $result = $this->model->list_update($id, $user_id, $name, $link, $status);

        $this->db->trans_complete();
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function list_delete()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->delete($this->cache_list_item);
        $this->db->trans_start();
        $id = $this->input->post("id");
        $result = $this->model->list_delete($id);

        $this->db->trans_complete();
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    // sosmed =======================================
    public function sosmed_ajax()
    {
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $start = $this->input->post('start');
        $draw = $this->input->post('draw');
        $draw = $draw == null ? 1 : $draw;
        $length = $this->input->post('length');
        $cari = $this->input->post('search');

        if (isset($cari['value'])) {
            $_cari = $cari['value'];
        } else {
            $_cari = null;
        }
        $data = $this->model->sosmed_ajax($draw, $length, $start, $_cari, $order)->result_array();
        $count = $this->model->sosmed_ajax(null, null, null, $_cari, $order)->num_rows();

        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $_cari, 'data' => $data]);
    }

    public function sosmed_insert()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->delete($this->cache_sosmed);
        $this->db->trans_start();
        $name = $this->input->post("name");
        $link = $this->input->post("link");
        $icon = $this->input->post("icon");
        $status = $this->input->post("status");
        $user_id = $this->id;
        $result = $this->model->sosmed_insert($user_id, $name, $link, $icon, $status);

        $this->db->trans_complete();
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function sosmed_update()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->delete($this->cache_sosmed);
        $this->db->trans_start();
        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $link = $this->input->post("link");
        $icon = $this->input->post("icon");
        $status = $this->input->post("status");
        $user_id = $this->id;
        $result = $this->model->sosmed_update($id, $user_id, $name, $link, $icon, $status);

        $this->db->trans_complete();
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function sosmed_delete()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->delete($this->cache_sosmed);
        $this->db->trans_start();
        $id = $this->input->post("id");
        $result = $this->model->sosmed_delete($id);

        $this->db->trans_complete();
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
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
        $this->load->model("admin/home/FooterModel", 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
    }
}
