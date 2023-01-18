<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('model_kode');
		$this->load->model('admin_model');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$order = $this->order_model->listing_bayar();
		$data = array(
			'title' 	=> 'Data Order',
			'order'		=> $order,
			'isi' 		=> 'admin/pembayaran/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function view($kd_order)
	{
		$this->load->library('Ciqrcode');

		$pesan = $this->order_model->detail($kd_order);
		$umur = $pesan->umur;

		if($umur > '12'){
			$harga 		= $pesan->harga_dewasa;
			$tipe_tiket = "Tiket Dewasa";
		}else{
			$harga 		= $pesan->harga_anak;
			$tipe_tiket = "Tiket Anak-Anak";
		}
		$total = $harga;

		$kd_tiket		= 'T'.$pesan->kd_order.$pesan->kd_jadwal.str_replace('-','',$pesan->tgl_berangkat);

		//validasi input
		$valid = $this->form_validation;
		if($valid->run()===FALSE){
			$data = array(
				'title' 	=> 'Bayar',
				'total'		=> $total,
				'kd_tiket'	=> $kd_tiket,
				'pesan'		=> $pesan,
				'isi' 		=> 'admin/pembayaran/view');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(
				'kd_order'		=> $kd_order
			);
			$this->order_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diubah');
			redirect(base_url('admin/pemesanan'), 'refresh');
		}
	}

	public function bayar($kd_order)
	{
		$pesan = $this->order_model->detail($kd_order);
		$umur = $pesan->umur;

		if($umur > '12'){
			$harga 		= $pesan->harga_dewasa;
			$tipe_tiket = "Tiket Dewasa";
		}else{
			$harga 		= $pesan->harga_anak;
			$tipe_tiket = "Tiket Anak-Anak";
		}
		$total = $harga;
		$kd_tiket		= 'T'.$pesan->kd_order.$pesan->kd_jadwal.str_replace('-','',$pesan->tgl_berangkat);

		$valid = $this->form_validation;

		$valid->set_rules('total_bayar', 'Total Bayar', 'required',
				array(	'required'			=> '%s harus diisi')
			);

		if($valid->run()===FALSE){
			$data = array(
				'title' 	=> 'Tiket',
				'total'		=> $total,
				'kd_tiket'	=> $kd_tiket,
				'pesan'		=> $pesan,
				'isi' 		=> 'admin/pembayaran/bayar');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(
				'kd_tiket'		=> $kd_tiket,
				'kode_order'	=> $i->post('kode_order'),
				'total_bayar'	=> $i->post('total_bayar')
			);
			$this->order_model->update_tiket($data);
			$this->session->set_flashdata('sukses', 'data telah diubah');
			redirect(base_url('admin/pembayaran/view_tiket/'.$kd_tiket), 'refresh');
		}
	}
	public function view_tiket($kd_tiket){
		$tiket = $this->order_model->detail_tiket($kd_tiket);
		$data = array(
			'title' 	=> 'E-Tiket',
			'tiket'		=> $tiket,
			'isi' 		=> 'admin/pembayaran/view_tiket');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}