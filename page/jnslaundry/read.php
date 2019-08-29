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
	<li><a href="index.php?page=jenis-laundry-add">Tambah Jenis Laundry</a></li>
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
			<th>opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT * FROM tbl_jnslaundry where id like '%$acuan%' or jenis_laundry like '%$acuan%'");	
		}else{
			$query = mysqli_query($conn,"SELECT * FROM tbl_jnslaundry");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT * FROM tbl_jnslaundry");
		}
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$data['id']?></td>
			<td><?=$data['jenis_laundry']?></td>
			<td>
			<a href="index.php?page=jenis-laundry-edit&id=<?=$data['id']?>">Edit</a>
			<a href="index.php?page=jenis-laundry-del&id=<?=$data['id']?>">Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</tbody>
</table>