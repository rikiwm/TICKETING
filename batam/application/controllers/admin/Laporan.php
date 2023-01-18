<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('model_kode');
		$this->load->model('order_model');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$laporan = $this->admin_model->laporan();
		$data = array(
			'title' 	=> 'Data Jadwal',
			'laporan'	=> $laporan,
			'isi' 		=> 'admin/laporan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	function cetak_lap(){
		$bulan 	= $this->input->post('bulan');
		$tahun 	= $this->input->post('tahun');
		
        $query = $this->order_model->cetak_lap($bulan, $tahun);
        $dana = $this->order_model->total($bulan,$tahun);
        $jumlah = $this->order_model->jumlah_data($bulan,$tahun);
	        $data = array(
	            'bulan'		=> $bulan,
	            'tahun'		=> $tahun,
	            'tampil'	=> $query,
	            'dana'		=> $dana,
	            'jumlah'	=> $jumlah
	        );
	    $this->load->view('admin/laporan/cetak',$data);
	}
}