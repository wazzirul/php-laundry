<link rel="stylesheet" type="text/css" href="css/form.css">



<?php
if ($page == "akun-add") {
?>
<form id="form-box" action="page/akun/action.php" method="post">
<h2>Tambah Akun Baru</h2>
	<table>
		<tr>
			<th>username</th><th><input type="text" name="username" required placeholder="Username..."></input></th>
		</tr>
		<tr>
			<th>nama</th><th><input type="text" name="nama" placeholder="Nama..." required></input></th>
		</tr>
		<tr>
			<th>password</th><th><input type="password" name="password" placeholder="**********" required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" placeholder="Alamat..." required></input></th>
		</tr>
		<tr>
			<th>status</th>
			<th>
			<select name="status" required>
				<option selected value="">-</option>
				<option value="superadmin">superadmin</option>
				<option value="admin">admin</option>
				<option value="member">member</option>
			</select>
			</th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>


<?php
}else if($page == "akun-edit"){
?>
<form id="form-box" action="page/akun/action.php" method="post">
<h2>Edit Akun</h2>
	<table>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query1 = mysqli_query($conn,"SELECT * FROM tbl_akun where id=$id");
		$data1 = mysqli_fetch_array($query1);
	}
	?>
		<tr>
			<th>username</th><th><input type="text" value="<?=$data1['username']?>" name="username" required></input></th>
		</tr>
		<tr>
			<th>nama</th><th><input type="text" name="nama" value="<?=$data1['nama']?>" required></input></th>
		</tr>
		<tr>
			<th>password</th><th><input type="password" name="password" value="<?=$data1['password']?>" required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" value="<?=$data1['alamat']?>" required></input></th>
		</tr>
		<tr>
			<th>status</th>
			<th>
			<select name="status" required>
				<option selected value="<?=$data1['status']?>"><?=$data1['status']?></option>
				<option value="superadmin">superadmin</option>
				<option value="admin">admin</option>
				<option value="member">member</option>
			</select>
			</th>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?=$data1['id']?>"></input>
			<input type="hidden" value="edit" name="aksi"></input>
			<th colspan="2"><input type="submit" value="EDIT DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<?php
}
?>


<!--KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_KONSUMEN_-->


<?php
// Set Kode Pembelian <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
$cek1 = mysqli_query($conn,"SELECT * FROM tbl_konsumen");
$rowcek1 = mysqli_num_rows($cek1);
if ($rowcek1 > 0) {
	$kode_konsumen = mysqli_query($conn,"SELECT max(id) as kode FROM tbl_konsumen");
	$data_konsumen = mysqli_fetch_array($kode_konsumen);
	$kode_terakhir = $data_konsumen['kode'];
	$id_konsumen = autonumber($kode_terakhir, 3, 3); 
	}else{
	$id_konsumen = "LSR001";	
}



