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
    ) foto2,a.excerpt')
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
    ) foto2,a.excerpt')
      ->from('products a')->where('a.status', 1)->where('a.view_home', 1)
      ->order_by('created_at', 'desc')->limit(10)->get()->result_array();
    return $result;
  }


  public function getProductsByCategory($category, $sort)
  {
    $result = $this->db->select('a.name, a.slug, a.price, a.old_price, a.discount, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 0, 1
    ) foto1, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 1, 2
    ) foto2,a.excerpt')
      ->from('products a')
      ->join('product_category_detail b', 'b.product_id=a.id')
      ->join('product_categories c', 'b.category_id=c.id')
      ->where('a.status', 1)->where('c.slug', $category);
    // sort
    if ($sort == '10') {
      $result->order_by('a.price', 'desc');
    } else if ($sort == 'az') {
      $result->order_by('a.name', 'asc');
    } else if ($sort == 'za') {
      $result->order_by('a.name', 'desc');
    } else {
      $result->order_by('a.price', 'asc');
    }

    $result = $result->get()->result_array();

    $title = $this->db->select('name')->from('product_categories')->where('slug', $category)->get()->row_array();

    $result = (object)['data' => $result, 'title' => is_null($title) ? '' : $title['name']];
    return $result;
  }

  public function getProductsByColor($color, $sort)
  {
    $result = $this->db->select('a.name, a.slug, a.price, a.old_price, a.discount, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 0, 1
    ) foto1, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 1, 2
    ) foto2,a.excerpt')
      ->from('products a')
      ->join('product_color_detail b', 'b.product_id=a.id')
      ->join('product_colors c', 'b.color_id=c.id')
      ->where('a.status', 1)->where('c.slug', $color);
    // sort
    if ($sort == '10') {
      $result->order_by('a.price', 'desc');
    } else if ($sort == 'az') {
      $result->order_by('a.name', 'asc');
    } else if ($sort == 'za') {
      $result->order_by('a.name', 'desc');
    } else {
      $result->order_by('a.price', 'asc');
    }

    $result = $result->get()->result_array();
    $title = $this->db->select('name')->from('product_colors')->where('slug', $color)->get()->row_array();
    $result = (object)['data' => $result, 'title' => is_null($title) ? '' : $title['name']];
    return $result;
  }

  public function getProductsSearch($key, $sort)
  {
    $result = $this->db->select('a.name, a.slug, a.price, a.old_price, a.discount, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 0, 1
    ) foto1, (
      SELECT foto FROM product_images WHERE product_id = a.id order by number asc LIMIT 1, 2
    ) foto2,a.excerpt')
      ->from('products a')
      // category
      ->join('product_category_detail b', 'b.product_id=a.id', 'left')
      ->join('product_categories c', 'b.category_id=c.id', 'left')
      // color
      ->join('product_color_detail d', 'd.product_id=a.id', 'left')
      ->join('product_colors e', 'd.color_id=e.id', 'left')
      ->where('a.status', 1)
      ->where("(
        a.name like '%$key%' or
        a.slug like '%$key%' or
        a.old_price like '%$key%' or
        a.price like '%$key%' or
        a.discount like '%$key%' or
        a.description like '%$key%' or
        c.name like '%$key%' or
        c.slug like '%$key%' or
        c.description like '%$key%' or
        e.name like '%$key%' or
        e.slug like '%$key%' or
        e.description like '%$key%'
      )")->group_by('a.id');

    // sort
    if ($sort == '10') {
      $result->order_by('a.price', 'desc');
    } else if ($sort == 'az') {
      $result->order_by('a.name', 'asc');
    } else if ($sort == 'za') {
      $result->order_by('a.name', 'desc');
    } else {
      $result->order_by('a.price', 'asc');
    }

    $result = $result->get()->result_array();
    $result = (object)['data' => $result, 'title' => $key];
    return $result;
  }

  public function getReview($slug)
  {
    $product_id = $this->getIdProdukBySlug($slug);
    $result = $this->db->select('name, date, description')->from('product_reviews')
      ->where('status', 1)
      ->where('product_id', $product_id)
      ->order_by('created_at', 'desc')
      ->get()->result_array();
    return $result;
  }

  public function insertReview($slug, $name, $description, $email)
  {
    $product_id = $this->getIdProdukBySlug($slug);
    $data = [
      'product_id' => $product_id,
      'name' => $name,
      'description' => $description,
      'email' => $email,
      'date' => Date('Y-m-d'),
      'status' => 1,
    ];
    $result = $this->db->insert('product_reviews', $data);
    return $result;
  }


  private function getIdProdukBySlug($slug)
  {
    $return = $this->db->select('id')->from('products')
      ->where('slug', $slug)
      ->get()->row_array();
    return is_null($return) ? 0 : $return['id'];
  }
}
