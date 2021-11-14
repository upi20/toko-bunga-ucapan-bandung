<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paging {

	/**
	*
	*
	* GLOBAL VARIABLE 
	*
	*
	**/

	public $base_url 			= '/';
	public $total_rows 			= 2;
	public $per_page 			= 8;
	public $uri_segment 		= 3;
	public $num_links 			= 3;

	/**
	*
	*
	*
	*
	*
	**/

	public function create_links($config = array())
	{
		/**
		*
		*
		* SET VALUE GLOBAL VARIABLE
		*
		*
		**/


		$this->base_url 		= isset($config['base_url']) ? $config['base_url'] : $this->base_url;
		$this->total_rows 		= isset($config['total_rows']) ? $config['total_rows'] : $this->total_rows;
		$this->per_page 		= isset($config['per_page']) ? $config['per_page'] : $this->per_page;
		$this->uri_segment 		= isset($config['uri_segment']) ? $config['uri_segment'] : $this->uri_segment;
		$this->num_links 		= isset($config['num_links']) ? $config['num_links'] : $this->num_links;

	
		/**
		*
		*
		*
		*
		*
		**/

		$this->ci = &get_instance();

		
		$this->ci->load->library('pagination');


		$config['base_url'] 		= base_url() . $this->base_url;
		$config['total_rows'] 		= $this->total_rows;
		$config['per_page'] 		= $this->per_page;
		$config['uri_segment'] 		= $this->uri_segment;
		// $config['num_links'] 		= $this->num_links;
		
		$config['full_tag_open'] 	= '<div><ul class="pagination">';
		$config['full_tag_close'] 	= '</ul></div><!--pagination-->';
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<li class="prev page">';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open'] 	= '<li class="next page">';
		$config['last_tag_close'] 	= '</li>';
		$config['next_link'] 		= 'Next &rarr;';
		$config['next_tag_open'] 	= '<li class="next page">';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&larr; Previous';
		$config['prev_tag_open'] 	= '<li class="prev page">';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a href="' . base_url() . $this->base_url . '">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['num_tag_open'] 	= '<li class="page">';
		$config['num_tag_close'] 	= '</li>';
		$config['anchor_class'] 	= 'follow_link';
	

		$this->ci->pagination->initialize($config);		


		/**
		*
		*
		* EXECUTE
		*
		*
		**/
		return $this->ci->pagination->create_links();
	}

}