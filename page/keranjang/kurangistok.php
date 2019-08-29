<?php
		include '../../conn/conn.php';
		$qtotalberat = mysqli_query($conn,"SELECT sum(berat) as total_berat from keranjang");
		$dtotalberat = mysqli_fetch_array($qtotalberat);
		$total_berat = $dtotalberat['total_berat'];
		$qbarang1 = mysqli_query($conn,"SELECT * from tbl_barang where kode_barang='BRG001'");
		$qbarang2 = mysqli_query($conn,"SELECT * from tbl_barang where kode_barang='BRG002'");
		$qbarang3 = mysqli_query($conn,"SELECT * from tbl_barang where kode_barang='BRG003'");
		$dbarang1 = mysqli_fetch_array($qbarang1);
		$dbarang2 = mysqli_fetch_array($qbarang2);
		$dbarang3 = mysqli_fetch_array($qbarang3);
		$qty1 = $dbarang1['qty'];
		$qty2 = $dbarang2['qty'];
		$qty3 = $dbarang3['qty'];
		if ($total_berat >= 1 && $total_berat < 5) {
			$pengurangan_stok = '0.5' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
			}
		}else if ($total_berat >= 5  && $total_berat < 10) {
			$pengurangan_stok = '1' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
			}
		}else if ($total_berat >= 10  && $total_berat < 15) {
			$pengurangan_stok = '1.5' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
			}
		}else if ($total_berat >= 15 ) {
			$pengurangan_stok = '2' ;
			if ($qty1 < $pengurangan_stok && $qty2 < $pengurangan_stok && $qty3 < $pengurangan_stok  ) {
				?>
				<script type="text/javascript">
					alert("Barang yang dibutuhkan tidak memadai,Beli barang baru pada supplier");
					window.location = "../../index.php?page=keranjang";
				</script>
				<?php
			}else{
				$qkurang = mysqli_query($conn,"UPDATE tbl_barang set qty=qty-".$pengurangan_stok."");
			}
		}
?>