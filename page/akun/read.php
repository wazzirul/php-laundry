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
	<li><a href="index.php?page=akun-add">Tambah Data</a></li>
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
			<th>username</th>
			<th>password</th>
			<th>nama</th>
			<th>alamat</th>
			<th>status</th>
			<th>opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT * FROM tbl_akun where username like '%$acuan%' or password like '%$acuan%' or nama like '%$acuan%' or alamat
				 like '%$acuan%' or status  like '%$acuan%'");	
		}else{
			$query = mysqli_query($conn,"SELECT * FROM tbl_akun");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT * FROM tbl_akun");
		}
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$data['username']?></td>
			<td><?=$data['password']?></td>
			<td><?=$data['nama']?></td>
			<td><?=$data['alamat']?></td>
			<td><?=$data['status']?></td>
			<td>
			<a href="index.php?page=akun-edit&id=<?=$data['id']?>">Edit</a>
			<a href="index.php?page=akun-del&id=<?=$data['id']?>">Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</tbody>
</table>