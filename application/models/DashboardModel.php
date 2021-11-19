<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends Render_Model
{
    public function getSumProduct()
    {
        $return = $this->db->select('count(*) as jumlah')->from('products')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
    public function getSumCategory()
    {
        $return = $this->db->select('count(*) as jumlah')->from('product_categories')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
    public function getSumColor()
    {
        $return = $this->db->select('count(*) as jumlah')->from('product_colors')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
    public function getSumREveiw()
    {
        $return = $this->db->select('count(*) as jumlah')->from('product_reviews')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
    public function getSumImages()
    {
        $return = $this->db->select('count(*) as jumlah')->from('product_images')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
    public function getSumWhatsapp()
    {
        $return = $this->db->select('count(*) as jumlah')->from('whatsapp')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
    public function getSumSlider()
    {
        $return = $this->db->select('count(*) as jumlah')->from('home_slider')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
    public function getSumTestimoni()
    {
        $return = $this->db->select('count(*) as jumlah')->from('home_testimonials')->where('status <>', 3)->get()->row_array();
        $return = is_null($return) ? 0 : $return['jumlah'];
        return $return;
    }
}
