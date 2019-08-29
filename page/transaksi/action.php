<?php
// Input Koneksi 
require '../../conn/conn.php';
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
$tanggal=date("Y-m-d");
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=laporan-rincian-transaksi_".$tanggal."_".$jam.".xls");
$no_transaksi = $_GET['no-transaksi'];
$id_rincian = $_GET['id-rincian'];
?>
<?php
$cek = mysqli_query($conn,"SELECT a.no_transaksi,b.nama as nama_karyawan,c.nama as nama_konsumen,a.tgl_ambil from tbl_transaksi a left join tbl_karyawan b on a.nik = b.nik left join tbl_konsumen c on a.id_konsumen = c.id where no_transaksi = '$no_transaksi'");
$dcek = mysqli_fetch_array($cek);
?>
<table border="1">
	<thead>
	<tr><th colspan="2">INFO KERANJANG</th></tr>
	</thead>
	<tr><td>No Transaksi</td><td><?=$dcek['no_transaksi']?></td></tr>
	<tr><td>Nama Karyawan</td><td><?=$dcek['nama_karyawan']?></td></tr>
	<tr><td>Nama Konsumen</td><td><?=$dcek['nama_konsumen']?></td></tr>
	<tr><td>Tanggal Transaksi</td><td><?=date('Y-m-d')?></td></tr>
	<tr><td>Tanggal Ambil</td><td><?=$dcek['tgl_ambil'];?></td></tr>
	</table>
	<br><br>
<table border="1">
	<thead>
		<tr>
			<th colspan="8">DATA TRANSAKSI</th>
		</tr>
		<tr>
			<th>no</th>
			<th>id tarif</th>
			<th>jenis laundry</th>
			<th>jenis pakaian</th>
			<th>berat</th>
			<th>harga</th>
			<th>diskon</th>
			<th>total</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$read = mysqli_query($conn,"SELECT a.id_tarif,b.jenis_laundry,c.jenis_pakaian,a.berat,a.harga,a.nama_diskon,a.total from tbl_transaksi a left join tbl_jnslaundry b on a.jenis_laundry = b.id left join tbl_jnspakaian c on a.jenis_pakaian = c.id where no_transaksi = '$no_transaksi'");
		$no = 1;
		while ($data = mysqli_fetch_array($read)) {
		?>
		<tr>
		<th><?=$no?></th>
		<th><?=$data['id_tarif']?></th>
		<th><?=$data['jenis_laundry']?></th>
		<th><?=$data['jenis_pakaian']?></th>
		<th><?=$data['berat']?> Kg</th>
		<th><?=$data['harga']?></th>
		<th><?=$data['nama_diskon']?></th>
		<th><?=$data['total']?></th>
		</tr>
		<?php
		$no++;
		}
		$qjumlah = mysqli_query($conn,"SELECT jumlah from tbl_rincian_transaksi where id_rincian = $id_rincian");
		$djumlah = mysqli_fetch_array($qjumlah);
		?>
		<tr>
		<td colspan="7" style="text-align: left;font-weight: bold;">Total Harga</td><th><?=$djumlah['jumlah']?></th>
		</tr>
	</tbody>
</table>