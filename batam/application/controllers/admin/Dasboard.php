<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}

	//halaman utama admin
	public function index()
	{
		$data = array(
			'title' 	=> 'Dasboard',
			'isi'		=> 'admin/dasboard/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
}
