<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WhatsappModel extends Render_Model
{
    public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null)
    {
        $level = $this->config->item('level_mentor');
        // select tabel
        $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
        ");
        $this->db->from("whatsapp a");
        $this->db->where('a.status <>', 3);
        $this->db->order_by('a.status', 'desc');

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
                a.number LIKE '%$cari%' or
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

    public function insert($user_id, $name, $number, $description)
    {
        $status = $this->db->select('count(*) as found')->from('whatsapp')->where('status', 1)->get()->row();
        $status = isset($status->found) ? $status->found : 0;
        $status = $status > 0 ? 0 : 1;

        $data = [
            'name' => $name,
            'number' => $number,
            'description' => $description,
            'status' => $status,
            'created_by' => $user_id,
        ];
        // Insert users
        $execute = $this->db->insert('whatsapp', $data);
        $execute = $this->db->insert_id();
        return $execute;
    }

    public function update($id, $user_id, $name,  $number,  $description)
    {
        $data = [
            'name' => $name,
            'number' => $number,
            'description' => $description,
            'updated_by' => $user_id,
        ];
        // Update users
        $execute = $this->db->where('id', $id);
        $execute = $this->db->update('whatsapp', $data);
        return  $execute;
    }

    public function delete($user_id, $id)
    {
        // Delete users
        $exe = $this->db->where('id', $id)->update('whatsapp', [
            'status' => 3,
            'deleted_by' => $user_id,
            'deleted_at' => Date("Y-m-d H:i:s", time())
        ]);
        return $exe;
    }

    public function getList()
    {
        return $this->db->select('id, nama as text')
            ->from('whatsapp')
            ->where('status', 1)
            ->get()->result_array();
    }

    public function activate($user_id, $id)
    {
        $this->db->where('id', $id)->update('whatsapp', ['status' => 1, 'updated_by' => $user_id]);
        $this->db
            ->where('id <>', $id)
            ->where('status', 1)
            ->where('status <>', 3)
            ->update('whatsapp', ['status' => 0, 'updated_by' => $user_id]);
    }
}
