<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sesion
{

	public function cek_session()
	{
		$this->ci = &get_instance();

		if ($this->ci->session->userdata('status') == false) {
			redirect('admin/login', 'refresh');
		}
	}

	public function cek_session_return()
	{
		$this->ci = &get_instance();
		return $this->ci->session->userdata('status') == true;
	}

	public function cek_session_api()
	{
		$this->ci = &get_instance();
		return $this->ci->session->userdata('status') == true;
	}

	public function cek_login()
	{
		$this->ci = &get_instance();

		if ($this->ci->session->userdata('status') == true) {
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function cek_userdata_api($key)
	{
		$this->ci = &get_instance();
		$return = $this->ci->db->select('a.user_id as id, b.lev_nama as level')
			->from('keys a')
			->join('level b', 'a.level = b.lev_id')
			->where('a.key', $key)
			->get()->row_array();
		$return = $return ?? ['id' => '', 'level' => ''];
		return $return;
	}
}
