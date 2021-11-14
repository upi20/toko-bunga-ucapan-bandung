<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HakAksesLevel extends Render_Controller
{
    public function index($id)
    {
        $usr = $this->level->getDataDetail($id);
        if ($usr) {

            // Page Settings
            $this->title                     = 'Pengaturan Hak Akses Level ' . $usr['lev_nama'];
            $this->content                     = 'pengaturan/hakakseslevel';
            $this->navigation                 = ['Pengaturan', 'Level', 'Hak Akses'];
            $this->plugins                     = ['datatables', 'masonry'];

            // Breadcrumb setting
            $this->breadcrumb_1             = 'Pengaturan';
            $this->breadcrumb_1_url         = '#';
            $this->breadcrumb_2             = 'Level';
            $this->breadcrumb_2_url         = base_url() . 'pengaturan/level';
            $this->breadcrumb_3             = 'Hak Akses';
            $this->breadcrumb_3_url         = '#';

            // // Send data to view
            $this->data['records'] = $this->mod_hk->getDataDisplay($id);
            $this->data['id_level'] = $id;

            $this->render();
        } else {
            // Page config:
            $this->title = 'Error 404';
            $this->content = 'err404';
            $this->plugins = [];
            $this->output->set_status_header('404');
            // Commit render:
            $this->render();
        }
    }

    public function insert()
    {

        $this->output_json($this->mod_hk->insert($this->input->post('level'), $this->input->post('menu')));
    }

    public function delete()
    {

        $this->output_json($this->mod_hk->delete($this->input->post('level'), $this->input->post('menu')));
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('pengaturan/HakAksesLevelModel', 'mod_hk');
        $this->load->model('pengaturan/levelModel', 'level');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }
}

/* End of file HakAkses.php */
/* Location: ./application/controllers/pengaturan/HakAkses.php */