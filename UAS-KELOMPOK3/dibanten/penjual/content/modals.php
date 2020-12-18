<?php
include '../../config/class.php';
//Modal Edit Ongkir Wilayah Pengiriman
if (isset($_POST['id_ongkirSelected'])) {
	$id_ongkirSelected = $_POST['id_ongkirSelected'];
	$getData = $objOngkir->getDataOngkirJoinWilayahById($id_ongkirSelected);
	echo json_encode($getData);//mengembalikan datatype json karena di ajax datatype bertipe json
}elseif (isset($_POST['id_bantenSelected'])) {
		// Modal edit etalase banten
	$id_bantenSelected = $_POST['id_bantenSelected'];
	$getDataBantenSelected = $objBanten->getSpesificDataBantenByIdBanten($id_bantenSelected);
	echo json_encode($getDataBantenSelected);
}elseif (isset($_POST['id_detailSelected'])) {
		//Modal edit detail banten
	$id_detailSelected = $_POST['id_detailSelected'];
	$getDataDetailBantenSelected = $objDetailBanten->getSpesificDataDetailBanten($id_detailSelected);
	echo json_encode($getDataDetailBantenSelected);
}elseif (isset($_POST['id_tingkatanChoosed']) && isset($_POST['id_bantenChoosed'])) {
		// Alert Message ketika tingkatan banten detail yang dipilih sudah ada
	$id_bantenChoosed = $_POST['id_bantenChoosed'];
	$id_tingkatanChoosed = $_POST['id_tingkatanChoosed'];
	$ifisset = $objDetailBanten->ifAlreadyIdTingkatan($id_bantenChoosed,$id_tingkatanChoosed);
	echo json_encode($ifisset);
}elseif (isset($_POST['password_lamaChecked']) && isset($_POST['id_penjualProfile'])) {
	//mengecek pada bagian profile jika ada yang ingin mengubah password dan mengecek password lama dari database
	$id_penjual = $_POST['id_penjualProfile'];
	$password_lama = $_POST['password_lamaChecked'];
	$isSamePassword =  $objPenjual->verifyPassword($password_lama,$id_penjual);//return 1 if true and 0 if false
	echo json_encode($isSamePassword);
}elseif (isset($_POST['btnKonfirmasiPembayaranPembeli'])) {
	$id_pembelian = $_POST['id_pembelian'];
	$data_pembayaran = array();
	//query from pembayaran sesuai dengan id_pembelian
	$runQueryGetAllPembayaranByPembelian = $objPembayaran->getAllPembayaranByPembelian($id_pembelian);
	while ($pembayaran = $runQueryGetAllPembayaranByPembelian->fetch_assoc()) {
	array_push($data_pembayaran, $pembayaran);   
	}
	echo json_encode($data_pembayaran);
}elseif (isset($_POST['btnKonfirmasiPesananPembeli'])) {
	
}
?>



