<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My404 extends Render_Controller
{
	public function index()
	{
		if ($this->sesion->cek_session_return()) {
			$this->default_template = 'templates/dashboard';
			$this->load->library('plugin');
			$this->load->helper('url');
			// Page config:
			$this->title = 'Error 404';
			$this->title_show = false;
			$this->content = 'err404';
			$this->plugins = [];
			$this->output->set_status_header('404');
			// Commit render:
			$this->render();
		} else {
			$this->load->view('global_404');
			$this->output->set_status_header('404');
		}
	}
}
