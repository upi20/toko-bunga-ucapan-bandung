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
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 0, 1
    ) foto1, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 1, 2
    ) foto2,')
      ->from('products a')->where('a.status', 1)->where('a.view_home', 1)->get()->result_array();
    return $result;
  }

  public function getProduct($slug)
  {
    $product = $this->db->select('*')->from('products')->where('slug', $slug)->get()->row();
    if (is_null($product)) {
      return null;
    }
    $product_id = $product->id;

    // images
    $images = $this->db->select('name, foto')
      ->from('product_images')
      ->where('product_id', $product_id)
      ->order_by('number')
      ->get()->result();

    // category
    $categories = $this->db->select('b.name, b.slug')
      ->from('product_category_detail a')
      ->join('product_categories b', 'a.category_id=b.id')
      ->where('a.product_id', $product_id)
      ->order_by('b.name')
      ->get()->result();

    // color
    $colors = $this->db->select('b.name, b.slug')
      ->from('product_color_detail a')
      ->join('product_colors b', 'a.color_id=b.id')
      ->where('a.product_id', $product_id)
      ->order_by('b.name')
      ->get()->result();

    $result = [
      'product' => $product,
      'images' => $images,
      'categories' => $categories,
      'colors' => $colors,
    ];
    return $result;
  }

  public function getProductsRecent()
  {
    $result = $this->db->select('a.name, a.slug, a.price, a.old_price, a.discount, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 0, 1
    ) foto1, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 1, 2
    ) foto2,')
      ->from('products a')->where('a.status', 1)->where('a.view_home', 1)
      ->order_by('created_at', 'desc')->limit(10)->get()->result_array();
    return $result;
  }
}
