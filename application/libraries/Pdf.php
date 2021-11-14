<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/dompdf/dompdf_config.inc.php';

class Pdf {

	/**
	*
	*
	* GLOBAL VARIABLE 
	*
	*
	**/

	public $html 		= '';
	public $data 		= array();
	public $filename 	= 'PDF';
	public $paper_size 	= 'A4';

	/**
	*
	*
	*
	*
	*
	**/


	public function render($config = array())
	{

		/**
		*
		*
		* SET VALUE GLOBAL VARIABLE
		*
		*
		**/


		$this->html 		= $config['html'];
		$this->data 		= isset($config['data']) ? $config['data'] : $this->data;
		$this->filename 	= isset($config['filename']) ? $config['filename'] : $this->filename;
		$this->paper_size	= isset($config['paper_size']) ? $config['paper_size'] : $this->paper_size;

		/**
		*
		*
		*
		*
		*
		**/

		$this->ci 		= &get_instance();


		$view 			= $this->ci->load->view($this->html, $this->data, true);

		$dompdf 		= new Dompdf();

	    $dompdf->load_html($view);
	    
	    $dompdf->set_paper($this->paper_size, 'landscape');

		$dompdf->render();

		$filename 		= $this->filename;

		$pdf  			= $dompdf->output();

		$exe 			= $dompdf->stream($filename, array('Attachment' => false));

		return $exe;
	}

}