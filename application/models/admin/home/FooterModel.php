<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FooterModel extends Render_Model
{
  // list
  public function list_ajax($draw = null, $show = null, $start = null, $cari = null, $order = null)
  {
    $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
        ");
    $this->db->from("home_footer_list a");
    $this->db->where('a.status <>', 3);

    // order by
    if ($order['order'] != null) {
      $columns = $order['columns'];
      $dir = $order['order'][0]['dir'];
      $order = $order['order'][0]['column'];
      $columns = $columns[$order];

      $order_colum = $columns['data'];
      $this->db->order_by($order_colum, $dir);
    }

    // initial data table
    if ($draw == 1) {
      $this->db->limit(10, 0);
    }

    // pencarian
    if ($cari != null) {
      $this->db->where("(
                a.name LIKE '%$cari%' or
                a.link LIKE '%$cari%' or
                a.name LIKE '%$cari%' or
                IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) LIKE '%$cari%'
            )");
    }

    // pagination
    if ($show != null && $start != null) {
      $this->db->limit($show, $start);
    }

    $result = $this->db->get();
    return $result;
  }

  public function list_insert($user_id, $name, $link, $status)
  {
    $data = [
      'name' => $name,
      'status' => $status,
      'link' => $link,
      'created_by' => $user_id,
    ];
    $execute = $this->db->insert('home_footer_list', $data);
    $execute = $this->db->insert_id();
    return $execute;
  }

  public function list_update($id, $user_id, $name, $link, $status)
  {
    $data = [
      'name' => $name,
      'status' => $status,
      'link' => $link,
      'updated_by' => $user_id,
      'updated_at' => Date("Y-m-d H:i:s", time()),
    ];
    $execute = $this->db->where('id', $id);
    $execute = $this->db->update('home_footer_list', $data);
    return  $execute;
  }

  public function list_delete($id)
  {
    $exe = $this->db->where('id', $id)->delete('home_footer_list');
    return $exe;
  }

  // sosmed
  public function sosmed_ajax($draw = null, $show = null, $start = null, $cari = null, $order = null)
  {
    $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
        ");
    $this->db->from("home_sosmed a");
    $this->db->where('a.status <>', 3);

    // order by
    if ($order['order'] != null) {
      $columns = $order['columns'];
      $dir = $order['order'][0]['dir'];
      $order = $order['order'][0]['column'];
      $columns = $columns[$order];

      $order_colum = $columns['data'];
      $this->db->order_by($order_colum, $dir);
    }

    // initial data table
    if ($draw == 1) {
      $this->db->limit(10, 0);
    }

    // pencarian
    if ($cari != null) {
      $this->db->where("(
                a.name LIKE '%$cari%' or
                a.link LIKE '%$cari%' or
                a.icon LIKE '%$cari%' or
                a.name LIKE '%$cari%' or
                IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) LIKE '%$cari%'
            )");
    }

    // pagination
    if ($show != null && $start != null) {
      $this->db->limit($show, $start);
    }

    $result = $this->db->get();
    return $result;
  }

  public function sosmed_insert($user_id, $name, $link, $icon, $status)
  {
    $data = [
      'name' => $name,
      'status' => $status,
      'link' => $link,
      'icon' => $icon,
      'created_by' => $user_id,
    ];
    $execute = $this->db->insert('home_sosmed', $data);
    $execute = $this->db->insert_id();
    return $execute;
  }

  public function sosmed_update($id, $user_id, $name, $link, $icon, $status)
  {
    $data = [
      'name' => $name,
      'status' => $status,
      'link' => $link,
      'icon' => $icon,
      'updated_by' => $user_id,
      'updated_at' => Date("Y-m-d H:i:s", time()),
    ];
    $execute = $this->db->where('id', $id);
    $execute = $this->db->update('home_sosmed', $data);
    return  $execute;
  }

  public function sosmed_delete($id)
  {
    $exe = $this->db->where('id', $id)->delete('home_sosmed');
    return $exe;
  }
}
