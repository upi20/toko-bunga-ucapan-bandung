<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LupaPassword extends Render_Controller
{

    public function index()
    {
        $this->default_template = 'templates/lupa-password';
        $this->content = 'lupa-password';
        $this->render();
    }

    public function sendEmail()
    {
        $email = $this->input->post('email');
        $clean = $this->security->xss_clean($email);
        $userInfo = $this->login->getUserInfoByEmail($clean);

        if ($userInfo == null) {
            $this->output_json([
                'status' => false,
                'message' => 'Maaf Email yang anda masukan tidak terdaftar'
            ], 400);
            return;
        }

        $token = $this->login->insertToken($userInfo->user_id);
        $qstring = $this->base64url_encode($token);
        $url = base_url() . 'lupaPassword/reset_password?t=' . $qstring;
        $content = '<p>Untuk me-reset password silahkan <a href="' . $url . '">klik disini</a></p><br>Token berlaku selama satu hari, sampai jam 24:00 hari ini';

        // debug
        if ($this->debug) {
            $this->output_json([
                'url' => $url
            ]);
            return;
        }

        // production
        $this->send_email($email, $content, 'Reset Password');
        $this->output_json(true);
    }

    public function reset_password()
    {
        $this->default_template = 'templates/reset-password';
        $token = $this->input->get('t');
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->login->isTokenValid($this->base64url_decode($cleanToken)); //either false or array();
        if (!$user_info) {
            $this->session->set_flashdata('message', 'Token tidak valid atau kadaluarsa');
            redirect(base_url('login'), 'refresh');
        }
        $this->data['id'] = $user_info->user_id;
        $this->data['nama'] = $user_info->user_nama;
        $this->data['email'] = $user_info->user_email;
        $this->data['token'] = $this->base64url_encode($token);
        $this->content = 'reset-password';
        $this->render();
    }

    public function save_password()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $cleanPost = $this->security->xss_clean($password);
        $update = $this->login->updatePassword($id, $cleanPost);
        if ($update) {
            $this->output_json(['status' => 0]);
            $this->login->removeToken($id);
        }
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('loginModel', 'login');
        $this->load->library('plugin');
        $this->load->helper('url');
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */