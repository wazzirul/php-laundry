<form method="post" id="pencarian">
	<input type="text" name="acuan" placeholder="CARI DATA DISINI" id="pencarian"><span class="search-icon"><img src="img/search.png"></span></input>
	<input type="submit" style="display: none;"></input>
</form>
<div style="display: none;">
<form id="semua" method="post">
	<input type="text" name="all" value="all"></input>
</form>
</div>
<script type="text/javascript">
	$('.search-icon').click(function() {
		$('#pencarian').submit();
	});
</script>
<ul id="submenu">
	<li><a href="index.php?page=pembelian-add">Tambah Barang</a></li>
	<li><a href="index.php?page=pembelian-add-lama">Tambah Barang Lama</a></li>
	<li><a class="alldata">Tampilkan Semua Data</a></li>
</ul>
<script type="text/javascript">
	$('.alldata').click(function() {
		$('#semua').submit();
	});
</script>
<?php
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
?>
<br>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Karyawan</th>
			<th>Kode Pembelian</th>
			<th>Kode Barang</th>
			<th>nama barang</th>
			<th>supplier</th>
			<th>tanggal beli</th>
			<th>jam</th>
			<th>harga beli</th>
			<th>qty</th>
			<th>jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT a.kode_pembelian,a.kode_barang,b.nama,c.nama_barang,c.supplier,a.tgl,a.jam,c.hrg_beli,a.qty,a.jumlah from tbl_pembelian a left join tbl_karyawan b on a.nik = b.nik left join tbl_barang c on a.kode_barang = c.kode_barang where a.kode_pembelian like '%$acuan%' or a.kode_barang like '%$acuan%' or c.supplier like '%$acuan%' or c.hrg_beli like '%$acuan%' or b.nama like '%$acuan%' or a.qty like '%$acuan%' or a.jumlah like '%$acuan%' or c.nama_barang like '%$acuan%' or a.jam like '%$acuan%'");	
		}else{
			$query = mysqli_query($conn,"SELECT a.kode_pembelian,a.kode_barang,b.nama,c.nama_barang,c.supplier,a.tgl,a.jam,c.hrg_beli,a.qty,a.jumlah from tbl_pembelian a left join tbl_karyawan b on a.nik = b.nik left join tbl_barang c on a.kode_barang = c.kode_barang");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT a.kode_pembelian,a.kode_barang,b.nama,c.nama_barang,c.supplier,a.tgl,a.jam,c.hrg_beli,a.qty,a.jumlah from tbl_pembelian a left join tbl_karyawan b on a.nik = b.nik left join tbl_barang c on a.kode_barang = c.kode_barang");
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
			<td><?=$data['tgl']?></td>
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
		$total = mysqli_query($conn,"SELECT sum(jumlah) as total from tbl_pembelian");
		$dtotal = mysqli_fetch_array($total);
		?>
		<tr>
			<td colspan="10">Total</td>
			<td><?=$dtotal['total']?></td>
		</tr>
	</tbody>
</table>