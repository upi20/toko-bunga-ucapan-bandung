<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ItemModel extends Render_Model
{
    // add =============================================================================================================
    // categories
    public function ajax_data_categories($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        // select datatable
        $this->db->select("a.id, b.name")
            ->from('product_category_detail a')
            ->join('product_categories b', 'a.category_id = b.id')
            ->where("a.status !=", 0)
            ->where("a.status !=", 3);

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

        // filter
        if ($filter != null) {
            if ($filter['product'] != '') {
                $this->db->where('a.product_id', $filter['product']);
            }
        }

        // pencarian
        if ($cari != null) {
            $this->db->where("(
                b.name LIKE '%$cari%' or
                b.slug LIKE '%$cari%' or
                b.description LIKE '%$cari%'
                )");
        }

        // pagination
        if ($show != null && $start != null) {
            $this->db->limit($show, $start);
        }

        $result = $this->db->get();
        return $result;
    }

    public function insert_category($user_id, $product_id, $category_id)
    {
        $data = [
            'product_id' => $product_id,
            'category_id' => $category_id,
            'created_by' => $user_id,
        ];
        $result = $this->db->insert('product_category_detail', $data);
        return $result;
    }

    public function delete_category($detail_id)
    {
        $result = $this->db->where('id', $detail_id)
            ->delete('product_category_detail');
        return $result;
    }

    // colors
    public function ajax_data_colors($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        // select datatable
        $this->db->select("a.id, b.name")
            ->from('product_color_detail a')
            ->join('product_colors b', 'a.color_id = b.id')
            ->where("a.status !=", 0)
            ->where("a.status !=", 3);

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

        // filter
        if ($filter != null) {
            if ($filter['product'] != '') {
                $this->db->where('a.product_id', $filter['product']);
            }
        }

        // pencarian
        if ($cari != null) {
            $this->db->where("(
                    b.name LIKE '%$cari%' or
                    b.slug LIKE '%$cari%' or
                    b.description LIKE '%$cari%'
                    )");
        }

        // pagination
        if ($show != null && $start != null) {
            $this->db->limit($show, $start);
        }

        $result = $this->db->get();
        return $result;
    }

    public function insert_color($user_id, $product_id, $color_id)
    {
        $data = [
            'product_id' => $product_id,
            'color_id' => $color_id,
            'created_by' => $user_id,
        ];
        $result = $this->db->insert('product_color_detail', $data);
        return $result;
    }

    public function delete_color($detail_id)
    {
        $result = $this->db->where('id', $detail_id)
            ->delete('product_color_detail');
        return $result;
    }


    // images
    public function images_ajax_data($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        // select datatable
        $this->db->select("*")
            ->from('product_images a')
            ->where("a.status !=", 0)
            ->where("a.status !=", 3);

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

        // filter
        if ($filter != null) {
            if ($filter['product'] != '') {
                $this->db->where('a.product_id', $filter['product']);
            }
        }

        // pencarian
        if ($cari != null) {
            $this->db->where("(
                    b.name LIKE '%$cari%' or
                    b.slug LIKE '%$cari%' or
                    b.description LIKE '%$cari%'
                    )");
        }

        // pagination
        if ($show != null && $start != null) {
            $this->db->limit($show, $start);
        }

        $result = $this->db->get();
        return $result;
    }

    public function images_insert($user_id, $product_id, $name, $number, $foto)
    {
        $data = [
            'product_id' => $product_id,
            'name' => $name,
            'foto' => $foto,
            'number' => $number,
            'created_by' => $user_id,
        ];
        $result = $this->db->insert('product_images', $data);
        return $result;
    }

    public function images_update($id, $user_id, $product_id, $name, $number, $foto)
    {
        $data = [
            'product_id' => $product_id,
            'name' => $name,
            'foto' => $foto,
            'number' => $number,
            'created_by' => $user_id,
        ];
        $result = $this->db->where('id', $id)->update('product_images', $data);
        return $result;
    }

    public function delete_images($detail_id)
    {
        $result = $this->db->where('id', $detail_id)
            ->delete('product_images');
        return $result;
    }

    // get new
    public function cekNew($id = null)
    {
        if ($id == null) {
            $cek = $this->db->get_where("products", ["status" => 0]);
            $this->db->trans_start();
            if ($cek->num_rows() == 0) {
                $this->db->insert("products", [
                    "status" => 0
                ]);
                $getID = $this->db->insert_id();
            } else {
                $getID = $cek->result_array()[0]['id'];
            }
            $return = $this->db->select('*')->from('products')->where('id', $getID)->get()->row_array();
            $this->db->trans_complete();

            return $return;
        } else {
            $id = $this->db->select('*')->from('products')->where('id', $id)->get()->row_array();
            return $id;
        }
    }

    // get list category

    // get list color
    public function getListCategory()
    {
        $result = $this->db->select('id, name as text')
            ->from('product_categories')
            ->get()->result_array();
        return $result;
    }

    public function getListColor()
    {
        $result = $this->db->select('id, name as text')
            ->from('product_colors')
            ->get()->result_array();
        return $result;
    }

    // list ============================================================================================================
    public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        // select datatable
        $this->db->select("a.*,
        IF(a.status = '2', 'Tidak Aktif', IF(a.status = '1', 'Aktif', 'Tidak Diketahui')) as status_str,
        IF(a.view_home = '0', 'Tidak', IF(a.view_home = '1', 'Iya', 'Tidak Diketahui')) as view_home_str,
        ")->from('products a');
        $this->db->where("a.status !=", 0);
        $this->db->where("a.status !=", 3);

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

        // filter
        if ($filter != null) {
            // by partner
            if ($filter['partner'] != '') {
                if ($filter['partner'] == '-') {
                    $this->db->where('e.nama IS NULL');
                } else if ($filter['partner'] != NULL) {
                    $this->db->where('b.id_partner', $filter['partner']);
                }
            }
        }

        // pencarian
        if ($cari != null) {
            $this->db->where("(
                a.name LIKE '%$cari%' or
                a.slug LIKE '%$cari%' or
                a.description LIKE '%$cari%' or
                a.excerpt LIKE '%$cari%' or
                IF(a.view_home = '0', 'Tidak', IF(a.view_home = '1', 'Iya', 'Tidak Diketahui')) LIKE '%$cari%' or
                a.size LIKE '%$cari%'
                )");
        }

        // pagination
        if ($show != null && $start != null) {
            $this->db->limit($show, $start);
        }

        $result = $this->db->get();
        return $result;
    }

    public function simpan($id, $name, $slug, $excerpt, $price, $old_price, $discount, $description, $size, $view_home, $view_review, $status)
    {
        $this->db->trans_start();

        $return = $this->db->where('id', $id)->update('products', [
            'name' => $name,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'view_home' => $view_home,
            'view_review' => $view_review,
            'price' => $price,
            'old_price' => $old_price,
            'discount' => $discount,
            'description' => $description,
            'size' => $size,
            'status' => $status
        ]);
        $this->db->trans_complete();
        return $return;
    }


    // delete
    public function delete($product_id)
    {
        $this->db->where('id', $product_id);
        $profile = $this->db->delete('products');
        return $profile;
    }

    public function deleteCategoryProduct($product_id)
    {
        $this->db->where('product_id', $product_id);
        $result = $this->db->delete('product_category_detail');
        return $result;
    }

    public function deleteColorProduct($product_id)
    {
        $this->db->where('product_id', $product_id);
        $result = $this->db->delete('product_color_detail');
        return $result;
    }

    public function deleteImagesProduct($product_id)
    {
        $this->db->where('product_id', $product_id);
        $result = $this->db->delete('product_images');
        return $result;
    }

    public function getAllImageFromProductById($product_id)
    {
        $result = $this->db->select('foto')
            ->from('product_images')
            ->where('product_id', $product_id)
            ->get()->result_array();
        return $result;
    }

    public function ajax_data_review($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        // select datatable
        $this->db->select("*, IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str,")
            ->from('product_reviews a');

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

        // filter
        if ($filter != null) {
            if ($filter['product'] != '') {
                $this->db->where('a.product_id', $filter['product']);
            }
        }

        // pencarian
        if ($cari != null) {
            $this->db->where("(
                a.name LIKE '%$cari%' or
                a.email LIKE '%$cari%' or
                a.tanggal LIKE '%$cari%' or
                a.description LIKE '%$cari%'
                )");
        }

        // pagination
        if ($show != null && $start != null) {
            $this->db->limit($show, $start);
        }

        $result = $this->db->get();
        return $result;
    }

    public function review_delete_all($product_id)
    {
        return $this->db->where('product_id', $product_id)->delete('product_reviews');
    }

    public function review_delete($id)
    {
        return $this->db->where('id', $id)->delete('product_reviews');
    }

    public function review_cange($id, $status)
    {
        return $this->db->where('id', $id)->update('product_reviews', ['status' => $status]);
    }
}
