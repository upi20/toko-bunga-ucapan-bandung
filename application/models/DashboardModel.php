<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends Render_Model
{

    public function getJumlahCompany(): int
    {
        $return = $this->db
            ->query('SELECT count(*) as jumlah FROM client_company WHERE status = 1')
            ->row_array();
        return $return['jumlah'];
    }

    public function getJumlahResiko(): int
    {
        $return = $this->db
            ->query('SELECT count(*) as jumlah FROM resiko WHERE status = 1')
            ->row_array();
        return $return['jumlah'];
    }

    public function getJumlahMembership(): int
    {
        $return = $this->db
            ->query('SELECT count(*) as jumlah FROM jenis_membership WHERE status = 1')
            ->row_array();
        return $return['jumlah'];
    }

    public function getJumlahPeristiwa(): int
    {
        $return = $this->db
            ->query('SELECT count(*) as jumlah FROM dtm_peristiwa WHERE status = 1')
            ->row_array();
        return $return['jumlah'];
    }

    public function getJumlahPatner(): int
    {
        $return = $this->db
            ->query('SELECT count(*) as jumlah FROM partner WHERE status = 1')
            ->row_array();
        return $return['jumlah'];
    }

    public function getJumlahPengguna(): int
    {
        $return = $this->db
            ->query('SELECT count(*) as jumlah FROM profile WHERE status = 1')
            ->row_array();
        return $return['jumlah'];
    }

    public function api_getStokDibawa($id_sales): array
    {
        $return = $this->db
            ->select_sum('a.jumlah')
            ->from('stok_keluar_detail a')
            ->join('stok_keluar b', 'b.id = a.id_stok_keluar')
            ->where('b.status', 1)
            ->where('b.id_sales', $id_sales)
            ->get()->row_array();
        $return = [
            'karton' => (int)($return['jumlah'] ?? 0),
            'renceng' => 0
        ];
        return $return;
    }

    public function api_getTerjual($id_sales): array
    {
        $return = $this->db
            ->select_sum('a.jumlah_karton')
            ->select_sum('a.jumlah_renceng')
            ->from('warung_sales_penjualan a')
            ->join('stok_keluar b', 'b.id = a.id_stok_keluar')
            ->where('b.status', 1)
            ->where('b.id_sales', $id_sales)
            ->get()->row_array();
        $return = [
            'karton' => (int)($return['jumlah_karton'] ?? 0),
            'renceng' => (int)($return['jumlah_renceng'] ?? 0),
        ];
        return $return;
    }

    public function api_sisaPenjualan($stok, $terjual): array
    {
        $total_stok_renceng = $stok['karton'] * 12;
        $total_terjual_renceng = ($terjual['karton'] * 12) + $terjual['renceng'];
        $sisa_renceng = $total_stok_renceng - $total_terjual_renceng;
        $karton = floor($sisa_renceng / 12);
        $renceng = $sisa_renceng % 12;
        $return = [
            'karton' => $karton,
            'renceng' => $renceng
        ];
        return $return;
    }

    public function api_warung($id_sales, $id = null, $cari = null): ?array
    {
        $this->db->select("a.id,
            CONCAT(a.nama_pemilik, ' ', '[', a.kode, ']') as nama,
            a.alamat");
        $this->db->from('warung a');
        $this->db->where('a.id_sales', $id_sales);
        if ($cari != null) {
            $this->db->where("(
            a.kode LIKE '%$cari%' or
            a.nama_pemilik LIKE '%$cari%' or
            a.alamat LIKE '%$cari%' or
            a.no_hp LIKE '%$cari%' or
            a.patokan LIKE '%$cari%'
            )");
        }
        $this->db->limit(20);

        if ($id == null) {
            $db = $this->db->get();
            $length = $db->num_rows();
            $return = $db->result_array();
        } else {
            $this->db->where('a.id', $id);
            $db = $this->db->get();
            $length = $db->num_rows();
            $return = $db->row_array();
        }

        if ($return != null) {
            $stok_keluar = $this->db->select('id as id_stok_keluar')
                ->from('stok_keluar')
                ->where('status', 1)
                ->limit(1)
                ->get()
                ->row_array() ?? ['id_stok_keluar' => null];
            if ($id == null) {
                $rows = [];
                foreach ($return as $row) {
                    $rows[] = array_merge($row, [
                        'id_sales' => $id_sales,
                        'id_stok_keluar' => $stok_keluar['id_stok_keluar'],
                    ]);
                }
                $return = $rows;
            } else {
                $return = array_merge($return, [
                    'id_sales' => $id_sales,
                    'id_stok_keluar' => $stok_keluar['id_stok_keluar'],
                ]);
            }
        }

        $return = ['data' => $return, 'length' => $length];
        return $return;
    }

    public function api_listSatuanHarga($id, $cari): ?array
    {
        $this->db->select('id, nama as text, harga, qty, id_produk');
        $this->db->from('satuan_harga');
        $this->db->where('status', 1);
        if ($id != null) {
            $this->db->where('id', $id);
        }

        if ($cari != null) {
            $this->db->where("(
            id LIKE '%$cari%' or
            nama LIKE '%$cari%' or
            harga LIKE '%$cari%' or
            qty LIKE '%$cari%'
            )");
        }

        $result = $this->db->get();
        $length = $result->num_rows();
        $data = $result->result_array();
        $return = ['data' => $data, 'length' => $length];
        return $return;
    }

    public function api_listProduk($id, $cari): ?array
    {
        $this->db->select('id, nama as text');
        $this->db->from('produk');
        $this->db->where('status', 1);
        if ($id != null) {
            $this->db->where('id', $id);
        }

        if ($cari != null) {
            $this->db->where("(
            id LIKE '%$cari%' or
            nama LIKE '%$cari%'
            )");
        }

        $result = $this->db->get();
        $length = $result->num_rows();
        $data = $result->result_array();
        $return = ['data' => $data, 'length' => $length];
        return $return;
    }


    public function api_insertSalesPenjualan(
        $id_stok_keluar,
        $qty,
        $id_produk,
        $id_satuan_harga,
        $id_warung,
        $harga,
        $total_harga,
        $dibayar,
        $sisa,
        $status,
        $id_sales
    ) {
        $karton = floor($qty / 12);
        $renceng = $qty % 12;
        $data = [
            'id_stok_keluar' => $id_stok_keluar,
            'id_produk' => $id_produk,
            'id_satuan_harga' => $id_satuan_harga,
            'id_warung' => $id_warung,
            'harga' => $harga,
            'total_harga' => $total_harga,
            'dibayar' => $dibayar,
            'sisa' => $sisa,
            'status' => $status,
            'jumlah_karton' => $karton,
            'jumlah_renceng' => $renceng,
            'id_sales' => $id_sales,
        ];
        $this->db->insert('warung_sales_penjualan', $data);
        $return = $this->db->insert_id();
        return $return;
    }

    public function api_warung_detail($id_sales, $id = null): ?array
    {
        $this->db->select("a.kode, a.nama_pemilik, a.nama_warung, a.alamat");
        $this->db->from('warung a');
        $this->db->where('a.id_sales', $id_sales);

        if ($id == null) {
            $db = $this->db->get();
            $length = $db->num_rows();
            $return = $db->result_array();
        } else {
            $this->db->where('a.id', $id);
            $db = $this->db->get();
            $length = $db->num_rows();
            $return = $db->row_array();
        }


        $return = ['data' => $return, 'length' => $length];
        return $return;
    }

    public function getCalon($id)
    {
        $result = $this->db->select("a.*,
                (select count(*) from kpu_pemilihan as z where z.id_pemilih = '$id' and z.id_calon = a.id) as pilih,
                (select created_at from kpu_pemilihan as z where z.id_pemilih = '$id' and z.id_calon = a.id) as dipilih_waktu,
                (select count(*) from kpu_pemilihan as z where z.id_pemilih = '$id') as status_pilih")
            ->from('kpu_calon a')
            ->where('status', 1)->get()->result();
        return $result;
    }

    public function pilihSimpan($id_pemilih, $id_calon)
    {
        return $this->db->insert('kpu_pemilihan', [
            'id_pemilih' => $id_pemilih,
            'id_calon' => $id_calon,
        ]);
    }













    public function jumlahCalonKetua(): int
    {
        $get = $this->db->select('count(*) as total')->from('kpu_calon')->where('status', 1)->get()->row_array();
        return $get['total'] == null ? 0 : $get['total'];
    }

    public function jumlahPemilih(): int
    {
        $get = $this->db->select('count(*) as total')->from('kpu_pemilih')->where('status', 1)->get()->row_array();
        return $get['total'] == null ? 0 : $get['total'];
    }

    public function jumlahsudahPilih(): int
    {
        $get = $this->db->select('count(*) as total')->from('kpu_pemilihan a')->join('kpu_pemilih b', 'a.id_pemilih = b.id')->where('b.status', 1)->get()->row_array();
        return $get['total'] == null ? 0 : $get['total'];
    }
}
