<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar {

	/**
	*
	*
	* GLOBAL VARIABLE 
	*
	*
	**/

	public $file 			= '';
	public $path 			= '';
	public $max_size 		= '5000';
	public $allowed_types 	= '*';
	public $return_type 	= 'file_name';
	public $max_width 		= '1024'; 
	public $max_height  	= '1024';

	/**
	*
	*
	*
	*
	*
	**/

	public function upload($config = array())
	{
		/**
		*
		*
		* SET VALUE GLOBAL VARIABLE
		*
		*
		**/


		$this->file 		= isset($config['file']) ? $config['file'] : $this->file;
		$this->path 		= isset($config['path']) ? $config['path'] : $this->path;
		$this->max_size 	= isset($config['max_size']) ? $config['max_size'] : $this->max_size;
		$this->allowed_types= isset($config['allowed_types']) ? $config['allowed_types'] : $this->allowed_types;
		$this->return_type 	= isset($config['return_type']) ? $config['return_type'] : $this->return_type;
		$this->max_width 	= isset($config['max_width']) ? $config['max_width'] : $this->max_width;
		$this->max_height 	= isset($config['max_height']) ? $config['max_height'] : $this->max_height;

		/**
		*
		*
		*
		*
		*
		**/

		$this->ci = &get_instance();

		$config['upload_path'] 		= './uploads/' . $this->path;
		$config['allowed_types'] 	= $this->allowed_types;
		$config['max_size']  		= $this->max_size;
		$config['max_width']  		= $this->max_width;
		$config['max_height']  		= $this->max_height;

		
		$this->ci->load->library('upload', $config);
		

		if (!$this->ci->upload->do_upload($this->file))
		{
			var_dump($this->ci->upload->display_errors());

			exit;
		}
		else
		{
			$post = $this->ci->upload->data();

			/**
			*
			*
			* EXECUTE UPLOAD
			*
			*
			**/

			return $post[$this->return_type];
		}
	}

}