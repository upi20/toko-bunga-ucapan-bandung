<?php defined('BASEPATH') or exit('No direct script access allowed');

class Libs
{
    public function __construct()
    {
        //parent::__construct();
        $this->CI = &get_instance();
        $this->CI->load->helper(array('url', 'language'));

        date_default_timezone_set("Asia/Jakarta");
    }


    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    function rupiah_non($angka)
    {
        $hasil_rupiah = "" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    function ringgit_non($angka)
    {
        $hasil_rupiah = "" . number_format($angka, 0, ',', ',');
        return $hasil_rupiah;
    }

    function bycrypt($text)
    {
        $options = [
            'cost' => 8,
        ];
        return password_hash($text, PASSWORD_DEFAULT, $options);
    }

    function timestamp()
    {
        $time       = date("H:i:s");
        $date       = date("Y-m-d");
        return $date . " " . $time;
    }

    function format_tanggal($tanggal)
    {
        $time       = date("H:i:s");
        $date       = date("Y-m-d");
        return $date . " " . $time;
    }

    function set_config($name = null)
    {
        $this->config->set_item('app_title', $name);
        return true;
    }

    function breadcrumb($name_1 = null, $name_2 = null, $name_3 = null, $name_4 = null)
    {
    }

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }

    public function changeImageBaseUrl($current, $new, $text)
    {

        return str_replace('<img src="' . $current, '<img src="' . $new, $text);
    }
}
