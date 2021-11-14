<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegistrasiModel extends Render_Model
{
    public function getData($nama)
    {
        // Cek apakah data sudaha ada atau belum
        $siswa = $this->db->select("nilai, updated_at")->from("pengaturan_registrasi")->where("nama", $nama)->get();
        if ($siswa->num_rows() > 0) {
            $result = $siswa->row_array();
        }
        // Jika belum maka buat
        else {
            $this->db->insert('pengaturan_registrasi', [
                'nama' => $nama,
                'keterangan' => "Nilai pengaturan untuk halaman registrasi $nama"
            ]);
            $result = ['nilai' => 0, 'updated_at' => ''];
        }
        return $result;
    }


    public function update($nama, $nilai)
    {
        $this->sesion->cek_session();
        if ($this->session->userdata('data')['level'] != 'Administrator') {
            redirect('my404', 'refresh');
        }

        $this->db->where('nama', $nama);
        $date = Date("Y-m-d H:i:s", time());
        $result = $this->db->update('pengaturan_registrasi', [
            'nilai' => $nilai,
            'updated_at' => $date
        ]);

        $result = $result ? $date : null;
        return $result;
    }
}
