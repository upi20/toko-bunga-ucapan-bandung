<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HakAksesLevelModel extends Render_Model
{
    public function getDataDisplay($id)
    {

        $menus = $this->db->query("select menu.menu_id, menu.menu_menu_id, menu.menu_nama, menu.menu_status, (select COUNT(*) from role_aplikasi where role_aplikasi.rola_menu_id = menu.menu_id and role_aplikasi.rola_lev_id = '$id') as akses from menu where menu_menu_id = '0'")->result_array();
        $result = [];
        foreach ($menus as $menu) {
            $menu_id = $menu['menu_id'];
            $result[] = ['menu' => $menu, 'sub_menu' => $this->db->query("select menu.menu_id, menu.menu_menu_id, menu.menu_nama, menu.menu_status, (select COUNT(*) from role_aplikasi where role_aplikasi.rola_menu_id = menu.menu_id and role_aplikasi.rola_lev_id = '$id') as akses from menu where menu_menu_id = '$menu_id' order by menu.menu_index")->result_array()];
        }

        return $result;
    }

    public function insert($level, $menu)
    {
        return $this->db->insert('role_aplikasi', ['rola_menu_id' => $menu, 'rola_lev_id' => $level]);
    }
    public function delete($level, $menu)
    {
        return $this->db->delete('role_aplikasi', ['rola_menu_id' => $menu, 'rola_lev_id' => $level]);
    }
}
