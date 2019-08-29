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
	<li><a href="index.php?page=karyawan-add">Tambah Karyawan</a></li>
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
			<th>nik</th>
			<th>nama</th>
			<th>alamat</th>
			<th>telepon</th>
			<th>jenis kelamin</th>
			<th>opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		if (isset($_POST['acuan'])) {
			$acuan = $_POST['acuan'];
			$query = mysqli_query($conn,"SELECT * FROM tbl_karyawan where nama like '%$acuan%' or nik like '%$acuan%' or alamat like '%$acuan%' or telepon
				 like '%$acuan%' or jk  like '%$acuan%'");	
		}else{
			$query = mysqli_query($conn,"SELECT * FROM tbl_karyawan");
		}
		if (isset($_POST['all'])) {
			$query = mysqli_query($conn,"SELECT * FROM tbl_karyawan");
		}
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$data['NIK']?></td>
			<td><?=$data['nama']?></td>
			<td><?=$data['alamat']?></td>
			<td><?=$data['telepon']?></td>
			<td><?=$data['jk']?></td>
			<td>
			<a href="index.php?page=karyawan-edit&id=<?=$data['NIK']?>">Edit</a>
			<a href="index.php?page=karyawan-del&id=<?=$data['NIK']?>">Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</tbody>
</table>