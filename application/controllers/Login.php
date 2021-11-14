<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends Render_Controller
{

	public function index()
	{
		$this->sesion->cek_login();
		$this->content = 'login_token';
		$this->render();
	}

	public function login_token()
	{
		$token = $this->input->post('token');
		$getPemilih = $this->db->select('*')->from('kpu_pemilih')->where('token', $token)->get()->row();
		if ($getPemilih == null) {
			$this->output_json(['status' => 0]);
			return;
		}

		$this->db->where('id', $getPemilih->id)->update('kpu_pemilih', ['last_login' => date("Y-m-d H:i:s")]);
		$session = array(
			'status' => true,
			'data'	 => array(
				'id' => $getPemilih->id,
				'nama' => $getPemilih->nama,
				'email' => '',
				'level' => 'Pemilih',
				'level_id' => '127',
			)
		);

		$this->session->set_userdata($session);

		$this->output_json(['status' => 1]);
	}


	// login admin
	public function doLogin()
	{
		$username 	= $this->input->post('email');
		$password 	= $this->input->post('password');

		// Cek login ke model
		$login 		= $this->login->cekLogin($username, $password);


		if ($login['status'] == 0) {
			// Set session value

			// email belum di verifikasi
			if ($login['data'][0]['user_email_status'] == 0) {
				$this->output_json(['status' => 5]);
			}
			// akun aktif
			else if ($login['data'][0]['user_status'] == 1) {
				$session = array(
					'status' => true,
					'data'	 => array(
						'id' => $login['data'][0]['user_id'],
						'nama' => $login['data'][0]['user_nama'],
						'email' => $login['data'][0]['user_email'],
						'level' => $login['data'][0]['lev_nama'],
						'level_id' => $login['data'][0]['lev_id'],
					)
				);

				$this->session->set_userdata($session);

				$this->output_json(['status' => 0]);
			}
			// akun di nonaktifkan
			else if ($login['data'][0]['user_status'] == 0) {
				$this->output_json(['status' => 3]);
			}
			// menunggu dikonfirmasi
			else if ($login['data'][0]['user_status'] == 2) {
				$this->output_json(['status' => 4]);
			}
			// erorr
			else {
				$this->output_json(['status' => 5]);
			}
		} else if ($login['status'] == 1) {
			$this->output_json(['status' => 1]);
		} else {
			$this->output_json(['status' => 2]);
		}
	}


	public function logout()
	{
		$session = array('status', 'data');

		$this->session->unset_userdata($session);

		redirect('admin/login', 'refresh');
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel', 'login');
		$this->default_template = 'templates/login_token';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */