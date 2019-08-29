<?php
	include '../../conn/conn.php';
	$telepon = $_POST['telepon'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$id = $_POST['id'];
	if ($_POST['aksi'] == "add") {
		$add = mysqli_query($conn,"INSERT INTO tbl_konsumen values('$id','$nama','$alamat','$telepon')");
		if ($add > 0) {
			header("location:../../index.php?page=konsumen");
		}else{
		?>
		<script type="text/javascript">
			alert("Gagal Memasukan Data / Terjadi Kesamaan ID");
			window.location = "../../index.php?page=konsumen";
		</script>
		<?php
		}
	}else if ($_POST['aksi'] == "add-keranjang") {
		$add = mysqli_query($conn,"INSERT INTO tbl_konsumen values('$id','$nama','$alamat','$telepon')");
		if ($add > 0) {
			header("location:../../index.php?page=set-keranjang");
		}else{
		?>
		<script type="text/javascript">
			alert("Gagal Memasukan Data / Terjadi Kesamaan ID");
			window.location = "../../index.php?page=set-keranjang";
		</script>
		<?php
		}
	}else if($_POST['aksi'] == "edit"){
		$edit = mysqli_query($conn,"UPDATE tbl_konsumen set nama='$nama',alamat='$alamat',telepon='$telepon' where id = '$id'");
		if ($edit > 0) {
			header("location:../../index.php?page=konsumen");
		}else{
			?>
		<script type="text/javascript">
			alert("Gagal Mengupdate Data");
			window.location = "../../index.php?page=konsumen";
		</script>
		<?php
		}
	}else if($_GET['aksi'] == "del"){
		$id = $_GET['id'];
		$del = mysqli_query($conn,"DELETE FROM tbl_konsumen where id='$id'");
		if ($del > 0) {
			header("location:../../index.php?page=konsumen");
		}else{
			?>
		<script type="text/javascript">
			alert("Gagal Menghapus Data");
			window.location = "../../index.php?page=konsumen";
		</script>
		<?php
		}
	}else{
		echo "ERROR";
	}
?>