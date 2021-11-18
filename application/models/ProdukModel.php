<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModel extends Render_Model
{
  // no whatsapp
  public function getNoWhatsapp()
  {
    $result = '0';
    $get = $this->db->select('number')->from('whatsapp')->where('status', 1)->get()->row_array();
    if ($get != null) {
      $result = '+62' . $get['number'];
    }
    return $result;
  }

  // slider
  public function getSliders()
  {
    $result = $this->db->select('foto, title, subtitle')->from('home_slider')->where('status', 1)->get()->result_array();
    return $result;
  }

  // excess
  public function getExcess()
  {
    $result = $this->db->select('foto, title, description, 	column')->from('home_excess')->where('status', 1)->get()->result_array();
    return $result;
  }

  // testimoni
  public function getTestimoni()
  {
    $result = $this->db->select('name, position, description, 	foto')->from('home_testimonials')->where('status', 1)->get()->result_array();
    return $result;
  }

  // products
  public function getProducts()
  {
    $result = $this->db->select('a.name, a.slug, a.price, a.old_price, a.discount, (
      SELECT foto FROM product_images WHERE product_id = a.id order by created_by desc LIMIT 0, 1
    ) foto1, (
      SELECT foto FROM product_images WHERE product_id = a.id order by created_by desc LIMIT 1, 2
    ) foto2,')
      ->from('products a')->where('a.status', 1)->get()->result_array();
    return $result;
  }
}
