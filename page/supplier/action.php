<?php
	include '../../conn/conn.php';
	$telepon = $_POST['telepon'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$id = $_POST['id'];
	if ($_POST['aksi'] == "add") {
		$add = mysqli_query($conn,"INSERT INTO tbl_supplier values('$id','$nama','$alamat','$telepon')");
		if ($add > 0) {
			header("location:../../index.php?page=supplier");
		}else{
			echo "Gagal Memasukan Data / Terjadi Kesamaan ID konsumen";
		}
	}else if($_POST['aksi'] == "edit"){
		$edit = mysqli_query($conn,"UPDATE tbl_supplier set nama='$nama',alamat='$alamat',telepon='$telepon' where id = '$id'");
		if ($edit > 0) {
			header("location:../../index.php?page=supplier");
		}
	}else if($_GET['aksi'] == "del"){
		$id = $_GET['id'];
		$del = mysqli_query($conn,"DELETE FROM tbl_supplier where id='$id'");
		if ($del > 0) {
			header("location:../../index.php?page=supplier");
		}
	}else{
		echo "ERROR";
	}
?>