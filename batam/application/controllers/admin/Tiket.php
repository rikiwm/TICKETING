<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('order_model');
		$this->load->model('model_kode');
		$this->load->model('admin_model');


		$this->simple_login->cek_login();
		$this->load->library('Ciqrcode');
		$this->load->library('Zend');
	}

	public function index()
	{
		$tiket = $this->order_model->tiket();

		$data = array(
			'title' 	=> 'Data Tiket',
			'tiket'		=> $tiket,
			'isi' 		=> 'admin/tiket/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function view($kd_tiket){
		$this->load->library('mypdf');	
		$tiket 	= $this->order_model->detail_tiket($kd_tiket);
		$data = array(
			'title' 	=> 'E-Tiket',
			'tiket'		=> $tiket,
			'isi' 		=> 'admin/pemesanan/tiket');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// $this->mypdf->generate('tiket/view/dompdf', $data, 'E-Ticket', 'A4', 'lanscape');
	}

	public function QRcode($kd_tiket){
		QRcode::png(
			$kd_tiket,
			$outfile 	= false,
			$level 		= QR_ECLEVEL_H,
			$size 		= 6,
			$margin 	= 2
		);
	}

	public function BARcode($kd_tiket){
		$this->zend->load("Zend/Barcode");
		Zend_Barcode::render('code128', 'image', array('text' => $kd_tiket));
	}


}