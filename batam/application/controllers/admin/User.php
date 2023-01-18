<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('model_kode');

		$this->simple_login->cek_login();
	}

	public function index()
	{

		$user = $this->admin_model->listing();
		$data = array('title' => 'Data Pengguna',
						'user'=> $user,
						'isi' => 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah user
	public function tambah()
	{
		//validasi input
		$kode = $this->model_kode->get_kodadm();

		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama Lengkap', 'required',
				array('required'		=>'%s harus diisi')
			);
		$valid->set_rules('email_admin', 'Email', 'required',
				array(	'required'		=>'%s harus diisi')
			);
		$valid->set_rules('username', 'Username', 'required|valid_username|is_unique[tbl_admin.username]',
				array(	'required'			=> '%s harus diisi', 
						'valid_username'	=> '%s tidak valid',
						'is_unique'			=> '%s sudah ada, Buat username baru')
			);
		$valid->set_rules('password', 'Password', 'required',
				array('required'		=>'%s harus diisi')
			);

		if($valid->run()===FALSE){
			$data = array(
				'title' => 'Tambah Pengguna',
				'kode'	=> $kode,
				'isi' 	=> 'admin/user/tambah');
			$this->load->view('admin/layout/wrapper', $data, FALSE);	
    	}else{
    		$i = $this->input;
			$kode = $this->model_kode->get_kodadm();
			$data = array(	
				'kd_admin'		=> $kode,
				'nama_admin'	=> $i->post('nama_admin'),
				'email_admin'	=> $i->post('email_admin'),
				'username'		=> $i->post('username'),
				'password'		=> SHA1($i->post('password')),
				'level_admin'	=> $i->post('level_admin'),
				'tanggal_buat'  => date('Y-m-d')
			);
			$this->admin_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'), 'refresh');
		}
	}
	//edit user
	public function edit($kd_admin)
	{
		$user = $this->admin_model->detail($kd_admin);

		$valid = $this->form_validation;
		$valid->set_rules('nama_admin', 'Nama Lengkap', 'required',
				array('required'		=>'%s harus diisi')
			);
		$valid->set_rules('email_admin', 'Email', 'required',
				array(	'required'		=>'%s harus diisi')
			);
		$valid->set_rules('password', 'Password', 'required',
				array('required'		=>'%s harus diisi')
			);

    	if($valid->run()===FALSE){
			$data = array(
				'title' 	=> 'Edit Pengguna',
				'user'		=> $user,
				'isi' 		=> 'admin/user/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
	  		$i = $this->input;
			$data = array(
				'kd_admin'		=> $kd_admin,
				'nama_admin'	=> $i->post('nama_admin'),
				'email_admin'	=> $i->post('email_admin'),
				'username'		=> $i->post('username'),
				'password'		=> SHA1($i->post('password')),
				'level_admin'	=> $i->post('level_admin')
			);
			$this->admin_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diubah');
			redirect(base_url('admin/user'), 'refresh');
		}
	}

	public function delete($kd_admin){
		$data = array('kd_admin' => $kd_admin);
		$this->admin_model->delete($data);
		$this->session->set_flashdata('Sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'), 'refresh');
	}
}