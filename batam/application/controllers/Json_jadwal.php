<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_jadwal extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('model_kode');
	}

	public function index()
	{
		$jadwal = $this->admin_model->jadwal();
		$data = array(
			'jadwal'=> $jadwal);
		echo json_encode($data);
	}
}