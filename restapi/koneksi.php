<?php 
	include 'config.php';
	
	$konek = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) ;
	if ($konek->connect_error) {
		die("Connection failed: " . $konek->connect_error);
	}
	date_default_timezone_set("Asia/Kolkata");
	mysqli_set_charset($konek, "utf8");
	?>