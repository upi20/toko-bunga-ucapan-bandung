<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DefaultModel extends Render_Model
{

	public function menu()
	{
		$user = $this->session->userdata('data');

		if ($user) {
			$query = $this->db->select('*')
				->from('role_aplikasi a')
				->join('menu b', 'b.menu_id = a.rola_menu_id')
				->where('a.rola_lev_id', $user['level_id'])
				->where('b.menu_menu_id', 0)
				->order_by('b.menu_index', 'asc')
				->get()->result_array();
		} else {
			$query = [];
		}
		return $query;
	}

	public function sub_menu($menu_id = null)
	{
		$session_id = $this->session->userdata('data')['id'];

		$where = array(
			'b.menu_menu_id' 	=> $menu_id,
			'b.menu_status' 	=> 'Aktif',
			'd.role_user_id' 	=> $session_id
		);

		$query = $this->db->select('*')
			->join('menu b', 'b.menu_id = a.rola_menu_id')
			->join('level c', 'c.lev_id = a.rola_lev_id')
			->join('role_users d', 'd.role_lev_id = c.lev_id')
			->order_by('b.menu_index', 'asc')
			->get_where('role_aplikasi a', $where)
			->result_array();

		return $query;
	}
}
