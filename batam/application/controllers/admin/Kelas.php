<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('model_kode');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$kode = $this->model_kode->get_kodekelas();
		$kelas = $this->admin_model->kelas();
		$data = array(
			'title' => 'Data kelas',
			'kelas'	=> $kelas,
			'kode' 	=> $kode,
			'isi' 	=> 'admin/kelas/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah user
	public function tambah()
	{
		$kode = $this->model_kode->get_kodekelas();
		$i = $this->input;
		$data = array(	
				'kd_kelas'		=> $kode,
				'nama_kelas'	=> $i->post('nama_kelas'),
				'kelas_harga'	=> $i->post('kelas_harga')
			);
		$this->admin_model->tambah_kelas($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/kelas'), 'refresh');
	}

	//edit user
	public function edit($kd_kelas)
	{
		$kelas = $this->admin_model->detail_kelas($kd_kelas);
		
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('kelas_harga', 'Harga Kelas', 'required',
				array(	'required'			=> '%s harus diisi')
			);
		if($valid->run()===FALSE){
			$data = array(
				'title'	=> 'Edit Kelas',
				'kelas'	=> $kelas,
				'isi' 	=> 'admin/kelas/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(
				'kd_kelas'		=> $kd_kelas,
				'nama_kelas'	=> $i->post('nama_kelas'),
				'kelas_harga'	=> $i->post('kelas_harga')
			);
			$this->admin_model->edit_kelas($data);
			$this->session->set_flashdata('sukses', 'data telah diubah');
			redirect(base_url('admin/kelas'), 'refresh');
		}
	}

	public function delete($kd_kelas){
		$data = array('kd_kelas' => $kd_kelas);
		$this->admin_model->delete_kelas($data);
		$this->session->set_flashdata('Sukses', 'Data telah dihapus');
		redirect(base_url('admin/kelas'), 'refresh');
	}
}