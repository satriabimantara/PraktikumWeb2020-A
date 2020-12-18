<?php
//Button beli ditekan dari contentbanten.php
if (isset($_POST['btnBeliBanten'])) {
	// Ambil id_detail banten dan id_toko dari home.php ketika button beli di klik. Data post bisa dikirim dari home atau dari ajax
	$id_detail = $_POST['id_detail'];
	$id_toko = $_POST['id_toko'];
	$hargajual_detail = $_POST['hargajual_detail'];
	$diskon_detail = $_POST['diskon_detail'];
	$hargadiskon_detail = $_POST['hargadiskon_detail'];
	$stok_detail = $_POST['stok_detail'];
	$nama_banten = $_POST['nama_banten'];
	$kelengkapan_banten = $_POST['kelengkapan_banten'];
	$deskripsi_banten = $_POST['deskripsi_banten'];
	$tingkatan_banten = $_POST['tingkatan_banten'];
	$kategori_banten = $_POST['kategori_banten'];
	$nama_toko = $_POST['nama_toko'];
	$alamat_toko = $_POST['alamat_toko'];
	$kota_toko = $_POST['kota_toko'];
	$kodepos_toko = $_POST['kodepos_toko'];
	$provinsi_toko = $_POST['provinsi_toko'];
	$catatan_pemesanan = "";
	$foto_banten = $_POST['foto_banten'];
}
// detail banten yang dibeli
$_SESSION['detail_banten'] = array(
	'id_detail'=>$id_detail,
	'jumlah_dibeli' =>1 ,
	'hargajual_detail'=>$hargajual_detail,
	'diskon_detail'=>$diskon_detail,
	'hargadiskon_detail'=>$hargadiskon_detail,
	'stok_detail'=>$stok_detail,
	'nama_banten'=>$nama_banten,
	'kategori_banten'=>$kategori_banten,
	'tingkatan_banten'=>$tingkatan_banten,
	'deskripsi_banten'=>$deskripsi_banten,
	'kelengkapan_banten'=>$kelengkapan_banten,
	'nama_toko'=>$nama_toko,
	'alamat_toko'=>$alamat_toko,
	'kota_toko'=>$kota_toko,
	'kodepos_toko'=>$kodepos_toko,
	'provinsi_toko'=>$provinsi_toko,
	'foto_banten'=>$foto_banten,
	'catatan_pemesanan'=>$catatan_pemesanan);
//detail toko yang dituju
$_SESSION['detail_toko'] = array('id_toko'=>$id_toko,'nama_toko'=>$nama_toko,'kota_toko'=>$kota_toko);

if (isset($_SESSION['toko'][$id_toko])) {
	//cek jika barang yang dibeli sudah pernah dipilih
	if (isset($_SESSION['keranjang'][$id_toko][$id_detail])) {
		$_SESSION['keranjang'][$id_toko][$id_detail]['jumlah_dibeli'] += 1;
	}else{
		$_SESSION['keranjang'][$id_toko][$id_detail] = $_SESSION['detail_banten'];
		$_SESSION['jumlahitemtoko'][$id_toko]++; // karena jenis item di toko tersebut berbeda, artinya untuk toko tersebut ada x+1 item yang dibeli
	}
}else{
	//buat session detail_toko
	$_SESSION['toko'][$id_toko] = $_SESSION['detail_toko'];
	//buat session untuk barang yang dibeli
	$_SESSION['keranjang'][$id_toko][$id_detail] = $_SESSION['detail_banten'];
	//buat session untuk jumlah barang yang masih ada di setiap tokonya
	$_SESSION['jumlahitemtoko'][$id_toko] = 1;
}
header('Location:index.php?page=Keranjang');
exit;
?>