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
	<li><a class="alldata">Tampilkan Semua Data</a></li>
</ul>
<script type="text/javascript">
	$('.alldata').click(function() {
		$('#semua').submit();
	});
</script>
<br>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>nama barang</th>
			<th>supplier</th>
			<th>tanggal beli / update stok</th>
			<th>harga beli</th>
			<th>qty</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT * FROM  tbl_barang b where b.kode_barang like '%$acuan%' or b.supplier like '%$acuan%' or b.tgl_bu_stok like '%$acuan%' or b.hrg_beli like '%$acuan%' or b.qty like '%$acuan%'");	
		}else{
			$query = mysqli_query($conn,"SELECT * FROM  tbl_barang");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT * FROM  tbl_barang");
		}
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$data['kode_barang']?></td>
			<td><?=$data['nama_barang']?></td>
			<td><?=$data['supplier']?></td>
			<td><?=$data['tgl_bu_stok']?></td>
			<td><?=$data['hrg_beli']?></td>
			<td><?=$data['qty']?></td>
		</tr>
		<?php
		$no++;
		}
		?>
	</tbody>
</table>