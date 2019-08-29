<ul id="submenu">
<?php
$qka = mysqli_query($conn,"SELECT* from keranjang_awal");
$rka = mysqli_num_rows($qka);
if ($rka > 0) {
?>
	<li><a href="index.php?page=keranjang-add">Tambah Barang Baru</a></li>
</ul>
	<?php
	$cek = mysqli_query($conn,"SELECT a.no_transaksi,b.nama as nama_karyawan,c.nama as nama_konsumen,a.tgl_ambil from keranjang_awal a left join tbl_karyawan b on a.nik = b.nik left join tbl_konsumen c on a.id_konsumen = c.id");
	$dcek = mysqli_fetch_array($cek);
	?>
		
	<br/>
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
			$qkeranjang = mysqli_query($conn,"SELECT * from keranjang");
			$rkeranjang = mysqli_num_rows($qkeranjang);
			if ($rkeranjang > 0) {
			$read = mysqli_query($conn,"SELECT a.id_tarif,b.jenis_laundry,c.jenis_pakaian,a.berat,a.harga,a.nama_diskon,a.total from keranjang a left join tbl_jnslaundry b on a.jenis_laundry = b.id left join tbl_jnspakaian c on a.jenis_pakaian = c.id");
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
			$qtotalharga = mysqli_query($conn,"SELECT sum(total) as total from keranjang");
			$dtotalharga = mysqli_fetch_array($qtotalharga);
			?>
			<tr>
			<td colspan="7" style="text-align: left;font-weight: bold;">Total Harga</td><th><?=$dtotalharga['total']?></th>
			</tr>
			<?php
			}else{
			?>
			<tr>
				<th colspan="8">Tidak Ada Data</th>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<style type="text/css">
	.box-menu{
		clear: both;
	}
	.box-menu a{
		display: block;
		padding: 5px 30px;
		color: white;
		cursor: pointer;
		border:1px solid transparent;
		transition: all ease-in-out 0.3s;
		margin-bottom: 3px;
		background: #0e83cd;
	}
	.box-menu a:hover{
		border:1px solid #0e83cd;
		background: white;
		color: #0e83cd;		
	}
	</style>
	<p class="box-menu">
	<a style="float: left;" href="index.php?page=ganti-keranjang">Ganti Dengan Keranjang Baru</a><a href="index.php?page=submit-transaksi" style="float: right;">Submit Transaksi</a>
	</p>
<br>
<?php
}else{
	?>
	<li><a href="index.php?page=set-keranjang">Set Keranjang</a></li>	
	<?php
}
?>