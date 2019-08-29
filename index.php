<?php
include 'conn/cek-login.php';
if (empty($_SESSION['username'])) {
	header("location:logout.php");
}
?>

<?php
//*****************************************************************************************************
// fungsi ini untuk menghasilkan kode varchar otomatis
// terdapat tiga parameter yang dibutuhkan untuk menggunakan fungsi ini
// $id_terakhir adalah kode terakhir dari database ex: KNS0015
// $panjang_kode adalah panjang karakter string pada kode
//				 pada KNS0015 nilai $panjang_kode = 3
// $panjang_angka adalah panjang karakter angka pada kode
//				 pada KNS0015 nilai $panjang_angka = 4

function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {

	// mengambil nilai kode ex: KNS0015 hasil KNS
	$kode = substr($id_terakhir, 0, $panjang_kode);

	// mengambil nilai angka
	// ex: KNS0015 hasilnya 0015
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

	// menambahkan nilai angka dengan 1
	// kemudian memberikan string 0 agar panjang string angka menjadi 4
	// ex: angka baru = 6 maka ditambahkan string 0 tiga kali
	// sehingga menjadi 0006
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);

	// menggabungkan kode dengan nilang angka baru
	$id_baru = $kode.$angka_baru;

	return $id_baru;
}
//*****************************************************************************************************
?>
<!DOCTYPE html>
<html>
<head>
	<title>AzieLaundry</title>
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<script type="text/javascript">
	$('document').ready(function () {
		$('.nav-li').click(function () {
			$(this).toggleClass('tap');
		})
	});
</script>
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div id="header">
		<h1>AzieLaundry</h1><br>
		<div class="menu">
			<ul class="nav-ul">
				<li class="nav-li"><a href="index.php">home</a></li>
				<li class="nav-li"><a>data master<span class="arrow"></span></a>
				<ul>
					<li><a href="index.php?page=konsumen">konsumen</a></li>
					<li><a href="index.php?page=karyawan">karyawan</a></li>
					<li><a href="index.php?page=barang">barang</a></li>
					<li><a href="index.php?page=supplier">supplier</a></li>
					<li><a href="index.php?page=jenis-laundry">jenis laundry</a></li>
					<li><a href="index.php?page=jenis-pakaian">jenis pakaian</a></li>
					<li><a href="index.php?page=tarif">tarif</a></li>
					<?php
					if ($status == "superadmin") {
					?>
					<li><a href="index.php?page=akun">akun</a></li>
					<?php
					}
					?>
				</ul>
				</li>
				<li class="nav-li"><a>data pembelian<span class="arrow"></span></a>
				<ul>
					<li><a href="index.php?page=pembelian">pembelian</a></li>
					<li><a href="index.php?page=histori-pembelian">histori pembelian</a></li>
				</ul>
				</li>
				<li class="nav-li"><a>data laundry<span class="arrow"></span></a>
				<ul>
					<li><a href="index.php?page=keranjang">keranjang</a></li>
					<li><a href="index.php?page=transaksi">transaksi</a></li>
					<li><a href="index.php?page=penggunaan-barang">penggunaan barang</a></li>
				</ul>
				</li>
				<li class="nav-li"><a href="logout.php">logout</a></li>
			</ul>
		</div>
</div>
<div id="body">
	<h3>Selamat Datang <?=$nama?> , <?=date('d-m-Y')?></h3>
	<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page = "";
	}

	if(isset($_GET['id'])){$id = $_GET['id'];}else{$id="";}

	if ($page == "konsumen") {
		include 'page/konsumen/read.php';
	}else if ($page == "akun") {
		include 'page/akun/read.php';	
	}else if ($page == "akun-add" || $page == "akun-edit"){
		include 'form.php';	
	}else if($page == "akun-del"){
		header("location:page/akun/action.php?aksi=del&id=$id");
	}else if ($page == "konsumen-add" || $page == "konsumen-edit" || $page == "konsumen-add-keranjang"){
		include 'form.php';	
	}else if($page == "konsumen-del"){
		header("location:page/konsumen/action.php?aksi=del&id=$id");
	}else if ($page == "karyawan") {
		include 'page/karyawan/read.php';	
	}else if ($page == "karyawan-add" || $page == "karyawan-edit"){
		include 'form.php';	
	}else if($page == "karyawan-del"){
		header("location:page/karyawan/action.php?aksi=del&id=$id");
	}else if ($page == "supplier") {
		include 'page/supplier/read.php';	
	}else if ($page == "supplier-add" || $page == "supplier-edit"){
		include 'form.php';	
	}else if($page == "supplier-del"){
		header("location:page/supplier/action.php?aksi=del&id=$id");
	}else if ($page == "barang") {
		include 'page/barang/read.php';	
	}else if ($page == "pembelian") {
		include 'page/pembelian/read.php';	
	}else if ($page == "pembelian-add"){
		include 'form.php';	
	}else if ($page == "pembelian-add-lama"){
		include 'form.php';	
	}else if ($page == "histori-pembelian") {
		include 'page/histori-pembelian/read.php';
	}else if ($page == "histori-pembelian-download") {
		include 'form.php';	
	}else if ($page == "jenis-laundry") {
		include 'page/jnslaundry/read.php';	
	}else if ($page == "jenis-laundry-add" || $page == "jenis-laundry-edit"){
		include 'form.php';	
	}else if($page == "jenis-laundry-del"){
		header("location:page/jnslaundry/action.php?aksi=del&id=$id");
	}else if ($page == "jenis-pakaian") {
		include 'page/jnspakaian/read.php';	
	}else if ($page == "jenis-pakaian-add" || $page == "jenis-pakaian-edit"){
		include 'form.php';	
	}else if($page == "jenis-pakaian-del"){
		header("location:page/jnspakaian/action.php?aksi=del&id=$id");
	}else if ($page == "tarif") {
		include 'page/tarif/read.php';	
	}else if ($page == "tarif-add" || $page == "tarif-edit"){
		include 'form.php';	
	}else if($page == "tarif-del"){
		header("location:page/tarif/action.php?aksi=del&id=$id");
	}else if ($page == "keranjang") {
		include 'page/keranjang/read.php';	
	}else if($page == "keranjang-add" || $page == "set-keranjang"){
		include 'form.php';
	}else if($page == "ganti-keranjang"){
		header('location:page/keranjang/action.php?aksi=ganti-keranjang');	
	}else if($page == "submit-transaksi"){
		header('location:page/keranjang/action.php?aksi=submit-transaksi');	
	}else if ($page == "transaksi" || $page == "lihat-transaksi") {
		include 'page/transaksi/read.php';	
	}else if ($page == "penggunaan-barang") {
		include 'page/penggunaan-barang/read.php';	
	}else{
		echo "Pilih Menu Sub";
	}
	?>
</div>
<div id="footer">
	<h3>azielaundry.com © 2016. All rights reserved. Designed by Muhammad Wazirul Azzan.</h3>
</div>
</body>
</html>