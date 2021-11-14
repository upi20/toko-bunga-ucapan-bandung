<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemilihModel extends Render_Model
{
    public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        $level = $this->config->item('level_mentor');
        // select tabel
        $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str,
        if(isnull(b.id), 'Belum', 'Sudah') as sudah_pilih_str,
        b.id as id_pemilihan, b.created_at as pilih_waktu");
        $this->db->from("kpu_pemilih a");
        $this->db->join("kpu_pemilihan b", 'a.id = b.id_pemilih', 'left');
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
                a.nama LIKE '%$cari%' or
                a.npp LIKE '%$cari%' or
                a.keterangan LIKE '%$cari%' or
                if(isnull(b.id), 'Belum', 'Sudah') LIKE '%$cari%' or
                IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) LIKE '%$cari%'
            )");
        }

        // filter
        if ($filter != null) {
            // by kategori
            if ($filter['kategori'] != '') {
                $this->db->where('c.id', $filter['kategori']);
            }
            // by kelas
            if ($filter['kelas'] != '') {
                $this->db->where('b.id', $filter['kelas']);
            }
        }

        // pagination
        if ($show != null && $start != null) {
            $this->db->limit($show, $start);
        }

        $result = $this->db->get();
        return $result;
    }

    public function insert($user_id, $nama, $npp, $keterangan,  $status)
    {
        $data = [
            'nama' => $nama,
            'npp' => $npp,
            'token' => $this->getReferral(7),
            'keterangan' => $keterangan,
            'status' => $status,
            'created_by' => $user_id,
        ];
        // Insert users
        $execute = $this->db->insert('kpu_pemilih', $data);
        $execute = $this->db->insert_id();
        return $execute;
    }

    private function generateReferral($length_of_string)
    {
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }

    private function getReferral($length)
    {
        $loop = true;
        $ref = '';
        while ($loop) {
            $ref = $this->generateReferral($length);
            $loop = $this->checkReferal($ref) != null;
        }
        return $ref;
    }

    private function checkReferal($kode)
    {
        return $this->db->select('id')->from('kpu_pemilih')->where('token', $kode)->get()->row();
    }

    public function update($id, $user_id, $nama, $npp, $keterangan,  $status)
    {
        $data = [
            'nama' => $nama,
            'npp' => $npp,
            'keterangan' => $keterangan,
            'status' => $status,
            'updated_by' => $user_id,
        ];
        // Update users
        $execute = $this->db->where('id', $id);
        $execute = $this->db->update('kpu_pemilih', $data);
        return  $execute;
    }

    public function delete($user_id, $id)
    {
        // Delete users
        $exe = $this->db->where('id', $id)->update('kpu_pemilih', [
            'status' => 3,
            'deleted_by' => $user_id,
            'deleted_at' => Date("Y-m-d H:i:s", time())
        ]);
        return $exe;
    }

    public function getList()
    {
        return $this->db->select('id, nama as text')->from('kpu_pemilih')->where('status', 1)->get()->result_array();
    }

    public function noUrut($kelas_id)
    {
        $data = $this->db
            ->select('(max(no_urut)+1) as no_urut')
            ->from('kpu_pemilih')
            ->where('kelas_id', $kelas_id)
            ->where('status <>', 3)
            ->get()
            ->row_array();
        $data = $data ?? ['no_urut' => 1];
        $data = $data['no_urut'];
        $data = $data ?? 1;
        return $data;
    }

    public function cekNoUrut($kelas_id, $no)
    {
        $data = $this->db
            ->select('count(*) as found')
            ->from('kpu_pemilih')
            ->where('kelas_id', $kelas_id)
            ->where('no_urut', $no)
            ->where('status <>', 3)
            ->get()
            ->row_array();
        $data = $data['found'] == 0;
        return $data;
    }

    public function dataPemilih($id = null)
    {
        $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str,
        IF(((b.id) is null), 'Belum Pilih', concat('Sudah Pilih (', b.created_at ,')')) as sudah_pilih");
        $this->db->from("kpu_pemilih a");
        if ($id != null) {
            $this->db->where('a.id', $id);
        }
        $this->db->join("kpu_pemilihan b", 'a.id = b.id_pemilih', 'left');
        $this->db->where('a.status <>', 3);
        if ($id != null) {
            $return = $this->db->get()->row();
        } else {
            $return = $this->db->get()->result();
        }
        return  $return;
    }
}
