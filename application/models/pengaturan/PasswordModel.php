<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasswordModel extends Render_Model
{
    public function cekPpassword($id_user, $current_password)
    {
        $password = $this->db->select("a.user_password")
            ->from('users a')
            ->where('a.user_id', $id_user)
            ->get()
            ->row_array();
        if ($password == null) {
            $cek = false;
        } else {
            $cek = $this->b_password->hash_check($current_password, $password['user_password']);
        }
        return $cek;
    }

    public function updatePassword($id_user, $new_password)
    {
        $new_password_hash = $this->b_password->bcrypt_hash($new_password);
        $this->db->where('user_id', $id_user);
        $cek = $this->db->update('users', ['user_password' => $new_password_hash]);
        return $cek;
    }
}
