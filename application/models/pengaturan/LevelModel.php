<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LevelModel extends Render_Model {

	
	public function getAllData()
	{
		$exe 						= $this->db->get('level');

		return $exe->result_array();
	}


	public function getDataDetail($id)
	{
		$exe 						= $this->db->get_where('level', ['lev_id' => $id]);

		return $exe->row_array();
	}


	public function insert($nama, $keterangan, $status)
	{
		$data['lev_nama'] 			= $nama;
		$data['lev_keterangan'] 	= $keterangan;
		$data['lev_status'] 		= $status;

		$exe 						= $this->db->insert('level', $data);
		$exe 						= $this->db->insert_id();

		return $exe;
	}


	public function update($id, $nama, $keterangan, $status)
	{
		$data['lev_nama'] 			= $nama;
		$data['lev_keterangan'] 	= $keterangan;
		$data['lev_status'] 		= $status;

		$exe 						= $this->db->where('lev_id', $id);
		$exe 						= $this->db->update('level', $data);

		return $exe;
	}


	public function delete($id)
	{
		$exe 						= $this->db->where('lev_id', $id);
		$exe 						= $this->db->delete('level');

		return $exe;
	}


}

/* End of file LevelModel.php */
/* Location: ./application/models/pengaturan/LevelModel.php */