<?php
if (!isset($_SESSION)) {session_start();}
include 'conn.php';
	$username = $_SESSION['username'];
	$q = mysqli_query($conn,"SELECT * from tbl_akun where username = '".$username."'");
	$data = mysqli_fetch_array($q);
	$username = $data['username'];
	$status = $data['status'];
	$nama = $data['nama'];
	$alamat = $data['alamat'];
?>