<?php
	include '../../conn/conn.php';
	$nama = $_POST['nama'];
	$id = $_POST['id'];
	if ($_POST['aksi'] == "add") {
		$add = mysqli_query($conn,"INSERT INTO tbl_jnspakaian values('$id','$nama')");
		if ($add > 0) {
			header("location:../../index.php?page=jenis-pakaian");
		}else{
			echo "Gagal Memasukan Data / Terjadi Kesamaan ID Jenis Pakaian";
		}
	}else if($_POST['aksi'] == "edit"){
		$edit = mysqli_query($conn,"UPDATE tbl_jnspakaian set jenis_pakaian='$nama' where id = '$id'");
		if ($edit > 0) {
			header("location:../../index.php?page=jenis-pakaian");
		}
	}else if($_GET['aksi'] == "del"){
		$id = $_GET['id'];
		$del = mysqli_query($conn,"DELETE FROM tbl_jnspakaian where id='$id'");
		if ($del > 0) {
			header("location:../../index.php?page=jenis-pakaian");
		}
	}else{
		echo "ERROR";
	}
?>