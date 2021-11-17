<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeyValueModel extends Render_Model
{

  public function get($key)
  {
    $get = $this->db->select("key, value1, value2")
      ->from('key_value')->where('key', $key)->get();
    if ($get->num_rows() == 0) {
      $data = [
        'key' => $key,
        'value1' => null,
        'value2' => null,
        'created_by' => $this->session->userdata('data')['id'],
      ];
      $this->db->insert("key_value",  $data);
      $get = $data;
    } else {
      $get = $get->row_array();
    }
    return $get;
  }

  public function set($key, $value1, $value2)
  {
    $get = $this->db->select("key")
      ->from('key_value')->where('key', $key)->get();
    if ($get->num_rows() == 0) {
      $get = $this->db->insert("key_value", [
        'key' => $key,
        'value1' => $value1,
        'value2' => $value2,
        'created_by' => $this->session->userdata('data')['id'],
      ]);
    } else {
      $get = $this->db->where('key', $key)->update('key_value', [
        'value1' => $value1,
        'value2' => $value2,
        'updated_by' => $this->session->userdata('data')['id'],
      ]);
    }
    return $get;
  }
}
