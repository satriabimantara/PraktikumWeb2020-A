<?php
require_once 'headerdashboard.php';
//get data modal konfirmasi pembayaran from headerdashboard ketika btnSubmitKonfirmasiPembayaran ditekan
if (isset($_POST['btnSubmitKonfirmasiPembayaran'])) {
	$data_pembayaran = array();
	$data_pembayaran['idpembelian_pembayaran'] = $_POST['idpembelian_dibayar'];
	$data_pembayaran['namapembayar_pembayaran'] = $_POST['namapembayar_pembayaran'];
	$data_pembayaran['bank_pembayaran'] = $_POST['bank_pembayaran'];
	$data_pembayaran['nomorrekening_pembayaran'] = $_POST['nomorrekening_pembayaran'];
	$data_pembayaran['tanggalbayar_pembayaran'] = date("Y-m-d");
	$data_pembayaran['buktitransfer_pembayaran'] = $_FILES['buktitransfer_pembayaran'];
	list($pesanKesalahan,$runQueryUploadBuktiPembayaran) = $objPembayaran->uploadBuktiPembayaran($data_pembayaran);
	if ($pesanKesalahan == null && $runQueryUploadBuktiPembayaran == true) {
		//trigger after insert di tabel pembayaran, maka update tabel pembelian ubah status pembeliannya menjadi sudah kirim pembayaran
		$column_set = ["status_pembelian","tanggalkonfirmasi_pembelian"];
		$value_set = ["Upload Pembayaran", date("Y-m-d")];
		$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($data_pembayaran['idpembelian_pembayaran'],$column_set,$value_set);
		if ($runQueryUpdateSpesificPembelian==true) {
			$objFlash->showSimpleFlash("BERHASIL UPLOAD BUKTI TRANSFER","success","Pembayaran telah berhasil dilakukan. Tunggu Konfirmasi dari penjual!","index.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
		}else{
			$objFlash->showSimpleFlash("TRIGGER ERROR","warning","Terjadi kesalahan!","index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
		}
	}else{
		$pesanKesalahan = $objUtil->arrangeErrorMessage($pesanKesalahan);
		$objFlash->showSimpleFlash("GAGAL UPLOAD BUKTI TRANSFER","warning",$pesanKesalahan,"index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
	}
}

?>