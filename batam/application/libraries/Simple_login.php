<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('admin_model');
	}

	public function login($username,$password)
	{
		$check = $this->CI->admin_model->login($username,$password);

		if($check){
			$kd_admin		= $check->kd_admin;
			$nama_admin		= $check->nama_admin;
			$email_admin	= $check->email_admin;
			$level_admin	= $check->level_admin;
			$tanggal_buat	= $check->tanggal_buat;
			$username 		= $check->username;

			$this->CI->session->set_userdata('kd_admin', $kd_admin);
			$this->CI->session->set_userdata('nama_admin', $nama_admin);
			$this->CI->session->set_userdata('email_admin', $email_admin);
			$this->CI->session->set_userdata('level_admin', $level_admin);
			$this->CI->session->set_userdata('tanggal_buat', $tanggal_buat);
			$this->CI->session->set_userdata('username', $username);

			$this->CI->session->set_flashdata('sukses', 'Anda berhasl login');
			redirect(base_url('admin/dasboard'), 'refresh');
		}else{
			$this->CI->session->set_flashdata('warning', 'Username atau Password salah');
			redirect(base_url('login'), 'refresh');
		}
	}

	public function cek_login()
	{
		if($this->CI->session->userdata('username') == ""){
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('login'), 'refresh');
		}
	}

	public function logout()
	{
		$this->CI->session->unset_userdata('kd_admin');
		$this->CI->session->unset_userdata('nama_admin');
		$this->CI->session->unset_userdata('email_admin');
		$this->CI->session->unset_userdata('level_admin');
		$this->CI->session->unset_userdata('tanggal_buat');

		$this->CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
		redirect(base_url('login'), 'refresh');
	}
}

?>