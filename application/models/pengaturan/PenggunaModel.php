<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaModel extends Render_Model
{


	public function getAllData()
	{
		$exe = $this->db->select('*')
			->from('users a')
			->join('role_users b', 'a.user_id = b.role_user_id', 'left')
			->join('level c', 'c.lev_id = b.role_lev_id', 'left')
			->where('a.user_status <>', 3)
			->get();

		return $exe->result_array();
	}


	public function getDataDetail($id)
	{
		$exe 						= $this->db->select('*')
			->join('users b', 'b.user_id = a.role_user_id', 'left')
			->where('a.role_user_id', $id)
			->get('role_users a');

		return $exe->row_array();
	}


	public function getDataLevel()
	{
		$exe 						= $this->db->get('level');

		return $exe->result_array();
	}


	public function insert($level, $nama, $telepon, $username, $password, $status)
	{
		$data['user_nama'] 			= $nama;
		$data['user_email'] 		= $username;
		$data['user_password'] 		= $this->b_password->bcrypt_hash($password);
		$data['user_phone'] 		= $telepon;
		$data['user_status'] 		= $status;

		// Insert users
		$execute 					= $this->db->insert('users', $data);
		$execute 					= $this->db->insert_id();

		$data2['role_user_id'] 		= $execute;
		$data2['role_lev_id'] 		= $level;

		// Insert role users
		$execute2 					= $this->db->insert('role_users', $data2);

		$exe['id'] 					= $execute;
		$exe['level'] 				= $this->_cek('level', 'lev_id', $level, 'lev_nama');

		return $exe;
	}


	public function update($id, $level, $nama, $telepon, $username, $password, $status)
	{
		$data['user_nama'] 			= $nama;
		$data['user_email'] 		= $username;
		$data['user_phone'] 		= $telepon;
		$data['user_status'] 		= $status;
		$data['updated_at'] 		= Date("Y-m-d H:i:s", time());
		if ($password != '') {
			$data['user_password'] 		= $this->b_password->bcrypt_hash($password);
		}

		// Update users
		$execute 					= $this->db->where('user_id', $id);
		$execute 					= $this->db->update('users', $data);

		$data2['role_user_id'] 		= $id;
		$data2['role_lev_id'] 		= $level;

		// Update role users
		$execute2 					= $this->db->where('role_user_id', $id);
		$execute2 				 	= $this->db->update('role_users', $data2);

		$exe['id'] 					= $id;
		$exe['level'] 				= $this->_cek('level', 'lev_id', $level, 'lev_nama');

		return $exe;
	}


	public function delete($id)
	{
		// Delete users
		$exe 						= $this->db->where('user_id', $id);
		$exe 						= $this->db->delete('users');

		// Delete role users
		$exe2 						= $this->db->where('role_user_id', $id);
		$exe2 						= $this->db->delete('role_users');

		return $exe;
	}
}

/* End of file PenggunaModel.php */
/* Location: ./application/models/pengaturan/PenggunaModel.php */