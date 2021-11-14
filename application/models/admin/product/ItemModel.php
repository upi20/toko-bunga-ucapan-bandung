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

    public function images_insert($user_id, $product_id, $name, $foto)
    {
        $data = [
            'product_id' => $product_id,
            'name' => $name,
            'foto' => $foto,
            'created_by' => $user_id,
        ];
        $result = $this->db->insert('product_images', $data);
        return $result;
    }

    public function delete_images($detail_id)
    {
        $result = $this->db->where('id', $detail_id)
            ->delete('delete_images');
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









    // list ============================================================================================================
    public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        // select datatable
        $this->db->select("a.*, IF(a.status = '2', 'Tidak Aktif', IF(a.status = '1', 'Aktif', 'Tidak Diketahui')) as status_str,")->from('kpu_calon a');
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
        } else {
            $this->db->order_by('a.nama_depan', 'asc');
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
                a.nama LIKE '%$cari%' or
                a.npm LIKE '%$cari%' or
                a.visi LIKE '%$cari%' or
                a.misi LIKE '%$cari%'
                )");
        }

        // pagination
        if ($show != null && $start != null) {
            $this->db->limit($show, $start);
        }

        $result = $this->db->get();
        return $result;
    }




    public function simpan($id, $npm, $nama, $no_urut, $visi, $misi, $status, $is_ubah)
    {
        $this->db->trans_start();

        // cek apakah ada foto yang dikirim
        $ubah_foto = false;
        if ($_FILES['photo']['name'] != '') {
            // simpan foto
            $foto = $this->saveFile();
            $ubah_foto = true;

            $get_photo = $this->db->select('photo')->from('kpu_calon')->where('id', $id)->get()->row_array();
            $this->db->reset_query();
            // delete foto
            if ($get_photo != null) {
                if ($get_photo['photo'] != null && $get_photo['photo'] != '') {
                    $this->deleteFile($get_photo['photo']);
                }
            }
        }

        // simpan profile
        $this->db->where('id', $id);

        $data = [
            'npm' => $npm,
            'nama' => $nama,
            'no_urut' => $no_urut,
            'visi' => $visi,
            'misi' => $misi,
            'status' => $status,
            'created_by' => $this->session->userdata('data')['id'],
        ];

        // jika foto diubah
        if ($ubah_foto) {
            $data['photo'] = $foto['data'];
        }
        $return = $this->db->update('kpu_calon', $data);

        // kirim
        $this->db->trans_complete();
        return $return;
    }

    private function saveFile()
    {
        $config['upload_path']          = './files/calon/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
        $config['file_name']            = md5(uniqid("ktm_home", true));
        $config['overwrite']            = true;
        $config['max_size']             = 8024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photo')) {
            return [
                'status' => true,
                'data' => $this->upload->data("file_name"),
                'message' => 'Success'
            ];
        } else {
            return [
                'status' => false,
                'data' => null,
                'message' => $this->upload->display_errors('', '')
            ];
        }
    }

    private function deleteFile($file)
    {
        $res_foto = true;
        if (file_exists('./files/calon/' . $file)) {
            $res_foto = unlink('./files/calon/' . $file);
        }
        return $res_foto;
    }

    public function getAllCount()
    {
        // select datatable
        $this->db->select("a.*, IF(a.status = '2', 'Tidak Aktif', IF(a.status = '1', 'Aktif', 'Tidak Diketahui')) as status_str,")->from('kpu_calon a');
        $this->db->where("a.status !=", 0);
        $this->db->where("a.status !=", 3);
        return $this->db->get()->result();
    }









    public function list_partner()
    {
        $return = $this->db->select('a.id, a.nama as text')
            ->from('partner a')
            ->where('status', '1')
            ->get()
            ->result_array();
        return $return;
    }

    public function getContact($id = null, $order = null)
    {
        // select tabel
        $this->db->select("
                            a.*,
                            IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
                            ");
        $this->db->from("contact a");
        $this->db->where("a.id", $id);

        // order by
        // if ($order['order'] != null) {
        //     $columns = $order['columns'];
        //     $dir = $order['order'][0]['dir'];
        //     $order = $order['order'][0]['column'];
        //     $columns = $columns[$order];

        //     $order_colum = $columns['data'];
        //     $this->db->order_by($order_colum, $dir);
        // }

        $result = $this->db->get();
        return $result;
    }

    public function getContact1($idp = null, $order = null)
    {
        // select tabel
        $this->db->select("
                            a.*,
                            b.nama as tipe_contact,
                            IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
                            ");
        $this->db->from("contact a");
        $this->db->join("tipe_contact b", "a.id_tipe_contact = b.id", 'left');
        $this->db->where("a.id_profile", $idp);

        $result = $this->db->get();
        return $result;
    }

    public function getAlamat($id = null, $idp = null, $order = null)
    {
        // select tabel
        $this->db->select("
                            a.*,
                            b.nama as jenis_alamat,
                            IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
                            ");
        $this->db->from("alamat a");
        $this->db->join("jenis_alamat b", "a.id_jenis_alamat = b.id", 'left');
        $this->db->where("a.id_profile", $idp);
        if ($id != null) {
            $this->db->where("a.id", $id);
        }

        // order by
        if ($order['order'] != null) {
            $columns = $order['columns'];
            $dir = $order['order'][0]['dir'];
            $order = $order['order'][0]['column'];
            $columns = $columns[$order];

            $order_colum = $columns['data'];
            $this->db->order_by($order_colum, $dir);
        }

        $result = $this->db->get();
        return $result;
    }

    public function getFormal($id = null, $idp = null, $order = null)
    {
        // select tabel
        $this->db->select("
                            a.*,
                            b.name as peristiwa,
                            IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
                            ");
        $this->db->from("data_formal a");
        $this->db->join('dtm_peristiwa b', 'a.dtm_peristiwa_id = b.id', 'left');
        $this->db->where("a.id_profile", $idp);
        if ($id != null) {
            $this->db->where("a.id", $id);
        }

        // order by
        if ($order['order'] != null) {
            $columns = $order['columns'];
            $dir = $order['order'][0]['dir'];
            $order = $order['order'][0]['column'];
            $columns = $columns[$order];

            $order_colum = $columns['data'];
            $this->db->order_by($order_colum, $dir);
        }

        $result = $this->db->get();
        return $result;
    }

    public function getEducation($id = null, $idp = null, $order = null)
    {
        // select tabel
        $this->db->select("
                            a.*,
                            b.nama as nama,
                            IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
                            ");
        $this->db->from("gelar a");
        $this->db->join("jenis_gelar b", "a.id_jenis_gelar = b.id", "left");
        $this->db->where("a.id_profile", $idp);
        if ($id != null) {
            $this->db->where("a.id", $id);
        }

        // order by
        if ($order['order'] != null) {
            $columns = $order['columns'];
            $dir = $order['order'][0]['dir'];
            $order = $order['order'][0]['column'];
            $columns = $columns[$order];

            $order_colum = $columns['data'];
            $this->db->order_by($order_colum, $dir);
        }

        $result = $this->db->get();
        return $result;
    }



    public function getPathner($filter = null)
    {
        // diambil cuman pathner yang aktif == 1
        $this->db->select('id, nama as text');
        $this->db->from('partner');
        $this->db->where('status', 1);
        if ($filter != null) {
            // by partner
            if ($filter['partner'] != '') {
                $this->db->where('id', $filter['partner']);
            }
        }
        $return = $this->db->get()->result_array();
        return $return;
    }

    public function getLevel()
    {
        // diambil cuman pathner yang aktif == 1
        $this->db->select('lev_id, lev_nama');
        $this->db->from('level');
        $this->db->where('lev_status', 'Aktif');
        if ($this->session->userdata('data')['level'] != 'Super Admin') {
            $this->db->where('lev_nama !=', 'Super Admin');
        }
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert_contact($id, $id_profile, $tipe_kontak, $keterangan, $status)
    {
        $this->db->trans_start();
        $insert = $this->db->insert('contact', [
            'id_profile' => $id_profile,
            'id_tipe_contact' => $tipe_kontak,
            'keterangan' => $keterangan,
            'status' => $status,
            'created_at' => date("Y-m-d H:i:s")
        ]);


        // $result = $this->db->get_where('alamat', ["id" => $id])->result_array();
        $this->db->trans_complete();
        return $insert;
    }

    public function update_contact($id, $tipe_kontak, $keterangan, $status)
    {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $update = $this->db->update('contact', [
            'id_tipe_contact' => $tipe_kontak,
            'keterangan' => $keterangan,
            'status' => $status,
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        $result = $this->db->get_where('contact', ["id" => $id])->result_array();
        $this->db->trans_complete();
        return $result;
    }

    public function insert_alamat($id, $id_profile, $jenis_alamat, $alamat, $domisili, $tanggal_mulai, $tanggal_selesai, $status)
    {
        $this->db->trans_start();
        $insert = $this->db->insert('alamat', [
            'id_profile' => $id_profile,
            'id_jenis_alamat' => $jenis_alamat,
            'alamat' => $alamat,
            'domisili' => $domisili,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status' => $status,
            'created_at' => date("Y-m-d H:i:s")
        ]);


        // $result = $this->db->get_where('alamat', ["id" => $id])->result_array();
        $this->db->trans_complete();
        return $insert;
    }

    public function update_alamat($id, $id_profile, $jenis_alamat, $alamat, $domisili, $tanggal_mulai, $tanggal_selesai, $status)
    {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $update = $this->db->update('alamat', [
            'id_profile' => $id_profile,
            'id_jenis_alamat' => $jenis_alamat,
            'alamat' => $alamat,
            'domisili' => $domisili,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status' => $status,
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $result = $this->db->get_where('alamat', ["id" => $id])->result_array();
        $this->db->trans_complete();
        return $result;
    }

    public function insert_formal($id, $id_profile, $peristiwa_formal, $tempat, $tanggal_data_formal, $status, $keterangan)
    {
        $this->db->trans_start();
        $insert = $this->db->insert('data_formal', [
            'id_profile' => $id_profile,
            'dtm_peristiwa_id' => $peristiwa_formal,
            'keterangan' => $keterangan,
            'tempat' => $tempat,
            'tanggal_data_formal' => $tanggal_data_formal,
            'status' => $status,
            'created_at' => date("Y-m-d H:i:s")
        ]);


        $this->db->trans_complete();
        return $insert;
    }

    public function update_formal($id, $id_profile, $peristiwa_formal, $tempat, $tanggal_data_formal, $status, $keterangan)
    {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $update = $this->db->update('data_formal', [
            'id_profile' => $id_profile,
            'dtm_peristiwa_id' => $peristiwa_formal,
            'tempat' => $tempat,
            'keterangan' => $keterangan,
            'tanggal_data_formal' => $tanggal_data_formal,
            'status' => $status,
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $result = $this->db->get_where('alamat', ["id" => $id])->result_array();
        $this->db->trans_complete();
        return $result;
    }

    public function insert_education($id, $id_profile, $nama, $tanggal_lulus, $lembaga, $status)
    {
        $this->db->trans_start();
        $insert = $this->db->insert('gelar', [
            'id_profile' => $id_profile,
            'id_jenis_gelar' => $nama,
            'tanggal_lulus' => $tanggal_lulus,
            'lembaga' => $lembaga,
            'status' => $status,
            'created_at' => date("Y-m-d H:i:s")
        ]);


        $this->db->trans_complete();
        return $insert;
    }

    public function update_education($id, $id_profile, $nama, $tanggal_lulus, $lembaga, $status)
    {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $update = $this->db->update('gelar', [
            'id_profile' => $id_profile,
            'id_jenis_gelar' => $nama,
            'tanggal_lulus' => $tanggal_lulus,
            'lembaga' => $lembaga,
            'status' => $status,
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $result = $this->db->get_where('alamat', ["id" => $id])->result_array();
        $this->db->trans_complete();
        return $result;
    }

    public function hapusDaftar($id, $tbl)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete($tbl);
        return $result;
    }

    public function listmembership()
    {
        $return = $this->db->select('a.id, a.nama as text')
            ->from('jenis_membership a')
            ->where('status', '1')
            ->get()
            ->result_array();
        return $return;
    }

    public function listperistiwa()
    {
        $return = $this->db->select('a.id, a.name as text')
            ->from('dtm_peristiwa a')
            ->where('status', '1')
            ->get()
            ->result_array();
        return $return;
    }

    public function listjenisalamat()
    {
        $return = $this->db->select('a.id, a.nama as text')
            ->from('jenis_alamat a')
            ->where('status', '1')
            ->get()
            ->result_array();
        return $return;
    }

    public function listjenisgelar()
    {
        $return = $this->db->select('a.id, a.nama as text')
            ->from('jenis_gelar a')
            ->where('status', '1')
            ->get()
            ->result_array();
        return $return;
    }

    public function listtipekontak()
    {
        $return = $this->db->select('a.id, a.nama as text')
            ->from('tipe_contact a')
            ->where('status', '1')
            ->get()
            ->result_array();
        return $return;
    }

    public function emailCheck($email, $id_user)
    {
        return $this->db->select('user_email')
            ->from('users')
            ->where('user_email', $email)
            ->where('user_id <> ', $id_user)
            ->where('user_status <> ', 3)
            ->get()
            ->row_array();
    }

    public function nikCheck($nik, $id_user)
    {
        return $this->db->select('nik')
            ->from('users')
            ->where('nik', $nik)
            ->where('user_id <> ', $id_user)
            ->where('user_status <> ', 3)
            ->get()
            ->row_array();
    }

    public function getKontak($draw = null, $show = null, $start = null, $cari = null, $order = null)
    {
        // select tabel
        $this->db->select("a.*, b.nama as tipe_kontak,IF(a.status = '2' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str");
        $this->db->from("contact a");
        $this->db->join('tipe_contact b', 'a.id_tipe_contact = b.id', 'left');
        $this->db->where('a.status <>', 3);
        $this->db->where('a.id_profile', $order['profile']['id_profile']);

        // order by
        if ($order['order'] != null) {
            $columns = $order['columns'];
            $dir = $order['order'][0]['dir'];
            $order = $order['order'][0]['column'];
            $columns = $columns[$order];

            $order_colum = $columns['data'];
            $this->db->order_by($order_colum, $dir);
        }

        // pencarian
        if ($cari != null) {
            $this->db->where("(
                b.nama LIKE '%$cari%' OR
                a.keterangan LIKE '%$cari%' OR
                IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) LIKE '%$cari%'
                )");
        }

        $result = $this->db->get();
        return $result;
    }

    public function getMembership($draw = null, $show = null, $start = null, $cari = null, $order = null)
    {
        // select tabel
        $this->db->select("a.id,
        a.id_jenis_membership as id_jenis,
        b.nama,
        a.status,
        a.tanggal_anggota as tanggal,
        IF(a.status = '2' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str,
        a.created_at,
        a.updated_at");
        $this->db->from("membership a");
        $this->db->join("jenis_membership b", "a.id_jenis_membership = b.id");
        $this->db->where('a.id_profile', $order['profile']['id_profile']);

        // order by
        if ($order['order'] != null) {
            $columns = $order['columns'];
            $dir = $order['order'][0]['dir'];
            $order = $order['order'][0]['column'];
            $columns = $columns[$order];

            $order_colum = $columns['data'];
            $this->db->order_by($order_colum, $dir);
        }

        // // initial data table
        // if ($draw == 1) {
        //     $this->db->limit(10, 0);
        // }

        // pencarian
        if ($cari != null) {
            $this->db->where("(b.nama LIKE '%$cari%' or a.tanggal_anggota LIKE '%$cari%' or IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) LIKE '%$cari%')");
        }

        // // pagination
        // if ($show != null && $start != null) {
        //     $this->db->limit($show, $start);
        // }

        $result = $this->db->get();
        return $result;
    }

    public function membershipCheck($id_jenis, $id_profile)
    {
        return $this->db->select('id')
            ->from('membership')
            ->where('id_profile', $id_profile)
            ->where('id_jenis_membership', $id_jenis)
            ->get()
            ->row_array();
    }

    public function insert_membership($id_jenis, $id_profile, $tanggal)
    {
        $this->db->trans_start();
        $membership = $this->db->select('id, status')
            ->from('membership')
            ->where('id_profile', $id_profile)
            ->get();
        $num_rows = $membership->num_rows();
        $this->db->reset_query();

        $this->db->insert('membership', [
            'id_profile' => $id_profile,
            'id_jenis_membership' => $id_jenis,
            'id_approver' => $this->session->userdata('data')['id'],
            'tanggal_anggota' => $tanggal,
            'status' => $num_rows > 0 ? 2 : 1
        ]);

        $id_insert = $this->db->insert_id();
        $this->db->trans_complete();
        return $id_insert;
    }

    public function update_membership($id, $id_jenis, $id_profile, $tanggal)
    {
        $this->db->where('id', $id);
        return $this->db->update('membership', [
            'id_profile' => $id_profile,
            'id_jenis_membership' => $id_jenis,
            'id_approver' => $this->session->userdata('data')['id'],
            'tanggal_anggota' => $tanggal
        ]);
    }

    public function set_active_membersip($id, $id_profile)
    {
        $this->db->trans_start();
        // get membership sebelumnya
        $membership = $this->db->select('id, status')
            ->from('membership')
            ->where('id_profile', $id_profile)
            ->get();
        $num_rows = $membership->num_rows();
        $datas = $membership->result_array();
        $this->db->reset_query();

        // jika membership sama dengan 1 maka
        // membership itu tetap aktif
        if ($num_rows == 1) {
            $idq = $datas[0]['id'];
            $this->db->where('id', $idq);
            $this->db->update('membership', ['status' => 1]);
            // set level nya juga
            $this->db->reset_query();
        } else if ($num_rows >= 1) {
            // set mebership yang dikirim params jadi aktif
            // set level nya juga
            $this->db->where('id', $id);
            $this->db->update('membership', ['status' => 1]);
            $this->db->reset_query();
            // dan yang tidak di kirim params tidak aktif
            $this->db->where('id <>', $id);
            $this->db->update('membership', ['status' => 2]);
            $this->db->reset_query();
        }
        $this->db->trans_complete();
        return true;
    }


    private function user_insert($level, $nama, $telepon, $username, $password, $status, $nik, $id_partner, $change_email)
    {
        $data['user_email_status']             = $change_email;
        $data['user_nama']             = $nama;
        $data['user_email']         = $username;
        $data['user_password']         = $this->b_password->bcrypt_hash($password);
        $data['user_phone']         = $telepon ?? '';
        $data['user_status']         = $status;
        $data['nik']         = $nik;
        $data['id_partner']         = $id_partner;
        $data['user_tgl_lahir']         = null;

        // Insert users
        $execute                     = $this->db->insert('users', $data);
        $execute                     = $this->db->insert_id();

        $data2['role_user_id']         = $execute;
        $data2['role_lev_id']         = $level;

        // Insert role users
        $execute2                     = $this->db->insert('role_users', $data2);

        $exe['id']                     = $execute;
        $exe['level']                 = $this->_cek('level', 'lev_id', $level, 'lev_nama');

        return $execute;
    }

    private function user_update($id, $level, $nama, $telepon, $username, $password, $status, $nik, $id_partner, $change_email)
    {
        $data['user_email_status']             = (string)$change_email;
        $data['user_nama']             = $nama;
        $data['user_email']         = $username;
        $data['user_phone']         = $telepon ?? '';
        $data['user_status']         = $status;
        $data['id_partner']         = $id_partner;
        $data['nik']         = $nik;
        $data['user_tgl_lahir']         = null;
        $data['updated_at']         = Date("Y-m-d H:i:s", time());
        if ($password != '') {
            $data['user_password']         = $this->b_password->bcrypt_hash($password);
        }

        // Update users
        $execute                     = $this->db->where('user_id', $id);
        $execute                     = $this->db->update('users', $data);

        $data2['role_user_id']         = $id;
        $data2['role_lev_id']         = $level;

        // Update role users
        $execute2                     = $this->db->where('role_user_id', $id);
        $execute2                      = $this->db->update('role_users', $data2);


        $exe['id']                     = $id;
        $exe['level']                 = $this->_cek('level', 'lev_id', $level, 'lev_nama');

        return $execute;
    }



    public function delete($id)
    {

        $this->db->where('id', $id);
        $profile = $this->db->update('kpu_calon', [
            'status' => 3,
            'deleted_at' => date("Y-m-d H:i:s"),
            'deleted_by' => $this->session->userdata('data')['id'],
        ]);

        return $profile;
    }
}


// membership aktif cuma satu belum