if ($page == "konsumen-add") {
?>
<form id="form-box" action="page/konsumen/action.php" method="post">
<h2>Tambah Konsumen Baru</h2>
	<table>
		<tr>
			<th>id</th><th><input type="text" name="id" disabled value="<?= $id_konsumen;?>"></input></th>
		</tr>
		<tr>
			<th>nama konsumen</th><th><input type="text" name="nama" placeholder="Nama Konsumen..." required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" placeholder="Alamat..." required></input></th>
		</tr>
		<tr>
			<th>telepon</th><th><input type="text" name="telepon" placeholder="Telepon..." maxlength="13" required></input></th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<?php
}else if ($page == "konsumen-add-keranjang") {
?>
<form id="form-box" action="page/konsumen/action.php" method="post">
<h2>Tambah Konsumen Baru</h2>
	<table>
		<tr>
			<th>id</th><th><input type="text" disabled value="<?= $id_konsumen;?>"></input></th>
			<input type="hidden" name="id" value="<?=$id_konsumen;?>" ></input>
		</tr>
		<tr>
			<th>nama konsumen</th><th><input type="text" name="nama" placeholder="Nama Konsumen..." required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" placeholder="Alamat..." required></input></th>
		</tr>
		<tr>
			<th>telepon</th><th><input type="text" name="telepon" placeholder="Telepon..." maxlength="13" required></input></th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>

<?php
}else if($page == "konsumen-edit"){
?>
<form id="form-box" action="page/konsumen/action.php" method="post">
<h2>Edit Konsumen</h2>
	<table>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query1 = mysqli_query($conn,"SELECT * FROM tbl_konsumen where id='$id'");
		$data1 = mysqli_fetch_array($query1);
	}
	?>
		<tr>
			<th>nama</th><th><input type="text" name="nama" value="<?=$data1['nama']?>" required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" value="<?=$data1['alamat']?>" required></input></th>
		</tr>
		<tr>
			<th>telepon</th><th><input type="text" maxlength="13" name="telepon" value="<?=$data1['telepon']?>" required></input></th>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?=$data1['id']?>"></input>
			<input type="hidden" value="edit" name="aksi"></input>
			<th colspan="2"><input type="submit" value="EDIT DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<?php
}
?>



<!--KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN_KARYAWAN-->

<?php
if ($page == "karyawan-add") {
?>
<form id="form-box" action="page/karyawan/action.php" method="post">
<h2>Tambah Karyawan Baru</h2>
	<table>
		<tr>
			<th>nik</th><th><input type="text" name="nik" required placeholder="NIK..."></input></th>
		</tr>
		<tr>
			<th>nama</th><th><input type="text" name="nama" placeholder="Nama..." required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" placeholder="Alamat..." required></input></th>
		</tr>
		<tr>
			<th>telepon</th><th><input type="text" name="telepon" placeholder="Telepon..." maxlength="13" required></input></th>
		</tr>
		<tr>
			<th>jenis kelamin</th>
			<th>
			<select name="jk" required>
				<option selected value="">-</option>
				<option value="Laki	Laki">Laki Laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
			</th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>


<?php
}else if($page == "karyawan-edit"){
?>
<form id="form-box" action="page/karyawan/action.php" method="post">
<h2>Edit Karyawan</h2>
	<table>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query1 = mysqli_query($conn,"SELECT * FROM tbl_karyawan where NIK='$id'");
		$data1 = mysqli_fetch_array($query1);
	}
	?>
		<tr>
			<th>nama</th><th><input type="text" name="nama" value="<?=$data1['nama']?>" required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" value="<?=$data1['alamat']?>" required></input></th>
		</tr>
		<tr>
			<th>telepon</th><th><input type="text" name="telepon" value="<?=$data1['telepon']?>" maxlength="13" required></input></th>
		</tr>
		<tr>
			<th>jenis kelamin</th>
			<th>
			<select name="jk" required>
				<option selected value="<?=$data1['jk']?>"><?=$data1['jk']?></option>
				<option value="Laki Laki">Laki Laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
			</th>
		</tr>
		<tr>
			<input type="hidden" name="nik" value="<?=$data1['NIK']?>"></input>
			<input type="hidden" value="edit" name="aksi"></input>
			<th colspan="2"><input type="submit" value="EDIT DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<?php
}
?>




<!--SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER_SUPPLIER-->

