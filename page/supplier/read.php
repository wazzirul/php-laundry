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
	<li><a href="index.php?page=supplier-add">Tambah Supplier</a></li>
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
			<th>nama</th>
			<th>alamat</th>
			<th>telepon</th>
			<th>opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT * FROM tbl_supplier where id like '%$acuan%' or nama like '%$acuan%' or alamat like '%$acuan%' or telepon
				 like '%$acuan%'");	
		}else{
			$query = mysqli_query($conn,"SELECT * FROM tbl_supplier");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT * FROM tbl_supplier");
		}
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$data['id']?></td>
			<td><?=$data['nama']?></td>
			<td><?=$data['alamat']?></td>
			<td><?=$data['telepon']?></td>
			<td>
			<a href="index.php?page=supplier-edit&id=<?=$data['id']?>">Edit</a>
			<a href="index.php?page=supplier-del&id=<?=$data['id']?>">Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</tbody>
</table>