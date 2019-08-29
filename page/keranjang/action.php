<?php
	include '../../conn/conn.php';
	$no_transaksi = $_POST['no_transaksi'];
	$jenis_tarif = $_POST['jenis_tarif'];
	$berat = $_POST['berat'];
	$nik = $_POST['nik'];
	$id_konsumen = $_POST['id_konsumen'];
	$tgl_ambil = $_POST['tgl_ambil'];
	$tgl_transaksi = date('Y-m-d');
	if ($_POST['aksi'] == "add") {
		$query = mysqli_query($conn,"SELECT * FROM tbl_tarif where id='$jenis_tarif' ");
		$row = mysqli_num_rows($query);
		if($row > 0){
			$data = mysqli_fetch_array($query);
			$id_tarif = $data['id'];
			$tarif = $data['tarif'];
			$jenis_laundry = $data['id_jenis_laundry'];
			$jenis_pakaian = $data['id_jenis_pakaian'];
			if ($berat >= 10 && $berat < 20) {
				$diskon = 0.9;
				$nama_diskon = '10%';
			}else if($berat >= 20 && $berat < 30){
				$diskon = 0.8;
				$nama_diskon = '20%';
			}elseif ($berat >= 30 && $berat < 40) {
				$diskon = 0.7;
				$nama_diskon = '30%';
			}elseif ($berat >= 40 && $berat < 50) {
				$diskon = 0.6;
				$nama_diskon = '40%';
			}else if($berat >= 50){
				$diskon = 0.5;
				$nama_diskon = '50%';
			}else{
				$diskon = 1;
				$nama_diskon = '0%';
			}
			$total = $berat * $tarif * $diskon;
			echo "$no_transaksi";
			echo "<br>$jenis_pakaian";
			echo "<br>$jenis_laundry";
			echo "<br>$berat";
			echo "<br>$diskon";
			echo "<br>$tgl_ambil";
			echo "<br>$tgl_transaksi";
			echo "<br>$id_tarif";
			echo "<br>$total";
			$qkeranjang = mysqli_query($conn,"INSERT INTO keranjang values (default,'$no_transaksi','$nik','$id_konsumen','$tgl_transaksi','$tgl_ambil','$jenis_laundry','$jenis_pakaian','$id_tarif',$berat,$tarif,'$diskon','$nama_diskon',$total)");
			if ($qkeranjang > 0) {
				header("location:../../index.php?page=keranjang");
			}else{
			?>
			<?php	
			}
		}else{
		?>
		<script type="text/javascript">
			alert("Tarif Tidak Ditemukan,Buat Tarif Baru");
			window.location = "../../index.php?page=tarif";
		</script>
		<?php
		}
	
	}else if($_POST['aksi'] == "set-keranjang"){
			$set_keranjang = mysqli_query($conn,"INSERT INTO keranjang_awal values('$no_transaksi','$nik','$id_konsumen','$tgl_ambil')");
			if ($set_keranjang > 0) {
				header("location:../../index.php?page=keranjang");
			}else{
				?>
			<script type="text/javascript">
				alert("Gagal Men-set Keranjang");
				window.location = "../../index.php?page=keranjang";
			</script>
			<?php
			}
	}else if($_GET['aksi'] == "ganti-keranjang"){
		$truncate = mysqli_query($conn,"TRUNCATE keranjang");
		$truncate1 = mysqli_query($conn,"TRUNCATE keranjang_awal");
		if ($truncate > 0 && $truncate1 > 0) {
			header("location:../../index.php?page=keranjang");
		}else{
			?>
		<script type="text/javascript">
			alert("Gagal Menghapus Data");
			window.location = "../../index.php?page=keranjang";
		</script>
		<?php
		}
	}else if($_GET['aksi'] == "submit-transaksi"){
		$transaksi = mysqli_query($conn,"INSERT INTO tbl_transaksi (id,no_transaksi,nik,id_konsumen,tgl_transaksi,tgl_ambil,jenis_laundry,jenis_pakaian,id_tarif,berat,harga,diskon,nama_diskon,total) SELECT * from keranjang");
		

		//Mendapatkan No Transaksi,ID Rincian,Dam Jumlah Untuk Tabel Rincian Transaksi
		$qnotran = mysqli_query($conn,"SELECT distinct(no_transaksi) as no_transaksi from keranjang");
		$dnotran = mysqli_fetch_array($qnotran);
		$notran = $dnotran['no_transaksi'];
		$qjumlah = mysqli_query($conn,"SELECT sum(total) as jumlah from keranjang");
		$djumlah = mysqli_fetch_array($qjumlah);
		$jumlah = $djumlah['jumlah'];
		
		include '../../conn/conn.php';
		$qtotalberat = mysqli_query($conn,"SELECT sum(berat) as total_berat from keranjang");
		$dtotalberat = mysqli_fetch_array($qtotalberat);
		$total_berat = $dtotalberat['total_berat'];
		$qbarang1 = mysqli_query($conn,"SELECT * from tbl_barang where kode_barang='BRG001'");
		$qbarang2 = mysqli_query($conn,"SELECT * from tbl_barang where kode_barang='BRG002'");
		$qbarang3 = mysqli_query($conn,"SELECT * from tbl_barang where kode_barang='BRG003'");
		$dbarang1 = mysqli_fetch_array($qbarang1);
		$dbarang2 = mysqli_fetch_array($qbarang2);
		$dbarang3 = mysqli_fetch_array($qbarang3);
		$qty1 = $dbarang1['qty'];
		$qty2 = $dbarang2['qty'];
		$qty3 = $dbarang3['qty'];
		if ($total_berat >= 1 && $total_berat < 5) {
			$pengurangan_stok = '0.5' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
				$qpenggunaanbarang = mysqli_query($conn,"INSERT INTO tbl_penggunaan_barang values(default,'$notran','$pengurangan_stok')");
			}
		}else if ($total_berat >= 5  && $total_berat < 10) {
			$pengurangan_stok = '1' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
				$qpenggunaanbarang = mysqli_query($conn,"INSERT INTO tbl_penggunaan_barang values(default,'$notran','$pengurangan_stok')");
			}
		}else if ($total_berat >= 10  && $total_berat < 15) {
			$pengurangan_stok = '1.5' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qpenggunaanbarang = mysqli_query($conn,"INSERT INTO tbl_penggunaan_barang values(default,'$notran','$pengurangan_stok')");
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
			}
		}else if ($total_berat >= 15 ) {
			$pengurangan_stok = '2' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qpenggunaanbarang = mysqli_query($conn,"INSERT INTO tbl_penggunaan_barang values(default,'$notran','$pengurangan_stok')");
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
			}
		}



		$rincian_transaksi = mysqli_query($conn,"INSERT INTO tbl_rincian_transaksi values(default,'$notran',$jumlah)");
		$truncate = mysqli_query($conn,"TRUNCATE keranjang");
		$truncate1 = mysqli_query($conn,"TRUNCATE keranjang_awal");
		if ($truncate > 0 && $truncate1 > 0 && $transaksi > 0 && $rincian_transaksi > 0) {
			header("location:../../index.php?page=keranjang");
		}else{
			?>
		<script type="text/javascript">
			alert("Gagal Mensubmit Transaksi Data");
			window.location = "../../index.php?page=keranjang";
		</script>
		<?php
		}
	}else{
		echo "ERROR";
	}
?>