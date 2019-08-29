<br>
<?php
if ($_GET['page'] == "lihat-transaksi" && isset($_GET['no-transaksi'])) {
	$no_transaksi = $_GET['no-transaksi'];
?>
<ul id="submenu">
	<li><a href="index.php?page=transaksi">Lihat Semua Data</a></li>
</ul>
<?php
$cek = mysqli_query($conn,"SELECT a.no_transaksi,b.nama as nama_karyawan,c.nama as nama_konsumen,a.tgl_ambil from tbl_transaksi a left join tbl_karyawan b on a.nik = b.nik left join tbl_konsumen c on a.id_konsumen = c.id where no_transaksi = '$no_transaksi'");
$dcek = mysqli_fetch_array($cek);
?>
<table style="width: 25%;float: left;margin: 10px 0;">
	<thead>
	<tr><th colspan="2">INFO KERANJANG</th></tr>
	</thead>
	<tr><td>No Transaksi</td><td><?=$dcek['no_transaksi']?></td></tr>
	<tr><td>Nama Karyawan</td><td><?=$dcek['nama_karyawan']?></td></tr>
	<tr><td>Nama Konsumen</td><td><?=$dcek['nama_konsumen']?></td></tr>
	<tr><td>Tanggal Transaksi</td><td><?=date('Y-m-d')?></td></tr>
	<tr><td>Tanggal Ambil</td><td><?=$dcek['tgl_ambil'];?></td></tr>
	</table>
<table style="width: 74%;float: right;margin: 10px 0;">
	<thead>
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
		$qjumlah = mysqli_query($conn,"SELECT sum(total) as jumlah from tbl_transaksi where no_transaksi = '$no_transaksi'");
		$djumlah = mysqli_fetch_array($qjumlah);
		?>
		<tr>
		<td colspan="7" style="text-align: left;font-weight: bold;">Total Harga</td><th><?=$djumlah['jumlah']?></th>
		</tr>
	</tbody>
</table>
<br>
<ul id="submenu" style="clear: both;">
	<li><a href="page/transaksi/action.php?no-transaksi=<?=$no_transaksi?>&id-rincian=<?=$id_rincian?>">Download Rincian Transaksi</a></li>
</ul>
<?php
}else{
?>
<table>
	<thead>
		<tr>
			<th>ID Rincian Transaksi</th>
			<th>No Transaksi</th>
			<th>jumlah</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = mysqli_query($conn,"SELECT * FROM tbl_rincian_transaksi");
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<th><?=$data['id_rincian']?></th>
			<td><?=$data['no_transaksi']?></td>
			<td><?=$data['jumlah']?></td>
			<td>
			<a href="index.php?page=lihat-transaksi&no-transaksi=<?=$data['no_transaksi']?>&id-rincian=<?=$data['id_rincian']?>">Lihat Data</a>
			</td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php } ?>