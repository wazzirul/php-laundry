<table>
	<thead>
		<tr>
			<th colspan="4">Info Penggunaan Barang</th>
		</tr>
		<tr>
			<th>ID</th>
			<th>No Transaksi</th>
			<th>jumlah</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = mysqli_query($conn,"SELECT * FROM tbl_penggunaan_barang");
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<th><?=$data['id']?></th>
			<td><?=$data['no_transaksi']?></td>
			<td><?=$data['jumlah']?> Kg</td>
			<td>
			<a href="index.php?page=lihat-transaksi&no-transaksi=<?=$data['no_transaksi']?>">Lihat Data</a>
			</td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

<ul id="submenu" style="clear: both;">
	<li><a href="page/transaksi/action.php?no-transaksi=<?=$no_transaksi?>&id-rincian=<?=$id_rincian?>">Download Rincian Transaksi</a></li>
</ul>
