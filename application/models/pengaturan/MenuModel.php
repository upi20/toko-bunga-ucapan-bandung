<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends Render_Model {

	
	public function getAllData()
	{
		$exe 						= $this->db->select(' a.*, b.menu_nama as parent ')
												->from(' menu a ')
												->join(' menu b ', ' b.menu_id = a.menu_menu_id ', ' left ')
												->get();

		return $exe->result_array();
	}


	public function getMenuParent()
	{
		$exe 						= $this->db->select(' menu_id, menu_nama ')
												->order_by(' menu_index ',' asc ')
												->where(' menu_menu_id ' ,0)
												->get(' menu ');

		return $exe->result_array();
	}


	public function getDataDetail($id)
	{
		$exe 						= $this->db->get_where('menu', ['menu_id' => $id]);

		return $exe->row_array();
	}


	public function insert($menu_menu_id, $nama, $index, $icon, $url, $keterangan, $status)
	{
		$data['menu_menu_id'] 		= $menu_menu_id;
		$data['menu_nama'] 			= $nama;
		$data['menu_index'] 		= $index;
		$data['menu_icon'] 			= $icon;
		$data['menu_url'] 			= $url;
		$data['menu_keterangan'] 	= $keterangan;
		$data['menu_status'] 		= $status;

		$execute 					= $this->db->insert('menu', $data);
		$exe['id'] 					= $this->db->insert_id();
		$exe['parent'] 				= $this->cekMenu($menu_menu_id);

		return $exe;
	}


	public function update($id, $menu_menu_id, $nama, $index, $icon, $url, $keterangan, $status)
	{
		$data['menu_menu_id'] 		= $menu_menu_id;
		$data['menu_nama'] 			= $nama;
		$data['menu_index'] 		= $index;
		$data['menu_icon'] 			= $icon;
		$data['menu_url'] 			= $url;
		$data['menu_keterangan'] 	= $keterangan;
		$data['menu_status'] 		= $status;

		$execute 					= $this->db->where('menu_id', $id);
		$execute 					= $this->db->update('menu', $data);

		$exe['id'] 					= $id;
		$exe['parent'] 				= $this->cekMenu($menu_menu_id);

		return $exe;
	}


	public function delete($id)
	{
		$exe 						= $this->db->where('menu_id', $id);
		$exe 						= $this->db->delete('menu');

		return $exe;
	}


}

/* End of file MenuModel.php */
/* Location: ./application/models/pengaturan/MenuModel.php */