<?php
if ($page == "supplier-add") {
?>
<form id="form-box" action="page/supplier/action.php" method="post">
<h2>Tambah Supplier Baru</h2>
	<table>
		<tr>
			<th>id</th><th><input type="text" name="id" required placeholder="ID Supplier..."></input></th>
		</tr>
		<tr>
			<th>nama supplier</th><th><input type="text" name="nama" placeholder="Nama Supplier..." required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" placeholder="Alamat..." required></input></th>
		</tr>
		<tr>
			<th>telepon</th><th><input type="text" name="telepon" placeholder="Telepon..." maxlength="13" required></input></th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>


<?php
}else if($page == "supplier-edit"){
?>
<form id="form-box" action="page/supplier/action.php" method="post">
<h2>Edit Supplier</h2>
	<table>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query1 = mysqli_query($conn,"SELECT * FROM tbl_supplier where id='$id'");
		$data1 = mysqli_fetch_array($query1);
	}
	?>
		<tr>
			<th>nama</th><th><input type="text" name="nama" value="<?=$data1['nama']?>" required></input></th>
		</tr>
		<tr>
			<th>alamat</th><th><input type="text" name="alamat" value="<?=$data1['alamat']?>" required></input></th>
		</tr>
		<tr>
			<th>telepon</th><th><input type="text" maxlength="13" name="telepon" value="<?=$data1['telepon']?>" required></input></th>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?=$data1['id']?>"></input>
			<input type="hidden" value="edit" name="aksi"></input>
			<th colspan="2"><input type="submit" value="EDIT DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<?php
}
?>
<!--PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN_PEMBELIAN-->

<?php
// Set Kode Pembelian <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
$cek1 = mysqli_query($conn,"SELECT * FROM tbl_pembelian");
$rowcek1 = mysqli_num_rows($cek1);
if ($rowcek1 > 0) {
	$kode_pembelian = mysqli_query($conn,"SELECT max(kode_pembelian) as kode FROM tbl_pembelian");
	$data_pembelian = mysqli_fetch_array($kode_pembelian);
	$kode_terakhir = $data_pembelian['kode'];
	$kodep = autonumber($kode_terakhir, 3, 3); 
	}else{
	$kodep = "PBL001";	
}




