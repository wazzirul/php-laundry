<?php
	include '../../conn/conn.php';
	$telepon = $_POST['telepon'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nik = $_POST['nik'];
	$jk = $_POST['jk'];
	if ($_POST['aksi'] == "add") {
		$add = mysqli_query($conn,"INSERT INTO tbl_karyawan values('$nik','$nama','$alamat','$telepon','$jk')");
		if ($add > 0) {
			header("location:../../index.php?page=karyawan");
		}else{
			echo "Gagal Memasukan Data / Terjadi Kesamaan NIK";
		}
	}else if($_POST['aksi'] == "edit"){
		$edit = mysqli_query($conn,"UPDATE tbl_karyawan set nama='$nama',alamat='$alamat',telepon='$telepon',jk='$jk' where nik = '$nik'");
		if ($edit > 0) {
			header("location:../../index.php?page=karyawan");
		}
	}else if($_GET['aksi'] == "del"){
		$id = $_GET['id'];
		$del = mysqli_query($conn,"DELETE FROM tbl_karyawan where nik='$nik'");
		if ($del > 0) {
			header("location:../../index.php?page=karyawan");
		}
	}else{
		echo "ERROR";
	}
?>