<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_jadwal', 'tbl_jadwal.kd_jadwal = tbl_order.kode_jadwal');
		$this->db->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal');
		$this->db->join('tbl_tujuan', 'tbl_jadwal.kode_tujuan = tbl_tujuan.kd_tujuan');
		$this->db->join('tbl_kelas', 'tbl_jadwal.kode_kelas = tbl_kelas.kd_kelas');
		$this->db->order_by('kd_order', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function listing_bayar()
	{
		$this->db->select('*');
		$this->db->from('tbl_order')
				->join('tbl_tiket', 'tbl_tiket.kode_order = tbl_order.kd_order')
				->join('tbl_jadwal', 'tbl_jadwal.kd_jadwal = tbl_order.kode_jadwal')
				->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal')
				->join('tbl_tujuan', 'tbl_jadwal.kode_tujuan = tbl_tujuan.kd_tujuan')
				->join('tbl_kelas', 'tbl_jadwal.kode_kelas = tbl_kelas.kd_kelas')
				->where('total_bayar = 0');
		$this->db->order_by('kd_order', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data){
		$this->db->insert('tbl_order', $data);
	}
	public function detail($kd_order)
	{
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_jadwal', 'tbl_jadwal.kd_jadwal = tbl_order.kode_jadwal');
		$this->db->join('tbl_tujuan', 'tbl_jadwal.kode_tujuan = tbl_tujuan.kd_tujuan');
		$this->db->join('tbl_kelas', 'tbl_jadwal.kode_kelas = tbl_kelas.kd_kelas');
		$this->db->where('kd_order', $kd_order);
		$this->db->order_by('kd_order', 'asc');

		$query = $this->db->get();
		return $query->row();
	}
	public function edit($data){
		$this->db->where('kd_order', $data['kd_order']);
		$this->db->update('tbl_order', $data);
	}
	public function delete($data){
		$this->db->where('kd_order', $data['kd_order']);
		$this->db->delete('tbl_order', $data);
	}

	public function insert_tiket($data){
		$this->db->insert('tbl_tiket', $data);
	}
	public function update_tiket($data){
		$this->db->where('kd_tiket', $data['kd_tiket']);
		$this->db->update('tbl_tiket', $data);
	}
	public function detail_tiket($kd_tiket)
	{
		$this->db->select('*');
		$this->db->from('tbl_tiket');
		$this->db->join('tbl_order', 'tbl_order.kd_order = tbl_tiket.kode_order');
		$this->db->join('tbl_jadwal', 'tbl_order.kode_jadwal = tbl_jadwal.kd_jadwal');
		$this->db->join('tbl_tujuan', 'tbl_jadwal.kode_tujuan = tbl_tujuan.kd_tujuan');
		$this->db->join('tbl_kelas', 'tbl_jadwal.kode_kelas = tbl_kelas.kd_kelas');
		$this->db->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal');

		$this->db->where('kd_tiket', $kd_tiket);
		$this->db->order_by('kd_tiket', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tiket()
	{
		$this->db->select('*');
		$this->db->from('tbl_tiket')
				->join('tbl_order', 'tbl_order.kd_order = tbl_tiket.kode_order')
				->join('tbl_jadwal', 'tbl_order.kode_jadwal = tbl_jadwal.kd_jadwal')
				->join('tbl_tujuan', 'tbl_jadwal.kode_tujuan = tbl_tujuan.kd_tujuan')
				->join('tbl_kelas', 'tbl_jadwal.kode_kelas = tbl_kelas.kd_kelas')
				->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal');

		$this->db->order_by('kd_tiket', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function cek($no_nik)
	{
		$this->db->select('*');
		$this->db->from('registrasi');
		$this->db->where(array('no_nik'	=> $no_nik));
		$query = $this->db->get();
		return $query->row();
	}

	public function get_all()
	{
		return $this->db->get('tbl_jadwal')->result();
	}

	public function get_date($tgl_berangkat)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal')
				->join('tbl_kapal', 'tbl_kapal.kd_kapal = tbl_jadwal.kode_kapal')
				->join('tbl_tujuan', 'tbl_tujuan.kd_tujuan = tbl_jadwal.kode_tujuan')
				->join('tbl_kelas', 'tbl_kelas.kd_kelas = tbl_jadwal.kode_kelas')
				->where('jml_kursi_pesan > 0');
		$this->db->where('tgl_berangkat', $tgl_berangkat);

		$query = $this->db->get();
		return $query->result();
	}

	public function cetak_lap($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_order')
				->join('tbl_tiket', 'tbl_order.kd_order = tbl_tiket.kode_order')
				->where('MONTH(tbl_order.tgl_berangkat)', $bulan)
				->where('YEAR(tbl_order.tgl_berangkat)', $tahun);

		$query = $this->db->get();
		return $query->result();
	}
	public function total($bulan, $tahun)
	{
		$sql = "SELECT sum(total_bayar) as bayar from tbl_tiket JOIN tbl_order on kd_order = kode_order WHERE MONTH(tgl_berangkat) = '$bulan' AND YEAR(tgl_berangkat) = '$tahun'";
		$result = $this->db->query($sql);
		return $result->row()->bayar;
	}

	public function jumlah_data($bulan, $tahun)
	{
		$sql = "SELECT COUNT(total_bayar) as bayar from tbl_tiket JOIN tbl_order on kd_order = kode_order WHERE MONTH(tgl_berangkat) = '$bulan' AND YEAR(tgl_berangkat) = '$tahun'";
		$result = $this->db->query($sql);
		return $result->row()->bayar;
	}
}