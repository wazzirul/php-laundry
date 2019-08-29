<?php

// Input Koneksi 
require '../../conn/conn.php';
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
$tanggal=date("Y-m-d");
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=laporan-histori-pembelian_".$tanggal."_".$jam.".xls");
?>

<!-- Script Tampil Data Tabel-->
<table border="1">
	<thead bgcolor="#0e83cd"><font color="white">
		<tr>
			<th>No</th>
			<th>Nama Karyawan</th>
			<th>Kode Pembelian</th>
			<th>Kode Barang</th>
			<th>nama barang</th>
			<th>supplier</th>
			<th>tanggal beli / update stok</th>
			<th>jam</th>
			<th>harga beli</th>
			<th>qty</th>
			<th>jumlah</th>
		</tr>
		</font>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT * from tbl_histori_pembelian a left join tbl_karyawan b on a.nik = b.nik where kode_pembelian like '%$acuan%' or kode_barang like '%$acuan%' or supplier like '%$acuan%' or tgl_beli like '%$acuan%' or hrg_beli like '%$acuan%' or qty like '%$acuan%'	 or jumlah like '%$acuan%' or nama_barang like '%$acuan%' or b.nama like '%$acuan%'");	
		}else{
			$query = mysqli_query($conn,"SELECT * from tbl_histori_pembelian a left join tbl_karyawan b on a.nik = b.nik");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT * from tbl_histori_pembelian a left join tbl_karyawan b on a.nik = b.nik");
		}
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$data['nama']?></td>
			<td><?=$data['kode_pembelian']?></td>
			<td><?=$data['kode_barang']?></td>
			<td><?=$data['nama_barang']?></td>
			<td><?=$data['supplier']?></td>
			<td><?=$data['tgl_beli']?></td>
			<td><?=$data['jam']?></td>
			<td><?=$data['hrg_beli']?></td>
			<td><?=$data['qty']?></td>
			<td><?=$data['jumlah']?></td>
		</tr>
		<?php
		$no++;
		}
		?>
		<?php
		$total = mysqli_query($conn,"SELECT sum(jumlah) as total from tbl_histori_pembelian");
		$dtotal = mysqli_fetch_array($total);
		?>
		<tr>
			<td colspan="10">Total</td>
			<td><?=$dtotal['total']?></td>
		</tr>
	</tbody>
</table>