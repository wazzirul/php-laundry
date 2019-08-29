<?php
	include '../../conn/conn.php';
	if ($_POST['aksi'] == "add") {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$status = $_POST['status'];
		$add = mysqli_query($conn,"INSERT INTO tbl_akun values(default,'$username','".md5($password)."','$nama','$alamat','$status')");
		if ($add > 0) {
			header("location:../../index.php?page=akun");
		}
	}else if($_POST['aksi'] == "edit"){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$status = $_POST['status'];
	$id = $_POST['id'];
		$edit = mysqli_query($conn,"UPDATE tbl_akun set nama='$nama',alamat='$alamat',username='$username',status='$status',
			password='".md5($password)."' where id = $id");
		if ($edit > 0) {
			header("location:../../index.php?page=akun");
		}
	}else if($_GET['aksi'] == "del"){
		$id = $_GET['id'];
		$del = mysqli_query($conn,"DELETE FROM tbl_akun where id=$id");
		if ($del > 0) {
			header("location:../../index.php?page=akun");
		}
	}else{
		echo "ERROR";
	}
?>