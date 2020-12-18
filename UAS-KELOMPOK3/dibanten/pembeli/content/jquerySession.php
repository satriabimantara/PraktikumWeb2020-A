<?php
session_start();
//from ajax
if (isset($_POST['btnAksi'])) {
	$id_toko = $_POST['id_toko'];
	$id_detail = $_POST['id_detail'];
	if ($_POST['btnAksi']=="hapus") {
		$_SESSION['jumlahitemtoko'][$id_toko]--;
		//cek apakah item di toko tersebut masih >0 atau sudah 0. kalau sudah 0, maka hapus session tokonya juga
		if ($_SESSION['jumlahitemtoko'][$id_toko] == 0) {
			//hapus session toko
			unset($_SESSION['toko'][$id_toko]);
		}
		unset($_SESSION['keranjang'][$id_toko][$id_detail]);
		if (empty($_SESSION['keranjang'][$id_toko])) {
			unset($_SESSION['keranjang'][$id_toko]);
		}
		//cek jika session toko kosong
		if (empty($_SESSION['toko'])) {
			unset($_SESSION['toko']);
		}
		//cek jika session keranjang kosong
		if (empty($_SESSION['keranjang'])) {
			unset($_SESSION['keranjang']);
		}
		echo json_encode($_SESSION['jumlahitemtoko'][$id_toko]);
	}elseif ($_POST['btnAksi']=="tambah" || $_POST['btnAksi']=="kurang") {
		$_SESSION['keranjang'][$id_toko][$id_detail]['jumlah_dibeli'] = $_POST['jumlah_dibeli'];
		$nilai = $_SESSION['keranjang'][$id_toko][$id_detail];
		echo json_encode($nilai);
	}
}elseif (isset($_POST['inputCatatanPemesanan'])) {	
	$id_detail = $_POST['id_detail'];
	$id_toko = $_POST['id_toko'];
	$_SESSION['keranjang'][$id_toko][$id_detail]['catatan_pemesanan'] = $_POST['catatan_pemesanan'];
}

?>