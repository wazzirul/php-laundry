<?php

// fungsi ini untuk menghasilkan kode varchar otomatis
// terdapat tiga parameter yang dibutuhkan untuk menggunakan fungsi ini
// $id_terakhir adalah kode terakhir dari database ex: KNS0015
// $panjang_kode adalah panjang karakter string pada kode
//				 pada KNS0015 nilai $panjang_kode = 3
// $panjang_angka adalah panjang karakter angka pada kode
//				 pada KNS0015 nilai $panjang_angka = 4

function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {

	// mengambil nilai kode ex: KNS0015 hasil KNS
	$kode = substr($id_terakhir, 0, $panjang_kode);

	// mengambil nilai angka
	// ex: KNS0015 hasilnya 0015
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

	// menambahkan nilai angka dengan 1
	// kemudian memberikan string 0 agar panjang string angka menjadi 4
	// ex: angka baru = 6 maka ditambahkan string 0 tiga kali
	// sehingga menjadi 0006
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);

	// menggabungkan kode dengan nilang angka baru
	$id_baru = $kode.$angka_baru;

	return $id_baru;
}

// contoh penggunaan kode
echo autonumber('KNS001', 3, 3); // hasil KNS0010
echo '<br/>';

echo autonumber('D01', 1, 2); // hasil D002
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

	/*Var yang Dibutuhkan*/
	$id = "BRG001";
	$panjang = "3";
	$angkanya = "3";
	/**/
	$kode = substr($id,0,$panjang);
	echo "$kode";
	echo "<br/>";
	$angka_kode = substr($id,$panjang,$angkanya);
	echo "$angka_kode";
	$angka_baru_loh = str_repeat("0", $angkanya - strlen($angka_kode+1)).($angka_kode+1);
	echo "<br/>";
	echo "$angka_baru_loh";
	echo "<br/>";
	echo "<br/>";	
	$id_baru = $kode.$angka_baru_loh;
	echo "$id_baru";
?>