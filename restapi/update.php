	<?php 
 require_once 'koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

	 $kd_order = $_POST['kd_oreder'];
	 $kode_jadwal = $_POST['kode_jadwal'];
	 $nama_order = $_POST['nama_order'];
	 $umur = $_POST['umur'];
	 $no_hp = $_POST['no_hp'];
	 $tgl_berangkat = $_POST['tgl_berangkat'];

 	$query = "UPDATE  tbl_order SET nama_order = '$nama_order',umur = '$umur', no_hp = '$no_hp' WHERE kd_order='$kd_order'";

 	$exeQuery = mysqli_query($konek, $query); 

 	echo ($exeQuery) ? json_encode(array('kode' =>1, 'pesan' => 'data berhasil update')) :  json_encode(array('kode' =>2, 'pesan' => 'data gagal diupdate'));
 }
 else
 {
 	 echo json_encode(array('kode' =>101, 'pesan' => 'request tidak valid'));
 }

 ?>