<?php
defined('BASEPATH') or exit('No direct script access allowed');

use MatthiasMullie\Minify;

class Loader extends CI_Controller
{

	public function javascripts($filename)
	{
		$this->output->set_content_type('js');

		$file = $this->security->sanitize_filename($filename);
		if (file_exists(VIEWPATH . "javascripts/$file.js")) {
			$this->load->view("javascripts/$file.js");
		} else {
			show_404();
		}
	}

	public function stylesheets($filename)
	{

		$this->output->set_content_type('css');
		$file = $this->security->sanitize_filename($filename);
		if (file_exists(VIEWPATH . "stylesheets/$file.css")) {
			$this->load->view("stylesheets/$file.css");
		} else {
			show_404();
		}
	}

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function javascripts_contents($folder, $file = null, $file_sub = null, $file_sub_sub = null, $file_sub_sub_sub = null)
	{
		$this->load->helper('file');
		$this->output->set_content_type('js');

		$folder = $this->security->sanitize_filename($folder);
		$file = $file == null ? '' : $this->security->sanitize_filename($file);
		$file_sub = $file_sub == null ? '' : $this->security->sanitize_filename($file_sub);
		$file_sub_sub = $file_sub_sub == null ? '' : $this->security->sanitize_filename($file_sub_sub);

		$file = $file_sub_sub_sub != null ? "$folder/$file/$file_sub/$file_sub_sub/$file_sub_sub_sub" : ($file_sub_sub != null ? "$folder/$file/$file_sub/$file_sub_sub" : ($file_sub != null ? "$folder/$file/$file_sub" : ($file != null ? "$folder/$file" : $folder)));
		if (file_exists(VIEWPATH . "javascripts/contents/$file.js")) {
			if ($this->config->item('minify')) {
				$result = $this->load->view("javascripts/contents/$file.js", '', true);
				$minifier = new Minify\JS($result);
				echo $minifier->minify();
			} else {
				$this->load->view("javascripts/contents/$file.js");
			}
		} else {
			show_404();
		}
	}

	public function stylesheets_contents($folder, $file = null, $file_sub = null)
	{
		$this->output->set_content_type('css');
		$folder = $this->security->sanitize_filename($folder);
		$file = $file == null ? '' : $this->security->sanitize_filename($file);
		$file_sub = $file_sub == null ? '' : $this->security->sanitize_filename($file_sub);
		$file = $file_sub != null ? "$folder/$file/$file_sub" : ($file != null ? "$folder/$file" : $folder);
		if (file_exists(VIEWPATH . "stylesheets/contents/$file.css")) {
			$this->load->view("stylesheets/contents/$file.css");
		} else {
			show_404();
		}
	}
}
