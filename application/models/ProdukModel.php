<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModel extends Render_Model
{
  public function getNoWhatsapp()
  {
    $result = '0';
    $get = $this->db->select('number')->from('whatsapp')->where('status', 1)->get()->row_array();
    if ($get != null) {
      $result = '+62' . $get['number'];
    }
    return $result;
  }
}
