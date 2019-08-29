<?php
	include '../../conn/conn.php';
	$tarif = $_POST['tarif'];
	$jenis_pakaian = $_POST['jenis_pakaian'];
	$jenis_laundry = $_POST['jenis_laundry'];
	$id = $_POST['id'];
	if ($_POST['aksi'] == "add") {
		$query = mysqli_query($conn,"SELECT * FROM tbl_tarif where id_jenis_laundry = '$jenis_laundry' and id_jenis_pakaian = '$jenis_pakaian' ");
		$row = mysqli_num_rows($query);
		if($row > 0){
		?>
		<script type="text/javascript">
			alert("Jenis Laundry Dan Jenis Pakaian yang sama telah ada");
			window.location = "../../index.php?page=tarif";
		</script>
		<?php
		}else{
			$add = mysqli_query($conn,"INSERT INTO tbl_tarif values('$id','$jenis_laundry','$jenis_pakaian',$tarif)");
			if ($add > 0) {
				header("location:../../index.php?page=tarif");
			}else{
			?>
			<script type="text/javascript">
				alert("Gagal Memasukan Data / Terjadi Kesamaan Tarif");
				window.location = "../../index.php?page=tarif";
			</script>
			<?php
			}
		}
	}else if($_POST['aksi'] == "edit"){
			$edit = mysqli_query($conn,"UPDATE tbl_tarif set id_jenis_laundry='$jenis_laundry',id_jenis_pakaian='$jenis_pakaian',tarif=$tarif where id = '$id'");
			if ($edit > 0) {
				header("location:../../index.php?page=tarif");
			}else{
				?>
			<script type="text/javascript">
				alert("Gagal Mengupdate Data");
				window.location = "../../index.php?page=tarif";
			</script>
			<?php
			}
	}else if($_GET['aksi'] == "del"){
		$id = $_GET['id'];
		$del = mysqli_query($conn,"DELETE FROM tbl_tarif where id='$id'");
		if ($del > 0) {
			header("location:../../index.php?page=tarif");
		}else{
			?>
		<script type="text/javascript">
			alert("Gagal Menghapus Data");
			window.location = "../../index.php?page=tarif";
		</script>
		<?php
		}
	}else{
		echo "ERROR";
	}
?>