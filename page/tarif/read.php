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
	<li><a href="index.php?page=tarif-add">Tambah Tarif Baru</a></li>
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
			<th>id</th>
			<th>jenis laundry</th>
			<th>jenis pakaian</th>
			<th>tarif per kg</th>
			<th>opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT a.id,b.jenis_laundry,c.jenis_pakaian,a.tarif from tbl_tarif a left join tbl_jnslaundry b on a.id_jenis_laundry = b.id left join tbl_jnspakaian c on a.id_jenis_pakaian = c.id where a.id like '%$acuan%' or b.jenis_laundry like '%$acuan%' or c.jenis_pakaian like '%$acuan%' or a.tarif like '%$acuan%' 	order by c.id asc");	
		}else{
			$query = mysqli_query($conn,"SELECT a.id,b.jenis_laundry,c.jenis_pakaian,a.tarif from tbl_tarif a left join tbl_jnslaundry b on a.id_jenis_laundry = b.id left join tbl_jnspakaian c on a.id_jenis_pakaian = c.id order by c.id asc");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT a.id,b.jenis_laundry,c.jenis_pakaian,a.tarif from tbl_tarif a left join tbl_jnslaundry b on a.id_jenis_laundry = b.id left join tbl_jnspakaian c on a.id_jenis_pakaian = c.id order by c.id asc");
		}
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$data['id']?></td>
			<td><?=$data['jenis_laundry']?></td>
			<td><?=$data['jenis_pakaian']?></td>
			<td><?=$data['tarif']?></td>
			<td>
			<a href="index.php?page=tarif-edit&id=<?=$data['id']?>">Edit</a>
			<a href="index.php?page=tarif-del&id=<?=$data['id']?>">Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</tbody>
</table>