<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryModel extends Render_Model
{
    public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null)
    {
        $level = $this->config->item('level_mentor');
        // select tabel
        $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str,
        ( select count(*) from product_category_detail z where z.category_id  = a.id and z.status = 1 ) as category_product
        ");
        $this->db->from("product_categories a");
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
                a.slug LIKE '%$cari%' or
                a.description LIKE '%$cari%' or
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

    public function insert($user_id, $name, $slug, $foto, $description, $status)
    {
        $data = [
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'status' => $status,
            'foto' => $foto,
            'created_by' => $user_id,
        ];
        // Insert users
        $execute = $this->db->insert('product_categories', $data);
        $execute = $this->db->insert_id();
        return $execute;
    }

    public function update($id, $user_id, $name, $slug, $foto, $description, $status)
    {
        $data = [
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'status' => $status,
            'foto' => $foto,
            'updated_by' => $user_id,
        ];
        // Update users
        $execute = $this->db->where('id', $id);
        $execute = $this->db->update('product_categories', $data);
        return  $execute;
    }

    public function delete($user_id, $id)
    {
        // Delete users
        $exe = $this->db->where('id', $id)->update('product_categories', [
            'status' => 3,
            'deleted_by' => $user_id,
            'deleted_at' => Date("Y-m-d H:i:s", time())
        ]);
        return $exe;
    }

    public function getList()
    {
        return $this->db->select('id, nama as text')
            ->from('product_categories')
            ->where('status', 1)
            ->get()->result_array();
    }
}
