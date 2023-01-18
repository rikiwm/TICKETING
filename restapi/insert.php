<?php 
 require_once 'koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
	$kode_jadwal = $_POST['kode_jadwal'];
	$nama_order = $_POST['nama_order'];
	$umur = $_POST['umur'];
	$no_hp = $_POST['no_hp'];
 	$tgl_berangkat = $_POST['tgl_berangkat'];
 	// $tgl_pesan = $_POST['tgl_pesan'];

 	$query = "INSERT INTO tbl_order (kode_jadwal, nama_order, umur,no_hp,tgl_berangkat,) VALUES 
	 ('$kode_jadwal','$nama_order','$umur','$no_hp','$tgl_berangkat')";

 	$exeQuery = mysqli_query($konek, $query); 

	 echo ($exeQuery) ? json_encode(array('kode' =>1, 'pesan' => 'berhasil menambahkan data')) : 
	  json_encode(array('kode' =>2, 'pesan' => 'data gagal ditambahkan'));
 }
 else
 {
 	 echo json_encode(array('kode' =>101, 'pesan' => 'request tidak valid'));
 }

 ?>