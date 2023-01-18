<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kapal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('model_kode');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$kode = $this->model_kode->get_kodkapal();
		$kapal = $this->admin_model->kapal();
		$data = array(
			'title' => 'Data Kapal',
			'kapal'	=> $kapal,
			'kode' 	=> $kode,
			'isi' 	=> 'admin/kapal/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah user
	public function tambah()
	{
		$kode = $this->model_kode->get_kodkapal();
		
		$i = $this->input;
		$data = array(	
				'kd_kapal'		=> $kode,
				'nama_kapal'	=> $i->post('nama_kapal'),
			);
		$this->admin_model->tambah_kapal($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/kapal'), 'refresh');
	}

	//edit user
	public function edit($kd_kapal)
	{
		$kapal = $this->admin_model->detail_kapal($kd_kapal);
		
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama_kapal', 'Nama Kapal', 'required|is_unique[tbl_kapal.nama_kapal]',
				array(	'required'			=> '%s harus diisi',
						'is_unique'			=> '%s sudah ada, Buat Nama Kapal baru')
			);
		if($valid->run()===FALSE){
			$data = array(
				'title'	=> 'Edit Kapal',
				'kapal'	=> $kapal,
				'isi' 	=> 'admin/kapal/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(
				'kd_kapal'		=> $kd_kapal,
				'nama_kapal'	=> $i->post('nama_kapal')
			);
			$this->admin_model->edit_kapal($data);
			$this->session->set_flashdata('sukses', 'data telah diubah');
			redirect(base_url('admin/kapal'), 'refresh');
		}
	}

	public function delete($kd_kapal){
		$data = array('kd_kapal' => $kd_kapal);
		$this->admin_model->delete_kapal($data);
		$this->session->set_flashdata('Sukses', 'Data telah dihapus');
		redirect(base_url('admin/kapal'), 'refresh');
	}
}