// Set Kode Barang <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
$cek2 = mysqli_query($conn,"SELECT * FROM tbl_barang");
$rowcek2 = mysqli_num_rows($cek2);
if ($rowcek1 > 0) {
	$kode_barang = mysqli_query($conn,"SELECT max(kode_barang) as kode_barang FROM tbl_barang");
	$data_barang = mysqli_fetch_array($kode_barang);
	$barang_terakhir = $data_barang['kode_barang'];
	$kodeb = autonumber($barang_terakhir, 3, 3); 
	}else{
	$kodeb = "BRG001";	
}
?>
<?php
if ($page == "pembelian-add") {
?>
<form id="form-box" action="page/pembelian/action.php" method="post">
<h2>Tambah BARANG Baru</h2>
	<table>
		<tr>
			<th>kode pembelian</th><th>
			<input type="hidden" name="kode_pembelian" value="<?=$kodep?>"></input>
			<input type="text" disabled value="<?=$kodep?>"></input>
			</th>
		</tr>
		<tr>
			<th>nik</th><th>
				<select required name="nik">
					<option selected value="" required>-</option>
					<?php
					$nik = mysqli_query($conn,"SELECT * from tbl_karyawan");
					while ($dnik = mysqli_fetch_array($nik)) {
					?>
					<option value="<?=$dnik['NIK']?>"><?=$dnik['NIK']?> , <?=$dnik['nama']?></option>
					<?php
					}
					?>
				</select>
			</th>
		</tr>
		<tr>
			<th>kode barang</th><th>
			<input type="hidden" name="kode_barang" value="<?=$kodeb?>"></input>
			<input type="text" value="<?=$kodeb?>" disabled></input>
			</th>
		</tr>
		<tr>
			<th>nama barang</th><th><input type="text" name="nama_barang" placeholder="Nama Barang..." required></input></th>
		</tr>
		<tr>
			<th>supplier</th>
			<th>
			<select name="supplier" required>
				<option selected value="">-</option>
				<?php
				$supp = mysqli_query($conn,"select * from tbl_supplier");
				while ($dsupp = mysqli_fetch_array($supp)) {
				?>
				<option value="<?=$dsupp['nama']?>"><?=$dsupp['nama']?></option>
				<?php } ?>
			</select>
			</th>
		</tr>
		<tr>
			<th>harga beli</th><th><input type="text" name="hrg_beli" placeholder="Harga Beli..." required></input></th>
		</tr>
		<tr>
			<th>qty</th><th><input type="text" name="qty" placeholder="Qty..." required></input></th>
		</tr>
		<tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<?php
}else if ($page == "pembelian-add-lama") {
?>
<form id="form-box" action="page/pembelian/action.php" method="post">
<h2>Tambah BARANG Lama</h2>
	<table>
		<tr>
			<th>kode pembelian</th><th>
			<input type="hidden" name="kode_pembelian" value="<?=$kodep?>"></input>
			<input type="text" disabled value="<?=$kodep?>"></input>
			</th>
		</tr>
		<tr>
			<th>nik</th><th>
				<select required name="nik">
					<option selected value="" required>-</option>
					<?php
					$nik = mysqli_query($conn,"SELECT * from tbl_karyawan");
					while ($dnik = mysqli_fetch_array($nik)) {
					?>
					<option value="<?=$dnik['NIK']?>"><?=$dnik['NIK']?> , <?=$dnik['nama']?></option>
					<?php
					}
					?>
				</select>
			</th>
		</tr>
		<tr>
			<th>kode barang</th><th>
				<select name="kode_barang" required>
					<option selected value="">-</option>
					<?php
					$kode_barang = mysqli_query($conn,"SELECT * FROM tbl_barang");
					while($dkb = mysqli_fetch_array($kode_barang)){
					?>
					<option value="<?=$dkb['kode_barang']?>"><?=$dkb['kode_barang']?> , <?=$dkb['nama_barang']?></option>
					<?php
					}
					?>
				</select>
			</th>
		</tr>
		<tr>
			<th>qty</th><th><input type="text" name="qty" placeholder="Qty..." required></input></th>
		</tr>
			<input type="hidden" value="addlama" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>


<!--JENIS-LAUNDRY_JENIS-LAUNDRY_JENIS-LAUNDRY_JENIS-LAUNDRY_JENIS-LAUNDRY_JENIS-LAUNDRY_JENIS-LAUNDRY_JENIS-LAUNDRY_JENIS-LAUNDRY-->

<?php
}else if ($page == "jenis-laundry-add") {
?>
<form id="form-box" action="page/jnslaundry/action.php" method="post">
<h2>Tambah Jenis Laundry Baru</h2>
	<table>
		<tr>
			<th>id</th><th><input type="text" name="id" required placeholder="ID Jenis Laundry..."></input></th>
		</tr>
		<tr>
			<th>nama jenis laundry</th><th><input type="text" name="nama" placeholder="Nama Jenis Laundry..." required></input></th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>


<?php
}else if($page == "jenis-laundry-edit"){
?>
<form id="form-box" action="page/jnslaundry/action.php" method="post">
<h2>Edit Jenis Laundry</h2>
	<table>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query1 = mysqli_query($conn,"SELECT * FROM tbl_jnslaundry where id='$id'");
		$data1 = mysqli_fetch_array($query1);
	}
	?>
		<tr>
			<th>nama jenis laundry</th><th><input type="text" name="nama" value="<?=$data1['jenis_laundry']?>" required></input></th>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?=$data1['id']?>"></input>
			<input type="hidden" value="edit" name="aksi"></input>
			<th colspan="2"><input type="submit" value="EDIT DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<!--JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN_JENIS-PAKAIAN-->

