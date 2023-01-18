<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {


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
			'isi' 	=> 'admin/jadwal/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah user
	public function tambah()
	{
    		$i = $this->input;
			$kode = $this->model_kode->get_kodjadwal();
			$data = array(	
				'kd_jadwal'		=> $kode,
				'kode_kapal'	=> $i->post('kd_kapal'),
				'kode_kelas'	=> $i->post('kode_kelas'),
				'kode_tujuan'	=> $i->post('kode_tujuan'),
				'harga_dewasa'	=> $i->post('harga_dewasa'),
				'harga_anak'	=> $i->post('harga_anak'),
				'jam_berangkat'	=> $i->post('jam_berangkat'),
				'tgl_berangkat'	=> $i->post('tgl_berangkat'),
				'jml_kursi'		=> $i->post('jml_kursi'),
				'jml_kursi_pesan'=> $i->post('jml_kursi')
			);
			$this->admin_model->tambah_jadwal($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/jadwal'), 'refresh');
	}
	//edit user
	public function edit($kd_jadwal)
	{
		$jadwal = $this->admin_model->detail_jadwal($kd_jadwal);

		$tujuan = $this->admin_model->tujuan();
		$kapal = $this->admin_model->kapal();
		$kelas = $this->admin_model->kelas();
		
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('harga_anak', 'Harga Anak-Anak', 'required',
				array('required'		=>'%s harus diisi')
			);
		$valid->set_rules('harga_dewasa', 'Harga Dewasa', 'required',
				array(	'required'		=>'%s harus diisi')
			);
		if($valid->run()===FALSE){
			$data = array(
				'title' 	=> 'Edit Jadwal',
				'jadwal'	=> $jadwal,
				'kapal'		=> $kapal,
				'kelas'		=> $kelas,
				'tujuan' 	=> $tujuan,
				'isi' 		=> 'admin/jadwal/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			$i = $this->input;
			$data = array(
				'kd_jadwal'		=> $kd_jadwal,
				'harga_anak'	=> $i->post('harga_anak'),
				'harga_dewasa'	=> $i->post('harga_dewasa'),
				'kode_kapal'	=> $i->post('kd_kapal'),
				'kode_tujuan'	=> $i->post('kode_tujuan'),
				'kode_kelas'	=> $i->post('kode_kelas'),
				'jam_berangkat'	=> $i->post('jam_berangkat'),
				'tgl_berangkat'	=> $i->post('tgl_berangkat'),
				'jml_kursi'		=> $i->post('jml_kursi'),
				'jml_kursi_pesan'=> $i->post('jml_kursi')

			);
			$this->admin_model->edit_jadwal($data);
			$this->session->set_flashdata('sukses', 'data telah diubah');
			redirect(base_url('admin/jadwal'), 'refresh');
		}
	}

	public function delete($kd_jadwal){
		$data = array('kd_jadwal' => $kd_jadwal);
		$this->admin_model->delete_jadwal($data);
		$this->session->set_flashdata('Sukses', 'Data telah dihapus');
		redirect(base_url('admin/jadwal'), 'refresh');
	}
}