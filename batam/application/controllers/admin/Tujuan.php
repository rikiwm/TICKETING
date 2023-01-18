<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tujuan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('model_kode');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$kode = $this->model_kode->get_kodtujuan();
		$tujuan = $this->admin_model->tujuan();
		$data = array('title' => 'Data Tujuan',
						'tujuan'=> $tujuan,
						'kode'=> $kode,
						'isi' => 'admin/tujuan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah user
	public function tambah()
	{
		$kode = $this->model_kode->get_kodtujuan();
		
		$i = $this->input;
		$data = array(	
				'kd_tujuan'			=> $kode,
				'nama_pelabuhan'	=> $i->post('nama_pelabuhan'),
				'kota_tujuan'		=> $i->post('kota_tujuan')
			);
			$this->admin_model->tambah_tujuan($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/tujuan'), 'refresh');
	}
	//edit user
	public function edit($kd_tujuan)
	{
		$tujuan = $this->admin_model->detail_tujuan($kd_tujuan);
		
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('kota_tujuan', 'Kota Tujuan', 'required',
				array(	'required'			=> '%s harus diisi'));

		$valid->set_rules('nama_pelabuhan', 'Nama Pelabuhan', 'required',
				array(	'required'			=> '%s harus diisi'));

		if($valid->run()===FALSE){

		$data = array('title' => 'Edit Tujuan',
						'tujuan'=> $tujuan,
						'isi' => 'admin/tujuan/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}else{
		$i = $this->input;
		$data = array(	'kd_tujuan'			=> $kd_tujuan,
						'nama_pelabuhan'	=> $i->post('nama_pelabuhan'),
						'kota_tujuan'		=> $i->post('kota_tujuan')
					);
		$this->admin_model->edit_tujuan($data);
		$this->session->set_flashdata('sukses', 'data telah diubah');
		redirect(base_url('admin/tujuan'), 'refresh');

		}
	}

	public function delete($kd_tujuan){
		$data = array('kd_tujuan' => $kd_tujuan);
		$this->admin_model->delete_tujuan($data);
		$this->session->set_flashdata('Sukses', 'Data telah dihapus');
		redirect(base_url('admin/tujuan'), 'refresh');
	}
}