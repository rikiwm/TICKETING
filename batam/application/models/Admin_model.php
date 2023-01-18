<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//user admin
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->order_by('kd_admin', 'asc');

		$query = $this->db->get();
		return $query->result();
	}
	public function tambah($data){
		$this->db->insert('tbl_admin', $data);
	}
	public function detail($kd_admin)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('kd_admin', $kd_admin);
		$this->db->order_by('kd_admin', 'asc');

		$query = $this->db->get();
		return $query->row();
	}
	public function edit($data){
		$this->db->where('kd_admin', $data['kd_admin']);
		$this->db->update('tbl_admin', $data);
	}

	public function delete($data){
		$this->db->where('kd_admin', $data['kd_admin']);
		$this->db->delete('tbl_admin', $data);
	}
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where(array('username'	=> $username,
								'password'	=> SHA1($password)));
		$this->db->order_by('kd_admin', 'asc');

		$query = $this->db->get();
		return $query->row();
	}

	

	//kapal
	public function kapal()
	{
		$this->db->select('*');
		$this->db->from('tbl_kapal');
		$this->db->order_by('kd_kapal', 'asc');

		$query = $this->db->get();
		return $query->result();
	}
	public function getkapal()
	{
		$this->db->select('*');
		$this->db->from('tbl_kapal');
		$this->db->order_by('kd_kapal', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function detail_kapal($kd_kapal)
	{
		$this->db->select('*');
		$this->db->from('tbl_kapal');
		$this->db->join('tbl_jadwal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal');
		$this->db->join('tbl_jadwal', 'tbl_tujuan.kd_tujuan = tbl_jadwal.kode_tujuan');
		$this->db->where('kd_kapal', $kd_kapal);
		$this->db->order_by('kd_kapal', 'asc');

		$query = $this->db->get();
		return $query->row();
	}
	public function tambah_kapal($data){
		$this->db->insert('tbl_kapal', $data);
	}
	public function edit_kapal($data){
		$this->db->where('kd_kapal', $data['kd_kapal']);
		$this->db->update('tbl_kapal', $data);
	}
	public function delete_kapal($data){
		$this->db->where('kd_kapal', $data['kd_kapal']);
		$this->db->delete('tbl_kapal', $data);
	}


	//tujuan
	public function tujuan()
	{
		$this->db->select('*');
		$this->db->from('tbl_tujuan');
		$this->db->order_by('kd_tujuan', 'asc');

		$query = $this->db->get();
		return $query->result();
	}
	public function gettujuan()
	{
		$this->db->select('*');
		$this->db->from('tbl_tujuan');
		$this->db->order_by('kd_tujuan', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function jointujuan()
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal');
		$this->db->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal');
		$this->db->join('tbl_tujuan', 'tbl_tujuan.kd_tujuan = tbl_jadwal.kode_tujuan');
		$this->db->join('tbl_kelas', 'tbl_kelas.kd_kelas = tbl_jadwal.kode_kelas');
		$this->db->order_by('kd_jadwal', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function detail_tujuan($kd_tujuan)
	{
		$this->db->select('*');
		$this->db->from('tbl_tujuan');
		$this->db->where('kd_tujuan', $kd_tujuan);
		$this->db->order_by('kd_tujuan', 'asc');

		$query = $this->db->get();
		return $query->row();
	}
	public function tambah_tujuan($data){
		$this->db->insert('tbl_tujuan', $data);
	}
	public function delete_tujuan($data){
		$this->db->where('kd_tujuan', $data['kd_tujuan']);
		$this->db->delete('tbl_tujuan', $data);
	}
	public function edit_tujuan($data){
		$this->db->where('kd_tujuan', $data['kd_tujuan']);
		$this->db->update('tbl_tujuan', $data);
	}

	
	//jadwal

	public function jadwal($id = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal')
				->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal')
				->join('tbl_tujuan', 'tbl_tujuan.kd_tujuan = tbl_jadwal.kode_tujuan')
				->join('tbl_kelas', 'tbl_kelas.kd_kelas = tbl_jadwal.kode_kelas')
				->where('jml_kursi > 0');
				// ->where(DATE('tgl_berangkat'));

		if($id != null){
			$this->db->where('kd_jadwal', $id);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function detail_jadwal($kd_jadwal)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal');
		$this->db->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal');
		$this->db->join('tbl_tujuan', 'tbl_tujuan.kd_tujuan = tbl_jadwal.kode_tujuan');
		$this->db->where('kd_jadwal', $kd_jadwal);
		$this->db->order_by('kd_jadwal', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah_jadwal($data){
		$this->db->insert('tbl_jadwal', $data);
	}
	public function delete_jadwal($data){
		$this->db->where('kd_jadwal', $data['kd_jadwal']);
		$this->db->delete('tbl_jadwal', $data);
	}
	public function edit_jadwal($data){
		$this->db->where('kd_jadwal', $data['kd_jadwal']);
		$this->db->update('tbl_jadwal', $data);
	}

	//kelas
	public function kelas()
	{
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$this->db->order_by('kd_kelas', 'asc');

		$query = $this->db->get();
		return $query->result();
	}
	public function getkelas()
	{
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$this->db->order_by('kd_kelas', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function detail_kelas($kd_kelas)
	{
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$this->db->where('kd_kelas', $kd_kelas);
		$this->db->order_by('kd_kelas', 'asc');

		$query = $this->db->get();
		return $query->row();
	}
	public function tambah_kelas($data){
		$this->db->insert('tbl_kelas', $data);
	}
	public function edit_kelas($data){
		$this->db->where('kd_kelas', $data['kd_kelas']);
		$this->db->update('tbl_kelas', $data);
	}
	public function delete_kelas($data){
		$this->db->where('kd_kelas', $data['kd_kelas']);
		$this->db->delete('tbl_kelas', $data);
	}

	public function laporan(){
		
	}
}