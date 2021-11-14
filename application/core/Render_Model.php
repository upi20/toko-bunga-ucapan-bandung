<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Render_Model extends CI_Model {

	
	/* Default function */
	public function _generate($config = array())
	{

		/**
		*
		*
		**/

		$table 						= isset($config['table']) ? $config['table'] : null;
		$field 						= isset($config['field']) ? $config['field'] : 'kode';
		$jumlah 					= isset($config['jumlah']) ? $config['jumlah'] : 5;
		$return 					= isset($config['return']) ? $config['return'] : 'TEST';

		/**
		*
		*
		**/
		
		$exe 						= $this->db->select("RIGHT({$table}.{$field}, {$jumlah}) as id", FALSE)
												->order_by($field, 'DESC')
												->limit(1)
												->get($table);  //cek dulu apakah ada sudah ada kode di tabel.    
		
		if($exe->num_rows() <> 0)
		{      

		   $data 					= $exe->row();      
		   $kode 					= intval($data->id) + 1; 
		}
		else
		{      
		   $kode 					= 1; 
		}

	  	$tgl 						= date('Y'); 
	  	$batas 						= str_pad($kode, $jumlah, '0', STR_PAD_LEFT);    
	  	$kodetampil 				= $return . '-' . $tgl . '-' . $batas;  
		

		return $kodetampil;
	}

	public function _cek($table = null, $field = null, $id = null, $return = 'nama')
	{
		$exe 						= $this->db->get_where($table, [$field => $id]);

		return $exe->row_array()[$return];
	}


	public function cekMenu($id)
	{
		$exe 						= $this->db->get_where('menu', ['menu_id' => $id]);

		if($exe->num_rows() > 0)
		{
			$exe 					= $exe->row_array()['menu_nama'];
		}
		else
		{
			$exe 					= ' ';
		}

		return $exe;
	}


}

/* End of file Render_Model.php */
/* Location: ./application/core/Render_Model.php */