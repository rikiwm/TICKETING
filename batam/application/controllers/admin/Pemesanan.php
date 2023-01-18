<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('model_kode');
		$this->load->model('admin_model');

		$this->simple_login->cek_login();
		$this->load->library('Ciqrcode');
	}

	public function index()
	{
		$order = $this->order_model->listing();
		$data = array(
			'title' 	=> 'Data Order',
			'order'		=> $order,
			'isi' 		=> 'admin/pemesanan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function cari_jadwal(){
		$this->form_validation->set_rules('tgl_berangkat', 'Tanggal Berangkat', 'required',
            array('required' => '%s harus diisi'));

        if($this->form_validation->run())
        {
            $tgl_berangkat    = $this->input->post('tgl_berangkat');
            $check = $this->order_model->get_date($tgl_berangkat);
                if($check){
                    $this->session->set_flashdata('sukses', 'Jadwal tersedia, silahkan pilih data selanjutnya');
                    $data = array(
						'title' 	=> 'Data Jadwal',
						'check'		=> $check,			
						'isi' 		=> 'admin/pemesanan/cari_jadwal');
					$this->load->view('admin/layout/wrapper', $data, FALSE);
                }else{
                    $this->session->set_flashdata('warning', 'Jadwal kosong, silahkan pilih tanggal yang lain!');
                    redirect(base_url('admin/pemesanan/'), 'refresh');
                }
        }
	}

	public function pesan($kd_jadwal){
		$jadwal = $this->admin_model->detail_jadwal($kd_jadwal);
		$jml_kursi_pesan = $jadwal->jml_kursi_pesan;
		$kode 	= $this->model_kode->get_kodeOrder();
		
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama_order', 'Nama Pemesan', 'required',
				array('required'		=>'%s harus diisi')
			);
		$valid->set_rules('umur', 'Umur', 'required',
				array(	'required'		=>'%s harus diisi')
			);
		if($valid->run()===FALSE){
			$data = array(
				'title' 	=> 'Order',
				'jadwal'	=> $jadwal,
				'kode'		=> $kode,
				'isi' 		=> 'admin/pemesanan/pesan');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			$i = $this->input;
			$data = array(
				'kode_jadwal'	=> $kd_jadwal,
				'kd_order'		=> $kode,
				'nama_order'	=> $i->post('nama_order'),
				'umur'			=> $i->post('umur'),
				'no_hp'			=> $i->post('no_hp'),
				'tgl_pesan'		=> date('Y-m-d'),
				'tgl_berangkat'	=> $i->post('tgl_berangkat')
			);

			$tiket = array(
				'kd_jadwal'			=> $kd_jadwal,
				'jml_kursi_pesan' 	=> $jml_kursi_pesan - '1',
			);
			$this->admin_model->edit_jadwal($tiket);

			$this->order_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pemesanan/bayar/'.$kode),'refresh');
		}
	}


	public function tambah()
	{
		$kode 			= $this->model_kode->get_kodeOrder();
		$kd_jadwal 		= $this->model_kode->get_kodjadwal();
		$tujuan 		= $this->admin_model->jointujuan();

		$valid = $this->form_validation;
		$valid->set_rules('nama_order', 'Nama Order', 'required',
				array(	'required'			=> '%s harus diisi')
			);

		if($valid->run()===FALSE){
			$data = array(
				'title' 	=> 'Tiket',
				'kode'		=> $kode,
				'kd_jadwal'	=> $kd_jadwal,
				'tujuan'	=> $tujuan,
				'isi' 		=> 'admin/pemesanan/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
		$i = $this->input;
		$data = array(
			'kd_order'			=> $kode,
			'nama_order'		=> $i->post('nama_order'),
			'umur'				=> $i->post('umur'),
			'tgl_berangkat'		=> $i->post('tgl_berangkat'),
			'kode_tujuan_order'	=> $i->post('kode_tujuan_order'),
			'tgl_pesan'			=> date('Y-m-d'),
			'alamat_order'		=> $i->post('alamat_order'),
			'kota_order'		=> $i->post('kota_order'),
			'no_hp'				=> $i->post('no_hp')
		);
		$this->order_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/pemesanan/bayar/'.$kode),'refresh');
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
				'isi' 		=> 'admin/pemesanan/bayar');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(
				'kd_tiket'		=> $kd_tiket,
				'kode_order'	=> $i->post('kode_order'),
				'total_bayar'	=> $i->post('total_bayar')
			);
			$this->order_model->insert_tiket($data);
			$this->session->set_flashdata('sukses', 'data telah diubah');
			redirect(base_url('admin/pemesanan/view_tiket/'.$kd_tiket), 'refresh');
		}
	}
	public function view_tiket($kd_tiket){
		$tiket = $this->order_model->detail_tiket($kd_tiket);
		$data = array(
			'title' 	=> 'E-Tiket',
			'tiket'		=> $tiket,
			'isi' 		=> 'admin/pemesanan/tiket');
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
				'title' 	=> 'Edit Jadwal',
				'total'		=> $total,
				'kd_tiket'	=> $kd_tiket,
				'pesan'		=> $pesan,
				'isi' 		=> 'admin/pemesanan/view');
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

	public function delete($kd_order){
		$data = array('kd_order' => $kd_order);
		$this->order_model->delete($data);
		$this->session->set_flashdata('Sukses', 'Data telah dihapus');
		redirect(base_url('admin/pemesanan'), 'refresh');
	}
}