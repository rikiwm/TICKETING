<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_v extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('model_kode');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$kode = $this->model_kode->get_kodjadwal();
		$kapal = $this->admin_model->getkapal();
		$tujuan = $this->admin_model->gettujuan();
		$kelas = $this->admin_model->getkelas();

		$jadwal = $this->admin_model->jadwal();
		$data = array(
			'title' 	=> 'Data Jadwal',
			'jadwal'	=> $jadwal,
			'kode'		=> $kode,
			'kapal'		=> $kapal,
			'kelas'		=> $kelas,
			'tujuan'	=> $tujuan,
			'isi' 	=> 'admin/jadwal/list_v');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}