<?php
}else if ($page == "jenis-pakaian-add") {
?>
<form id="form-box" action="page/jnspakaian/action.php" method="post">
<h2>Tambah Jenis Pakaian Baru</h2>
	<table>
		<tr>
			<th>id</th><th><input type="text" name="id" required placeholder="ID Jenis Pakaian..."></input></th>
		</tr>
		<tr>
			<th>nama jenis pakaian</th><th><input type="text" name="nama" placeholder="Nama Jenis Pakaian..." required></input></th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>


<?php
}else if($page == "jenis-pakaian-edit"){
?>
<form id="form-box" action="page/jnspakaian/action.php" method="post">
<h2>Edit Jenis Pakaian</h2>
	<table>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query1 = mysqli_query($conn,"SELECT * FROM tbl_jnspakaian where id='$id'");
		$data1 = mysqli_fetch_array($query1);
	}
	?>
		<tr>
			<th>nama jenis pakaian</th><th><input type="text" name="nama" value="<?=$data1['jenis_pakaian']?>" required></input></th>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?=$data1['id']?>"></input>
			<input type="hidden" value="edit" name="aksi"></input>
			<th colspan="2"><input type="submit" value="EDIT DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>



<!--TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF_TARIF-->

<?php
}else if ($page == "tarif-add") {
?>
<form id="form-box" action="page/tarif/action.php" method="post">
<h2>Tambah Tarif Baru</h2>
	<table>
		<tr>
			<th>id</th><th><input type="text" name="id" required placeholder="ID Tarif..."></input></th>
		</tr>
		<tr>
			<th>jenis laundry</th>
			<th>
			<select name="jenis_laundry" required>
				<option selected value="">-</option>
				<?php
				$jenis_laundry = mysqli_query($conn,"SELECT * from tbl_jnslaundry");
				while ($dlaundry = mysqli_fetch_array($jenis_laundry)) {
				?>
				<option value="<?=$dlaundry['id']?>"><?=$dlaundry['id']?> , <?=$dlaundry['jenis_laundry']?></option>
				<?php } ?>
			</select>	
			</th>
		</tr>
		<tr>
			<th>Jenis pakaian</th>
			<th>
			<select name="jenis_pakaian" required>
				<option selected value="">-</option>
				<?php
				$jenis_pakaian = mysqli_query($conn,"SELECT * from tbl_jnspakaian");
				while ($dpakaian = mysqli_fetch_array($jenis_pakaian)) {
				?>
				<option value="<?=$dpakaian['id']?>"><?=$dpakaian['id']?> , <?=$dpakaian['jenis_pakaian']?></option>
				<?php } ?>
			</select>	
			</th>
		</tr>
		<tr>
			<th>tarif per Kg</th><th><input type="text" name="tarif" placeholder="Tarif Harga per Kg"></input></th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>


<?php
}else if($page == "tarif-edit"){
?>
<form id="form-box" action="page/tarif/action.php" method="post">
<h2>Edit Tarif</h2>
	<table>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query1 = mysqli_query($conn,"SELECT a.id,b.jenis_laundry,c.jenis_pakaian,a.tarif,a.id_jenis_laundry,a.id_jenis_pakaian from tbl_tarif a left join tbl_jnslaundry b on a.id_jenis_laundry = b.id left join tbl_jnspakaian c on a.id_jenis_pakaian = c.id where a.id='$id'");
		$data1 = mysqli_fetch_array($query1);
	}
	?>
		<tr>
			<th>jenis laundry</th>
			<th>
			<select name="jenis_laundry" required>
				<option selected value="<?=$data1['id_jenis_laundry']?>"><?=$data1['id_jenis_laundry']?> , <?=$data1['jenis_laundry']?></option>
				<option value="">-----------------------------</option>
				<?php
				$jenis_laundry = mysqli_query($conn,"SELECT * from tbl_jnslaundry");
				while ($dlaundry = mysqli_fetch_array($jenis_laundry)) {
				?>
				<option value="<?=$dlaundry['id']?>"><?=$dlaundry['id']?> , <?=$dlaundry['jenis_laundry']?></option>
				<?php } ?>
			</select>	
			</th>
		</tr>
		<tr>
			<th>Jenis pakaian</th>
			<th>
			<select name="jenis_pakaian" required>
				<option selected value="<?=$data1['id_jenis_pakaian']?>"><?=$data1['id_jenis_pakaian']?> , <?=$data1['jenis_pakaian']?></option>
				<option value="">-----------------------------</option>
				<?php
				$jenis_pakaian = mysqli_query($conn,"SELECT * from tbl_jnspakaian");
				while ($dpakaian = mysqli_fetch_array($jenis_pakaian)) {
				?>
				<option value="<?=$dlaundry['id']?>"><?=$dpakaian['id']?> , <?=$dpakaian['jenis_pakaian']?></option>
				<?php } ?>
			</select>	
			</th>
		</tr>
		<tr>
			<th>tarif per Kg</th><th><input type="text" name="tarif" value="<?=$data1['tarif']?>"></input></th>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?=$data1['id']?>"></input>
			<input type="hidden" value="edit" name="aksi"></input>
			<th colspan="2"><input type="submit" value="EDIT DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>
