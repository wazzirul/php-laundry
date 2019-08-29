<?php
	include '../../conn/conn.php';
	$kode_pembelian = $_POST['kode_pembelian'];
	$kode_barang = $_POST['kode_barang'];
	$tgl_bu_stok = date('Y-m-d');
	$qty = $_POST['qty'];
	date_default_timezone_set('Asia/Jakarta');
	$jam=date("H:i:s");
	if ($_POST['aksi'] == "add") {
		$hrg_beli = $_POST['hrg_beli'];
		$supplier = $_POST['supplier'];
		$nama_barang = $_POST['nama_barang'];
		$nik = $_POST['nik'];
		$jumlah = $hrg_beli * $qty;
		$add1 = mysqli_query($conn,"INSERT INTO tbl_pembelian values('$kode_pembelian','$kode_barang','$nik','$tgl_bu_stok','$jam',$qty,$jumlah)");
		$add2 = mysqli_query($conn,"INSERT INTO tbl_barang values('$kode_barang','$nama_barang','$supplier',$qty,'$tgl_bu_stok','$jam',$hrg_beli)");
		$add3 = mysqli_query($conn,"INSERT INTO tbl_histori_pembelian values('$kode_pembelian','$kode_barang','$nik','$nama_barang','$supplier','$tgl_bu_stok','$jam',$hrg_beli,$qty,$jumlah)");
		if($add1 > 0 && $add2 > 0 && $add3 > 0) {
			header("location:../../index.php?page=pembelian");
		}else{
		?>
		<script type="text/javascript">
			alert("Gagal Memasukan Data / Terjadi Kesamaan Kode Pembelian");
			window.location = "../../index.php";
		</script>
		<?php
		}	
	}else if($_POST['aksi'] == "addlama"){
		$query = mysqli_query($conn,"SELECT * from tbl_barang where kode_barang='$kode_barang'");
		$row = mysqli_num_rows($query);
		if($row > 0){
		$data = mysqli_fetch_array($query);
		$nama_barang = $data['nama_barang'];
		$supplier = $data['supplier'];
		$hrg_beli = $data['hrg_beli'];
		$nik = $_POST['nik'];
		$jumlah = $hrg_beli * $qty;	
		$addl1 = mysqli_query($conn,"INSERT INTO tbl_pembelian values('$kode_pembelian','$kode_barang','$nik','$tgl_bu_stok','$jam',$qty,$jumlah)");
		$addl2 = mysqli_query($conn,"UPDATE tbl_barang set tgl_bu_stok='$tgl_bu_stok',qty=qty+$qty where kode_barang='$kode_barang'");
		$addl3 = mysqli_query($conn,"INSERT INTO tbl_histori_pembelian values('$kode_pembelian','$kode_barang','$nik','$nama_barang','$supplier','$tgl_bu_stok','$jam',$hrg_beli,$qty,$jumlah)");
		if($addl1 > 0 && $addl2 > 0 && $addl3 > 0) {
			header("location:../../index.php?page=pembelian");
		}else{
		?>
		<script type="text/javascript">
			alert("Gagal Memasukan Data / Terjadi Kesamaan Kode Pembelian");
			window.location = "../../index.php";
		</script>
		<?php	
		}
		}else{
		?>
		<script type="text/javascript">
			alert("Kode Barang Salah");
			window.location = "../../index.php?page=pembelian";
		</script>
		<?php	
		}
	}else{
		?>
		<script type="text/javascript">
			alert("Error");
			window.location = "../../index.php?page=pembelian";
		</script>
		<?php	
	}
?>