<?php
}else if($page == "histori-pembelian-download"){
	header("location:page/histori-pembelian/action.php");
}else if (isset($_GET['id']) && $page == "keranjang-add") {
	$no_transaksi = $_GET['id'];
?>
<form id="form-box" action="page/keranjang/action.php" method="post">
<h2>Tambah Barang Baru</h2>
	<table>
		<tr>
			<th>No Transaksi</th><th>
			<input type="hidden" name="no_transaksi" value="<?= $no_transaksi ?>"></input>
			<input type="text" disabled value="<?= $no_transaksi ?>"></input>
			</th>
		</tr>
		<tr>
			<th>jenis laundry</th>
			<th>
			<select name="jenis_laundry" required>
				<option selected value="">-</option>
				<?php
				$jenis_laundry = mysqli_query($conn,"SELECT * from tbl_jnslaundry");
				while ($dlaundry = mysqli_fetch_array($jenis_laundry)) {
				?>
				<option value="<?=$dlaundry['id']?>"><?=$dlaundry['id']?> , <?=$dlaundry['jenis_laundry']?></option>
				<?php } ?>
			</select>	
			</th>
		</tr>
		<tr>
			<th>Jenis pakaian</th>
			<th>
			<select name="jenis_pakaian" required>
				<option selected value="">-</option>
				<?php
				$jenis_pakaian = mysqli_query($conn,"SELECT * from tbl_jnspakaian");
				while ($dpakaian = mysqli_fetch_array($jenis_pakaian)) {
				?>
				<option value="<?=$dpakaian['id']?>"><?=$dpakaian['id']?> , <?=$dpakaian['jenis_pakaian']?></option>
				<?php } ?>
			</select>	
			</th>
		</tr>
		<tr>
			<th>Berat Barang</th><th><input type="text" name="berat" placeholder="Berat per Kg"></input></th>
		</tr>
		<tr>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>	
<?php
}else if ($page == "keranjang-add") {
$cek = mysqli_query($conn,"SELECT * from keranjang_awal");
$dcek = mysqli_fetch_array($cek);
?>
<form id="form-box" action="page/keranjang/action.php" method="post">
<h2>Tambah Barang Baru</h2>
	<table>
		<tr>
			<th>No Transaksi</th><th>
			<input type="text" disabled value="<?= $dcek['no_transaksi'] ?>"></input>
			</th>
		</tr>
		<tr>
			<th>Jenis Tarif</th>
			<th>
			<select name="jenis_tarif" required>
				<option selected value="">-</option>
				<?php
				$jenis_tarif = mysqli_query($conn,"SELECT a.id,b.jenis_laundry,c.jenis_pakaian,a.tarif from tbl_tarif a left join tbl_jnslaundry b on a.id_jenis_laundry = b.id left join tbl_jnspakaian c on a.id_jenis_pakaian = c.id order by a.id_jenis_laundry");
				while ($djenis_tarif = mysqli_fetch_array($jenis_tarif)) {
				?>
				<option value="<?=$djenis_tarif['id']?>"><?=$djenis_tarif['jenis_laundry']?> , <?=$djenis_tarif['jenis_pakaian']?> , <?=$djenis_tarif['tarif']?> / Kg</option>
				<?php } ?>
			</select>	
			</th>
		</tr>
		<tr>
			<th>Berat Barang</th><th><input type="text" name="berat" placeholder="Berat per Kg"></input></th>
		</tr>
		<tr>
			<input type="hidden" name="no_transaksi" value="<?= $dcek['no_transaksi'] ?>"></input>
			<input type="hidden" name="nik" value="<?=$dcek['nik']?>"></input>
			<input type="hidden" name="id_konsumen" value="<?=$dcek['id_konsumen']?>"></input>
			<input type="hidden" name="tgl_ambil" value="<?=$dcek['tgl_ambil']?>"></input>
			<input type="hidden" value="add" name="aksi"></input>
			<th colspan="2"><input type="submit" value="TAMBAH DATA" name="btn-submit"></input></th>
		</tr>
	</table>
</form>	
<?php
}else if ($page == "set-keranjang") {
?>
<form id="form-box" action="page/keranjang/action.php" method="post">
<h2>Set Keranjang</h2>
<span style="display: block;text-align: center;font-size: 15px;margin: 10px 0;">Jika Konsumen Belum Terdaftar,Silahkan Daftar <a href="index.php?page=konsumen-add-keranjang">Disini</a></span>
	<table>
	<tr>
		<th>No Transaksi</th>
		<?php
		// Set No Transaksi <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		$ceknot = mysqli_query($conn,"SELECT * FROM tbl_transaksi");
		$rowceknot = mysqli_num_rows($ceknot);
		if ($rowceknot > 0) {
			$idt = mysqli_query($conn,"SELECT max(no_transaksi) as kode FROM tbl_transaksi");
			$didt = mysqli_fetch_array($idt);
			$no_transaksi_t = $didt['kode'];
			$no_transaksi = autonumber($no_transaksi_t, 3, 3); 
			}else{
			$no_transaksi = "TRS001";	
		}
		?>
		<th><input disabled value="<?=$no_transaksi?>" type="text"></input>
		<input value="<?=$no_transaksi?>" name="no_transaksi" type="hidden"></input>
		</th>
	</tr>
	<tr>
		<th>NIK</th>
		<th>
			<select required name="nik">
				<option selected value="" required>-</option>
				<?php
				$nik = mysqli_query($conn,"SELECT * from tbl_karyawan");
				while ($dnik = mysqli_fetch_array($nik)) {
				?>
				<option value="<?=$dnik['NIK']?>"><?=$dnik['NIK']?> , <?=$dnik['nama']?></option>
				<?php
				}
				?>
			</select>
		</th>
	</tr>
	<tr><th>id konsumen</th>
	<th>
		<select required name="id_konsumen">
			<option selected value="" required>-</option>
			<?php
			$idk = mysqli_query($conn,"SELECT * from tbl_konsumen");
			while ($didk = mysqli_fetch_array($idk)) {
			?>
			<option value="<?=$didk['id']?>"><?=$didk['id']?> , <?=$didk['nama']?></option>
			<?php
			}
			?>
		</select>
	</th>
	</tr>
	<tr>
		<th>Tanggal Transaksi</th>
		<th><input type="text" disabled value="<?=date('Y-m-d')?>"></input></th>
	</tr>
	<tr>
		<th>Tanggal Ambil</th>
		<th><input type="date" name="tgl_ambil"></input></th>
	</tr>
	<tr>
		<input type="hidden" value="set-keranjang" name="aksi"></input>
		<th colspan="2"><input type="submit" value="SET KERANJANGNYA" name="btn-submit"></input></th>
	</tr>
	</table>
</form>	
<?php
}else{
	echo "";
}
?>
