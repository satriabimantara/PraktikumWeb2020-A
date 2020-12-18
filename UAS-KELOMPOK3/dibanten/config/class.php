<?php 
// Include file init
include 'init.php';

class Penjual
{
	private $koneksi;
	private $objUtil;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi; 
		$this->objUtil = new Utilities();
	}
	function verifyPassword($password_lamaChecked,$id_penjual){
		$isSamePassword = 0;
		$queryVerifyPassword = "SELECT password_penjual FROM penjual WHERE id_penjual = '$id_penjual'";
		$runQueryVerifyPassword = $this->koneksi->query($queryVerifyPassword);
		$getData = $runQueryVerifyPassword->fetch_assoc();
		$password_penjual = $getData['password_penjual'];
		if (password_verify($password_lamaChecked, $password_penjual)) {
			$isSamePassword = 1;
		}
		return $isSamePassword;
	}
	function updatePasswordPenjual($password_baru,$id_penjual){
		$queryUpdatePasswordPenjual = "UPDATE penjual SET password_penjual = '$password_baru' WHERE id_penjual = '$id_penjual'";
		$runQueryUpdatePasswordPenjual = $this->koneksi->query($queryUpdatePasswordPenjual);
		return $runQueryUpdatePasswordPenjual;
	}
	function loginVerifyPenjual($username_penjual,$password_penjual){
		global $koneksi;
		//method untuk mendapatkan data penjual saat login
		$queryGetDataPenjual = "SELECT * FROM penjual p INNER JOIN bank b USING(id_bank)  WHERE username_penjual = '$username_penjual'";
		$runQuery = $koneksi->query($queryGetDataPenjual);
		$data = $runQuery->fetch_assoc();
		$pesan ="";
		//cek jika ada data dengan username yang diinputkan user
		if ($runQuery->num_rows>0 ) {
			if (password_verify($password_penjual, $data['password_penjual'])) {
				//password sama
				$pesan = 1;
			}else{
				//password tidak sama
				$pesan = "Password yang Anda masukan salah!";
			}
		}else{
			//tidak ditemukan tidak usah return beri alert
			$pesan = "Tidak ditemukan Akun tersebut, silahkan daftar terlebih dahulu!";
		}
		return array($pesan,$data);
	}
	function verifySameAccountPenjual($username_penjual,$email_penjual){
		$queryGetAkunIfAny = "SELECT id_penjual FROM penjual WHERE username_penjual = '$username_penjual' OR email_penjual = '$email_penjual'";
		$runQuery = $this->koneksi->query($queryGetAkunIfAny);
		$getData = $runQuery->fetch_assoc();
		$ifAnyAccountBefore = $getData['id_penjual'];
		return $ifAnyAccountBefore;
	}
	function registerNewPenjual($namadepan_penjual,$namabelakang_penjual,$email_penjual,$hp_penjual,$username_penjual,$password_penjual,$id_bank,$rekening_penjual){
		global $koneksi;
		$pesanKesalahan = null;
		$runQuery=null;
		//verify same account before register
		$ifAnyAccountBefore = $this->verifySameAccountPenjual($username_penjual,$email_penjual);
		if ($ifAnyAccountBefore == NULL) {
			$queryInsertNewPenjual = "INSERT INTO penjual (namadepan_penjual,namabelakang_penjual,email_penjual,hp_penjual,username_penjual,password_penjual,id_bank,rekening_penjual) VALUES('$namadepan_penjual','$namabelakang_penjual','$email_penjual','$hp_penjual','$username_penjual','$password_penjual','$id_bank','$rekening_penjual')";
			$runQuery = $koneksi->query($queryInsertNewPenjual);
		}else{
			$pesanKesalahan = "Akun dengan username/email tersebut sudah terdaftar";
		}
		return array($pesanKesalahan,$runQuery);
	}
	
	function getAllDataPenjual(){
		global $koneksi;
		$queryGetAllDataPenjual = "SELECT * FROM penjual";
		$runQueryGetAllPenjual = $koneksi->query($queryGetAllDataPenjual);
		return $runQueryGetAllPenjual;
	}
	function getSpesificPenjual($id_penjual){
		global $koneksi;
		$queryGetSpesificPenjualBaseOnId = "SELECT * FROM penjual INNER JOIN bank b USING(id_bank) WHERE id_penjual = '$id_penjual'";
		$queryGetSpesificPenjualBaseOnId = $koneksi->query($queryGetSpesificPenjualBaseOnId);
		$getData = $queryGetSpesificPenjualBaseOnId->fetch_assoc();
		return $getData;
	}
	function loadSessionLoginPenjual($id_penjual){
		global $koneksi;
		$queryGetSpesificPenjualBaseOnId = "SELECT * FROM penjual p INNER JOIN bank b USING (id_bank) WHERE id_penjual = '$id_penjual'";
		$queryGetSpesificPenjualBaseOnId = $koneksi->query($queryGetSpesificPenjualBaseOnId);
		$getData = $queryGetSpesificPenjualBaseOnId->fetch_assoc();
		return $getData;
	}
	function updateDataPenjual($penjual){
		$id_penjual = $penjual['id_penjual'];
		$namadepan_penjual = $penjual['namadepan_penjual'];
		$namabelakang_penjual = $penjual['namabelakang_penjual'];
		$hp_penjual = $penjual['hp_penjual'];
		$rekening_penjual = $penjual['rekening_penjual'];
		$username_penjual = $penjual['username_penjual'];
		$attrFotoPenjual = $penjual['foto_penjual'];
		$id_bank = $penjual['id_bank'];
		$uploadError = false;
		$pesanKesalahan = null;
		$runQueryUpdatePenjual = null;
		//cek apakah user mengupload foto baru atau tidak, caranya dengan mengecek nilai error dari _FILES
		if (isset($attrFotoPenjual['name'])) {
				//berarti user mengupload foto baru, sehingga sesuaikan nama foto yang akan diedit dan upload ke folder imgbanten
			$url = "../../assets/imgpenjual/";
			list($uploadError,$pesanKesalahan,$nama_foto) = $this->objUtil->uploadNewImage($attrFotoPenjual,$url);
			$foto_penjual = $nama_foto;
		}else{
			$foto_penjual = $attrFotoPenjual;
		}
		//cek jika tidak ada error
		if ($uploadError==false) {
			//update data penjual
			$queryUpdateDataPenjual = "UPDATE penjual SET namadepan_penjual = '$namadepan_penjual', namabelakang_penjual = '$namabelakang_penjual', hp_penjual = '$hp_penjual', foto_penjual = '$foto_penjual', username_penjual = '$username_penjual', id_bank='$id_bank' , rekening_penjual='$rekening_penjual' WHERE id_penjual = $id_penjual";
			$runQueryUpdatePenjual=$this->koneksi->query($queryUpdateDataPenjual);
		//perbarui $_SESSION['penjual'] dengan data yang baru
			$_SESSION['penjual'] = $this->loadSessionLoginPenjual($id_penjual);
		}
		
		return array($runQueryUpdatePenjual,$pesanKesalahan);
	}
	function setIdTokoPenjual($newIdToko,$id_penjual){
		global $koneksi;
		$id_toko = $newIdToko;
		$queryUpdateNewIdTokoAfterInsertNewToko = "UPDATE penjual SET id_toko = '$id_toko' WHERE id_penjual = '$id_penjual' ";
		$runqueryUpdateNewIdTokoAfterInsertNewToko = $koneksi->query($queryUpdateNewIdTokoAfterInsertNewToko);
		return $runqueryUpdateNewIdTokoAfterInsertNewToko;
	}
	function getDataPenjualAndBankByIdToko($id_toko){
		$queryGetDataPenjualAndBankByIdToko = "SELECT * FROM penjual INNER JOIN bank USING(id_bank) WHERE penjual.id_toko = '$id_toko'";
		$runqueryGetDataPenjualAndBankByIdToko = $this->koneksi->query($queryGetDataPenjualAndBankByIdToko);
		return $runqueryGetDataPenjualAndBankByIdToko;
	}
	function getWalletPenjual($id_penjual){
		$queryGetWalletPenjual = "SELECT dompet_penjual FROM penjual WHERE id_penjual ='$id_penjual'";
		$runqueryGetWalletPenjual = $this->koneksi->query($queryGetWalletPenjual);
		while ($data = $runqueryGetWalletPenjual->fetch_assoc()) {
			$wallet = $data['dompet_penjual'];
		}
		return $wallet;
	}
	function updateWalletPenjual($id_penjual,$totalharga_pembayaran){
		$queryUpdateWalletPenjual = "UPDATE penjual SET dompet_penjual = '$totalharga_pembayaran' WHERE id_penjual='$id_penjual'";
		$runqueryUpdateWalletPenjual = $this->koneksi->query($queryUpdateWalletPenjual);
		return $runqueryUpdateWalletPenjual;
	}
	
}
class Pembayaran{
	private $koneksi;
	private $objUtil;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
		$this->objUtil = new Utilities();
	}
	function getAllPembayaranByPembelian($id_pembelian){
		$queryGetAllPembayaranByPembelian = "SELECT * FROM pembayaran INNER JOIN pembelian ON pembayaran.idpembelian_pembayaran = pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'";
		$runQueryGetAllPembayaranByPembelian = $this->koneksi->query($queryGetAllPembayaranByPembelian);
		return $runQueryGetAllPembayaranByPembelian;
	}
	function updateSpecificPembayaran($id_pembelian,$column_set,$value_set){
		$queryUpdateSpecificPembayaran = "UPDATE pembayaran SET ";
		$temp = "";
		foreach ($column_set as $index_column => $column) {
			$temp .= "$column = '$value_set[$index_column]'";
			if ($index_column!=count($column_set)-1) {
				$temp.=", ";
			}
		}
		$queryUpdateSpecificPembayaran .= $temp;
		$queryUpdateSpecificPembayaran .= " WHERE idpembelian_pembayaran= '$id_pembelian'";
		$runqueryUpdateSpecificPembayaran = $this->koneksi->query($queryUpdateSpecificPembayaran);
		return $runqueryUpdateSpecificPembayaran;
	}
	function uploadBuktiPembayaran($data_pembayaran){
		//retrieve all data from parameter
		$idpembelian_pembayaran = $data_pembayaran['idpembelian_pembayaran'];
		$namapembayar_pembayaran = $data_pembayaran['namapembayar_pembayaran'] ;
		$bank_pembayaran = $data_pembayaran['bank_pembayaran'] ;
		$nomorrekening_pembayaran = $data_pembayaran['nomorrekening_pembayaran'] ;
		$tanggalbayar_pembayaran = $data_pembayaran['tanggalbayar_pembayaran'] ;
		$atrrBuktiTransfer = $data_pembayaran['buktitransfer_pembayaran'] ;
		$pesanKesalahan = null;
		$runQueryUploadBuktiPembayaran = null;
		$uploadError = false;
		//cek apakah user mengupload foto baru atau tidak, caranya dengan mengecek nilai error dari _FILES
		if ($atrrBuktiTransfer['error']!=4) {
			//berarti user mengupload foto baru, sehingga sesuaikan nama foto yang akan diedit dan upload ke folder imgbuktipembayaran
			$url = "../../assets/imgbuktipembayaran/";
			list($uploadError,$pesanKesalahan,$nama_foto) = $this->objUtil->uploadNewImage($atrrBuktiTransfer,$url);
			$buktitransfer_pembayaran = $nama_foto;
		}
		if ($uploadError==false) {
			$queryUploadBuktiPembayaran = "INSERT INTO pembayaran (idpembelian_pembayaran, namapembayar_pembayaran, bank_pembayaran, nomorrekening_pembayaran, tanggalbayar_pembayaran, buktitransfer_pembayaran) VALUES ('$idpembelian_pembayaran','$namapembayar_pembayaran','$bank_pembayaran','$nomorrekening_pembayaran','$tanggalbayar_pembayaran','$buktitransfer_pembayaran')";
			$runQueryUploadBuktiPembayaran = $this->koneksi->query($queryUploadBuktiPembayaran);
			if ($runQueryUploadBuktiPembayaran==true) {
			//update berhasil
			}else{
			//update gagal
				$pesanKesalahan = "Terjadi kesalahan saat mengupload bukti pembayaran!";
			}
		}
		return array($pesanKesalahan,$runQueryUploadBuktiPembayaran);
	}
}
class Status{
	private $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function getAllDataStatus(){
		$queryGetAllDataStatus = "SELECT * FROM status_pembelian";
		$runQueryGetAllDataStatus = $this->koneksi->query($queryGetAllDataStatus);
		$data_status = array();
		while ($status = $runQueryGetAllDataStatus->fetch_assoc()) {
			array_push($data_status, $status);
		}
		return $data_status;
	}
	function getStatusAllowedAfterPaidOff(){
		// Fungsi untuk memanggil status-status yang diperbolehkan ketika pembelian sudah lunas
		$queryGetAllDataStatus = "SELECT * FROM status_pembelian WHERE nama_status = 'Barang diproses' OR nama_status = 'Barang dikirim'";
		$runQueryGetAllDataStatus = $this->koneksi->query($queryGetAllDataStatus);
		$data_status = array();
		while ($status = $runQueryGetAllDataStatus->fetch_assoc()) {
			array_push($data_status, $status);
		}
		return $data_status;

	}

}
class Nota{
	private $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function getNotaToko($id_toko){
		$data_pembelian = array();
		$objPembelian = new Pembelian();
		//query get id_pembelian from pembelian berdasarkan id_toko
		$runqueryGetAllPembelianByToko = $objPembelian->getAllPembelianByToko($id_toko);
		while ($d_pembelian = $runqueryGetAllPembelianByToko->fetch_assoc()) {
			$id_pembelian = $d_pembelian['id_pembelian'];
			$data_pembelian[$id_pembelian] = array();
			$data_pembelian[$id_pembelian]['detail_pembeli'] = array();
			$data_pembelian[$id_pembelian]['detail_pembelian'] = array();
			//masukkan data identitas pembeli
			array_push($data_pembelian[$id_pembelian]['detail_pembeli'], $d_pembelian);

			 //Grouping belanjaan berdasarkan id_pembelian
			 //get detail_pembelian by id_pembelian
			$runqueryGetDetailPembelianByPembelian = $objPembelian->getDetailPembelianByPembelian($id_pembelian);
			while ($detail_pembelian = $runqueryGetDetailPembelianByPembelian->fetch_assoc()) {
				array_push($data_pembelian[$id_pembelian]['detail_pembelian'], $detail_pembelian);
			}
		}
		return $data_pembelian;
	}

	function getNotaPembeli($id_pembeli){
		$data_toko = array();
		$objPembelian = new Pembelian();
		//query get id_toko and GROUP BY per toko
		$queryGetIdToko = "SELECT p.idtoko_pembelian,dp.namatoko_dp,dp.kotatoko_dp FROM pembelian p INNER JOIN detail_pembelian dp USING(id_pembelian)  WHERE p.idpembeli_pembelian = '$id_pembeli' GROUP BY p.idtoko_pembelian";
		$runqueryGetIdToko = $this->koneksi->query($queryGetIdToko);
		while ($data = $runqueryGetIdToko->fetch_assoc()) {
			$id_toko = $data['idtoko_pembelian'];
			$data_toko[$id_toko] = array();
			$data_toko[$id_toko]['detail_toko'] = array();
			$data_toko[$id_toko]['detail_pembelian'] = array();
			//masukkan data identitas toko
			array_push($data_toko[$id_toko]['detail_toko'], $data);
			//Grouping belanjaan berdasarkan id_pembelian
			$runQueryGetAllIdPembelianByPembeli = $objPembelian->getAllIdPembelianByPembeli($id_pembeli);
			while ($data_id_pembelian = $runQueryGetAllIdPembelianByPembeli->fetch_assoc()) {
				$id_pembelian = $data_id_pembelian['id_pembelian'];
				$data_toko[$id_toko]['detail_pembelian'][$id_pembelian] = array();
				//get detail banten per toko per id_pembelian
				$runqueryGetDetailPembelianByTokoByPembelian = $objPembelian->getDetailPembelianByTokoByPembelian($id_toko,$id_pembelian);
				while ($data_pembelian = $runqueryGetDetailPembelianByTokoByPembelian->fetch_assoc()) {
					array_push($data_toko[$id_toko]['detail_pembelian'][$id_pembelian], $data_pembelian);
				}
			}
		}
		return $data_toko;
	}
}

class Pembelian{
	private $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function getAllIdPembelianByToko($id_toko){
		$queryGetAllIdPembelianByToko = "SELECT id_pembelian FROM pembelian WHERE idtoko_pembelian = '$id_toko'";
		$runqueryGetAllIdPembelianByToko = $this->koneksi->query($queryGetAllIdPembelianByToko);
		return $runqueryGetAllIdPembelianByToko;
	}
	function getAllIdPembelianByPembeli($id_pembeli){
		$queryGetAllIdPembelianByPembeli = "SELECT id_pembelian FROM pembelian WHERE idpembeli_pembelian = '$id_pembeli'";
		$runQueryGetAllIdPembelianByPembeli = $this->koneksi->query($queryGetAllIdPembelianByPembeli);
		return $runQueryGetAllIdPembelianByPembeli;
	}
	function getLaporanPembelianByDateAndStatus($date,$status){
		$tgl_mulai = $date['tgl_mulai'];
		$tgl_akhir = $date['tgl_akhir'];
		$queryGetLaporanPembelianByDateAndStatus = "SELECT * FROM pembelian WHERE (tanggalbeli_pembelian BETWEEN '$tgl_mulai' AND '$tgl_akhir') AND status_pembelian = '$status'";
		$runQueryGetLaporanPembelianByDateAndStatus = $this->koneksi->query($queryGetLaporanPembelianByDateAndStatus);
		return $runQueryGetLaporanPembelianByDateAndStatus;
	}
	function insertNewPembelian($data){
		$idpembeli_pembelian = $data['idpembeli_pembelian'];
		$idtoko_pembelian = $data['idtoko_pembelian'];
		$namapembeli_pembelian = $data['namapembeli_pembelian'];
		$emailpembeli_pembelian = $data['emailpembeli_pembelian'];
		$hppembeli_pembelian = $data['hppembeli_pembelian'];
		$alamatpengiriman_pembelian = $data['alamatpengiriman_pembelian'];
		$kodepospengiriman_pembelian = $data['kodepospengiriman_pembelian'];
		$kotapengiriman_pembelian = $data['kotapengiriman_pembelian'];
		$provinsipengiriman_pembelian = $data['provinsipengiriman_pembelian'];
		$tanggalkirim_pembelian = $data['tanggalkirim_pembelian'];
		$tanggalbeli_pembelian = $data['tanggalbeli_pembelian'];
		$tarifongkir_pembelian = $data['tarifongkir_pembelian'];
		$jasapengiriman_pembelian = $data['jasapengiriman_pembelian'];
		$totalharga_pembelian = $data['totalharga_pembelian'];

		$queryInsertNewPembelian = "INSERT INTO pembelian (idpembeli_pembelian,idtoko_pembelian,tanggalbeli_pembelian,tanggalkirim_pembelian,namapembeli_pembelian,hppembeli_pembelian,emailpembeli_pembelian,alamatpengiriman_pembelian,kodepospengiriman_pembelian,kotapengiriman_pembelian,provinsipengiriman_pembelian,tarifongkir_pembelian,totalharga_pembelian,jasapengiriman_pembelian) VALUES ('$idpembeli_pembelian','$idtoko_pembelian','$tanggalbeli_pembelian','$tanggalkirim_pembelian','$namapembeli_pembelian','$hppembeli_pembelian','$emailpembeli_pembelian','$alamatpengiriman_pembelian','$kodepospengiriman_pembelian','$kotapengiriman_pembelian','$provinsipengiriman_pembelian','$tarifongkir_pembelian','$totalharga_pembelian','$jasapengiriman_pembelian')";
		$runQueryInsertNewPembelian = $this->koneksi->query($queryInsertNewPembelian);
		$lastid_pembelian = $this->koneksi->insert_id;
		return $lastid_pembelian;
	}
	function insertNewDetailPembelian($data_dp){
		$id_detailpembelian = $data_dp['id_detailpembelian'];
		$id_pembelian = $data_dp['id_pembelian'];
		$hargajual_dp = $data_dp['hargajual_dp'];
		$diskon_dp = $data_dp['diskon_dp'];
		$hargadiskon_dp = $data_dp['hargadiskon_dp'];
		$quantity_dp = $data_dp['quantity_dp'];
		$namabanten_dp = $data_dp['namabanten_dp'];
		$tingkatanbanten_dp = $data_dp['tingkatanbanten_dp'];
		$kelengkapanbanten_dp = $data_dp['kelengkapanbanten_dp'];
		$deskripsibanten_dp = $data_dp['deskripsibanten_dp'];
		$kategoribanten_dp = $data_dp['kategoribanten_dp'];
		$namatoko_dp = $data_dp['namatoko_dp'];
		$alamattoko_dp = $data_dp['alamattoko_dp'];
		$kodepostoko_dp = $data_dp['kodepostoko_dp'];
		$kotatoko_dp = $data_dp['kotatoko_dp'];
		$provinsitoko_dp = $data_dp['provinsitoko_dp'];
		$catatanpemesanan_dp = $data_dp['catatanpemesanan_dp'];
		$queryInsertNewDetailPembelian = "INSERT INTO detail_pembelian (id_detailpembelian, id_pembelian, hargajual_dp, diskon_dp, hargadiskon_dp, quantity_dp, namabanten_dp, tingkatanbanten_dp, kelengkapanbanten_dp, deskripsibanten_dp, kategoribanten_dp, namatoko_dp, alamattoko_dp, kodepostoko_dp, kotatoko_dp, provinsitoko_dp, catatanpemesanan_dp) VALUES ('$id_detailpembelian','$id_pembelian','$hargajual_dp','$diskon_dp','$hargadiskon_dp','$quantity_dp','$namabanten_dp','$tingkatanbanten_dp','$kelengkapanbanten_dp','$deskripsibanten_dp','$kategoribanten_dp','$namatoko_dp','$alamattoko_dp','$kodepostoko_dp','$kotatoko_dp','$provinsitoko_dp','$catatanpemesanan_dp')";
		$runqueryInsertNewDetailPembelian = $this->koneksi->query($queryInsertNewDetailPembelian);
		return $runqueryInsertNewDetailPembelian;
	}
	function getDetailPembelianByPembelian($id_pembelian){
		$queryGetDetailPembelianByPembelian = "SELECT * FROM pembelian p INNER JOIN detail_pembelian dp USING (id_pembelian) INNER JOIN detailbanten db ON db.id_detail = dp.id_detailpembelian INNER JOIN banten USING (id_banten) WHERE p.id_pembelian = '$id_pembelian'";
		$runqueryGetDetailPembelianByPembelian = $this->koneksi->query($queryGetDetailPembelianByPembelian);
		return $runqueryGetDetailPembelianByPembelian;
	}
	function getDetailPembelianByToko($id_toko){
		$queryGetDetailPembelianByToko = "SELECT * FROM pembelian p INNER JOIN detail_pembelian dp USING (id_pembelian) INNER JOIN detailbanten db ON db.id_detail = dp.id_detailpembelian INNER JOIN banten USING (id_banten) WHERE p.idtoko_pembelian = '$id_toko'";
		$runQueryGetDetailPembelianByToko = $this->koneksi->query($queryGetDetailPembelianByToko);
		return $runQueryGetDetailPembelianByToko;
	}
	function getAllPembelianByToko($id_toko){
		$queryGetAllPembelianByToko = "SELECT * FROM pembelian WHERE idtoko_pembelian = '$id_toko' ";
		$runqueryGetAllPembelianByToko = $this->koneksi->query($queryGetAllPembelianByToko);
		return $runqueryGetAllPembelianByToko;
	}
	function getDetailPembelianByTokoByPembelian($id_toko,$id_pembelian){
		$queryGetDetailPembelianByTokoByPembelian = "SELECT * FROM pembelian p INNER JOIN detail_pembelian dp USING (id_pembelian) INNER JOIN detailbanten db ON db.id_detail = dp.id_detailpembelian INNER JOIN banten USING (id_banten) INNER JOIN penjual USING (id_toko) INNER JOIN bank USING (id_bank) WHERE p.idtoko_pembelian = '$id_toko' AND dp.id_pembelian = '$id_pembelian'";
		$runqueryGetDetailPembelianByTokoByPembelian = $this->koneksi->query($queryGetDetailPembelianByTokoByPembelian);
		return $runqueryGetDetailPembelianByTokoByPembelian;
	}
	function getAmountDetailPembelianPerToko($id_toko){
		$queryGetAmountDetailPembelianPerToko = "SELECT COUNT(*) AS 'amount_dp' FROM pembelian p INNER JOIN detail_pembelian dp USING (id_pembelian) WHERE p.idtoko_pembelian = '$id_toko'";
		$runqueryGetAmountDetailPembelianPerToko = $this->koneksi->query($queryGetAmountDetailPembelianPerToko);
		$data = $runqueryGetAmountDetailPembelianPerToko->fetch_assoc();
		$amountDetailPembelianPerToko = $data['amount_dp'];
		return $amountDetailPembelianPerToko;
	}
	function updateSpesificStatusPembelian($id_pembelian,$status_pembelian,$tanggalkonfirmasi_pembelian){
		$queryUpdateSpesificStatusPembelian = "UPDATE pembelian SET status_pembelian = '$status_pembelian', tanggalkonfirmasi_pembelian = '$tanggalkonfirmasi_pembelian' WHERE id_pembelian = '$id_pembelian'";
		$runqueryUpdateSpesificStatusPembelian = $this->koneksi->query($queryUpdateSpesificStatusPembelian);
		return $runqueryUpdateSpesificStatusPembelian;
	}
	function updateSpesificPembelian($id_pembelian,$column_set,$value_set){
		$queryUpdateSpesificPembelian = "UPDATE pembelian SET ";
		$temp = "";
		foreach ($column_set as $index_column => $column) {
			$temp .= "$column = '$value_set[$index_column]'";
			if ($index_column!=count($column_set)-1) {
				$temp.=", ";
			}
		}
		$queryUpdateSpesificPembelian .= $temp;
		$queryUpdateSpesificPembelian .= " WHERE id_pembelian= '$id_pembelian'";
		$runQueryUpdateSpesificPembelian = $this->koneksi->query($queryUpdateSpesificPembelian);
		return $runQueryUpdateSpesificPembelian;
	}
	function getSpesificDetailPembelian($id_pembelian){
		$queryGetSpesificDetailPembelian = "SELECT * FROM pembelian p INNER JOIN detail_pembelian dp USING (id_pembelian) INNER JOIN detailbanten db ON db.id_detail = dp.id_detailpembelian INNER JOIN banten USING (id_banten) INNER JOIN toko t ON t.id_toko = p.idtoko_pembelian WHERE p.id_pembelian = '$id_pembelian'";
		$runqueryGetSpesificDetailPembelian = $this->koneksi->query($queryGetSpesificDetailPembelian);
		$data_pembelian = array();
		while ($ambil = $runqueryGetSpesificDetailPembelian->fetch_assoc()) {
			array_push($data_pembelian, $ambil);
		}
		return $data_pembelian;
	}
	function getNotifikasiPembelian(){
		// Notifikasi Pembelian yang statusnya tidak pending dan tidak selesai
		$status1 = "pending";
		$status2 = "Selesai";
		$queryGetNotifikasiPembelian = "SELECT * FROM pembelian WHERE status_pembelian <>'$status1' AND status_pembelian <>'$status2'";
		$runQueryGetNotifikasiPembelian = $this->koneksi->query($queryGetNotifikasiPembelian);
		$jumlah_notifikasi = 0;
		while ($data = $runQueryGetNotifikasiPembelian->fetch_assoc()) {
			$jumlah_notifikasi += 1;
		}
		return $jumlah_notifikasi;

	}
}
class Pembeli{
	private $koneksi;
	private $objUtil;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
		$this->objUtil = new Utilities();
	}
	function verifySameAccountPembeli($username_pembeli,$email_pembeli){
		$queryGetAkunIfAny = "SELECT id_pembeli FROM pembeli WHERE username_pembeli = '$username_pembeli' OR email_pembeli = '$email_pembeli'";
		$runQuery = $this->koneksi->query($queryGetAkunIfAny);
		$getData = $runQuery->fetch_assoc();
		$ifAnyAccountBefore = $getData['id_pembeli'];
		return $ifAnyAccountBefore;
	}
	function verifyPassword($password_lamaChecked,$id_pembeli){
		$isSamePassword = 0;
		$queryVerifyPassword = "SELECT password_pembeli FROM pembeli WHERE id_pembeli = '$id_pembeli'";
		$runQueryVerifyPassword = $this->koneksi->query($queryVerifyPassword);
		$getData = $runQueryVerifyPassword->fetch_assoc();
		$password_pembeli = $getData['password_pembeli'];
		if (password_verify($password_lamaChecked, $password_pembeli)) {
			$isSamePassword = 1;
		}
		return $isSamePassword;
	}
	function updatePasswordPembeli($password_baru,$id_pembeli){
		$queryUpdatePasswordPembeli = "UPDATE pembeli SET password_pembeli = '$password_baru' WHERE id_pembeli = '$id_pembeli'";
		$runQueryUpdatePasswordPembeli = $this->koneksi->query($queryUpdatePasswordPembeli);
		return $runQueryUpdatePasswordPembeli;
	}
	function loadSessionLoginPembeli($id_pembeli){
		$queryGetSpesificPembeliBaseOnId = "SELECT * FROM pembeli WHERE id_pembeli = '$id_pembeli'";
		$queryGetSpesificPembeliBaseOnId = $this->koneksi->query($queryGetSpesificPembeliBaseOnId);
		$getData = $queryGetSpesificPembeliBaseOnId->fetch_assoc();
		return $getData;
	}
	function loginVerifyPembeli($username_pembeli,$password_pembeli){
		//method untuk mendapatkan data penjual saat login
		$queryGetDataPembeli = "SELECT * FROM pembeli WHERE username_pembeli = '$username_pembeli'";
		$runQuery = $this->koneksi->query($queryGetDataPembeli);
		$data = $runQuery->fetch_assoc();
		$pesan ="";
		//cek jika ada data dengan username yang diinputkan user
		if ($runQuery->num_rows>0 ) {
			if (password_verify($password_pembeli, $data['password_pembeli'])) {
				//password sama
				$pesan = 1;
			}else{
				//password tidak sama
				$pesan = "Password yang Anda masukan salah!";
			}
		}else{
			//tidak ditemukan tidak usah return beri alert
			$pesan = "Tidak ditemukan Akun tersebut, silahkan daftar terlebih dahulu!";
		}
		return array($pesan,$data);
	}
	function registerNewPembeli($attrPembeli){
		$namadepan_pembeli  = $attrPembeli['namadepan_pembeli'];
		$namabelakang_pembeli  = $attrPembeli['namabelakang_pembeli'];
		$email_pembeli  = $attrPembeli['email_pembeli'];
		$hp_pembeli  = $attrPembeli['hp_pembeli'];
		$password_pembeli  = $attrPembeli['password_pembeli'];
		$username_pembeli  = $attrPembeli['username_pembeli'];
		$alamat_pembeli  = $attrPembeli['alamat_pembeli'];
		$provinsi_pembeli  = $attrPembeli['provinsi_pembeli'];
		$kota_pembeli  = $attrPembeli['kota_pembeli'];
		$kodepos_pembeli  = $attrPembeli['kodepos_pembeli'];
		$uploadError = false;
		$pesanKesalahan = null;
		$runQuery = null;
		//verify same account before register
		$ifAnyAccountBefore = $this->verifySameAccountPembeli($username_pembeli,$email_pembeli);
		if ($ifAnyAccountBefore==NULL) {
			$queryInsertNewPembeli = "INSERT INTO pembeli (namadepan_pembeli,namabelakang_pembeli,email_pembeli,hp_pembeli,username_pembeli,password_pembeli,alamat_pembeli,provinsi_pembeli,kota_pembeli,kodepos_pembeli) VALUES('$namadepan_pembeli','$namabelakang_pembeli','$email_pembeli','$hp_pembeli','$username_pembeli','$password_pembeli','$alamat_pembeli','$provinsi_pembeli','$kota_pembeli','$kodepos_pembeli')";
			$runQuery = $this->koneksi->query($queryInsertNewPembeli);
		}else{
			$pesanKesalahan = "Akun dengan username/email tersebut sudah terdaftar";
		}
		return array($pesanKesalahan,$runQuery);
	}
	function updateDataPembeli($penjual){
		$id_pembeli = $penjual['id_pembeli'];
		$namadepan_pembeli = $penjual['namadepan_pembeli'];
		$namabelakang_pembeli = $penjual['namabelakang_pembeli'];
		$hp_pembeli = $penjual['hp_pembeli'];
		$username_pembeli = $penjual['username_pembeli'];
		$alamat_pembeli = $penjual['alamat_pembeli'];
		$provinsi_pembeli = $penjual['provinsi_pembeli'];
		$kota_pembeli = $penjual['kota_pembeli'];
		$kodepos_pembeli = $penjual['kodepos_pembeli'];
		$attrFotoPembeli = $penjual['foto_pembeli'];
		
		$uploadError = false;
		$pesanKesalahan = null;
		$runQueryUpdateDataPembeli = null;
		//cek apakah user mengupload foto baru atau tidak, caranya dengan mengecek nilai error dari _FILES
		if (isset($attrFotoPembeli['name'])) {
			//berarti user mengupload foto baru, sehingga sesuaikan nama foto yang akan diedit dan upload ke folder imgbanten
			$url = "../../assets/imgpembeli/";
			list($uploadError,$pesanKesalahan,$nama_foto) = $this->objUtil->uploadNewImage($attrFotoPembeli,$url);
			$foto_pembeli = $nama_foto;
		}else{
			$foto_pembeli = $attrFotoPembeli;
		}

		//cek jika tidak ada error
		if ($uploadError==false) {
			//update data penjual
			$queryUpdateDataPembeli = "UPDATE pembeli SET namadepan_pembeli = '$namadepan_pembeli', namabelakang_pembeli = '$namabelakang_pembeli', hp_pembeli = '$hp_pembeli', foto_pembeli = '$foto_pembeli', username_pembeli = '$username_pembeli', alamat_pembeli = '$alamat_pembeli', provinsi_pembeli = '$provinsi_pembeli', kota_pembeli = '$kota_pembeli', kodepos_pembeli = '$kodepos_pembeli' WHERE id_pembeli = $id_pembeli";
			$runQueryUpdateDataPembeli=$this->koneksi->query($queryUpdateDataPembeli);
		//perbarui $_SESSION['pembeli'] dengan data yang baru
			$_SESSION['pembeli'] = $this->loadSessionLoginPembeli($id_pembeli);
		}
		return array($runQueryUpdateDataPembeli,$pesanKesalahan);
	}
}
class Bank{
	private $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function getAllDataBank(){
		$queryGetBankInfo = "SELECT * FROM bank";
		$runQuery = $this->koneksi->query($queryGetBankInfo);
		return $runQuery;
	}
	function getAllBankNotSelect($id_bank){
		global $koneksi;
		$queryGetBankInfo = "SELECT * FROM bank WHERE id_bank<>'$id_bank'";
		$runQuery = $koneksi->query($queryGetBankInfo);
		return $runQuery;
	}
}
class Wilayah{
	private $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function getAllDataWilayah(){
		global $koneksi;
		$queryGetAllDataWilayah = "SELECT * FROM wilayah";
		$runQueryGetAllDataWilayah = $koneksi->query($queryGetAllDataWilayah);
		return $runQueryGetAllDataWilayah;
	}
	function getAllWilayahNotSelect($id_wilayah){
		global $koneksi;
		$queryGetWilayahInfo = "SELECT * FROM wilayah WHERE id_wilayah <>'$id_wilayah'";
		$runQuery = $koneksi->query($queryGetWilayahInfo);
		return $runQuery;
	}
	function getAllKotaWilayah(){
		$queryGetAllKotaWilayah = "SELECT kota_wilayah FROM wilayah";
		$runQueryGetAllKotaWilayah = $this->koneksi->query($queryGetAllKotaWilayah);
		return $runQueryGetAllKotaWilayah;
	}

}

/**
 * Toko
 */
class Toko
{
	private $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function updateInformasiToko($attrToko){
		global $koneksi;
		$id_toko = $attrToko['id_toko'];
		$nama_toko = $attrToko['nama_toko'] ;
		$alamat_toko = $attrToko['alamat_toko'] ;
		$kodepos_toko = $attrToko['kodepos_toko'] ;
		$provinsi_toko = $attrToko['provinsi_toko'] ;
		$deskripsi_toko = $attrToko['deskripsi_toko'] ;
		$catatan_toko = $attrToko['catatan_toko'];
		$attrFotoToko = $attrToko['foto_toko'];
		$id_wilayah = $attrToko['id_wilayah'] ;
		$kota_toko = $attrToko['kota_toko'];
		$uploadError = false;
		$pesanKesalahan = null;

		//cek apakah user mengupload foto baru atau tidak, caranya dengan mengecek nilai error dari _FILES
		if (isset($attrToko['error'])) {
			if ($attrFotoToko['error']!=4) {
				$objUtil = new Utilities();
				//berarti user mengupload foto baru, sehingga sesuaikan nama foto yang akan diedit dan upload ke folder imgbanten
				$url = "../../assets/imgtoko/";
				list($uploadError,$pesanKesalahan,$nama_foto) = $objUtil->uploadNewImage($attrFotoToko,$url);
				$foto_toko = $nama_foto;
			$foto_toko = $foto_toko['name'];
			}
		}else{
			$foto_toko = $attrFotoToko;
		}
		if ($uploadError==false) {
			$queryUpdateInformasiToko = "UPDATE toko SET nama_toko = '$nama_toko', alamat_toko = '$alamat_toko', kodepos_toko = '$kodepos_toko', provinsi_toko = '$provinsi_toko', foto_toko = '$foto_toko', deskripsi_toko = '$deskripsi_toko', catatan_toko='$catatan_toko' , id_wilayah='$id_wilayah',kota_toko='$kota_toko' WHERE id_toko = $id_toko";
			$runQueryUpdateInformasiToko=$this->koneksi->query($queryUpdateInformasiToko);
		}
		return array($pesanKesalahan,$runQueryUpdateInformasiToko);
	}
	
	function insertNewToko($attrToko)
	{
		global $koneksi;
		$id_penjual = $attrToko['id_penjual'];
		$nama_toko = $attrToko['nama_toko'] ;
		$alamat_toko = $attrToko['alamat_toko'] ;
		$kodepos_toko = $attrToko['kodepos_toko'] ;
		$provinsi_toko = $attrToko['provinsi_toko'] ;
		$deskripsi_toko = $attrToko['deskripsi_toko'] ;
		$catatan_toko = $attrToko['catatan_toko'];
		$attrFotoToko = $attrToko['foto_toko'];
		$id_wilayah = $attrToko['id_wilayah'] ;
		$kota_toko = $attrToko['kota_toko'];

		$uploadError = false;
		$pesanKesalahan = null;
		//diupload foto baru
		//cek apakah user mengupload foto baru atau tidak, caranya dengan mengecek nilai error dari _FILES
		if ($attrFotoToko['error']!=4) {
			$objUtil = new Utilities();
				//berarti user mengupload foto baru, sehingga sesuaikan nama foto yang akan diedit dan upload ke folder imgbanten
			$url = "../../assets/imgtoko/";
			list($uploadError,$pesanKesalahan,$nama_foto) = $objUtil->uploadNewImage($attrFotoToko,$url);
			$foto_toko = $nama_foto;
		}
		if ($uploadError==false ) {
			//query insert a new toko
			$queryInsertNewToko = "INSERT INTO toko (nama_toko,alamat_toko,kodepos_toko,provinsi_toko,deskripsi_toko,catatan_toko,foto_toko,id_wilayah,kota_toko) VALUES ('$nama_toko','$alamat_toko','$kodepos_toko','$provinsi_toko','$deskripsi_toko','$catatan_toko','$foto_toko','$id_wilayah','$kota_toko')";
			$runQueryInsertNewToko = $koneksi->query($queryInsertNewToko);
			if ($runQueryInsertNewToko==true) {
				$id_toko = $koneksi->insert_id;
				//berhasil dan update id_toko penjual yang bersangkutan
				//instansiasi objek penjual
				$objPenjual = new Penjual();
				$numRowsAfterUpdateIdToko = $objPenjual->setIdTokoPenjual($id_toko,$id_penjual);
				if ($numRowsAfterUpdateIdToko>0) {
					//berhasil update id_toko dan insert toko baru
					//perbarui $_SESSION['penjual'] dengan data yang baru
					$_SESSION['penjual'] = $objPenjual->loadSessionLoginPenjual($id_penjual);
				}else{
					//gagal update id_toko
					$pesanKesalahan = "Gagal melakukan pembaharuan penjual!";
				}
			}else{
				$pesanKesalahan = "Gagal melakukan registrasi toko penjual!";
			}
		}
		return array($pesanKesalahan,$runQueryInsertNewToko);
	}
	function getSpesificDataToko($id_toko){
		global $koneksi;
		$queryGetSpesificDataToko = "SELECT * FROM toko WHERE id_toko = '$id_toko'";
		$runQueryGetSpesificDataToko = $koneksi->query($queryGetSpesificDataToko);
		$dataToko = $runQueryGetSpesificDataToko->fetch_assoc();
		return $dataToko;
	}
	function updateRatingToko($id_toko,$rating_toko){
		global $koneksi;
		$queryUpdateRatingToko = "UPDATE toko SET rating_toko = '$rating_toko' WHERE id_toko = '$id_toko'";
		$runqueryUpdateRatingToko = $koneksi->query($queryUpdateRatingToko);
		return $runqueryUpdateRatingToko;
	}

}
class Ongkir{

	function checkSameOngkir($id_toko,$id_wilayah){
		global $koneksi;
		$queryCheckIsThereOngkir = "SELECT * FROM ongkir WHERE id_toko = '$id_toko' AND id_wilayah = '$id_wilayah'";
		$runqueryCheckIsThereOngkir = $koneksi->query($queryCheckIsThereOngkir);
		return $runqueryCheckIsThereOngkir;
	}
	function deleteOngkirById($id_ongkir){
		global $koneksi;
		$queryDeleteOngkirById = "DELETE FROM ongkir WHERE id_ongkir = '$id_ongkir'";
		$runqueryDeleteOngkirById = $koneksi->query($queryDeleteOngkirById);
		return $runqueryDeleteOngkirById;
	}
	function updateDataOngkir($attrOngkir){
		global $koneksi;
		$id_ongkir = $attrOngkir['id_ongkir'];
		$id_toko = $attrOngkir['id_toko'];
		$id_wilayah = $attrOngkir['id_wilayah'] ;
		$id_wilayahLama = $attrOngkir['id_wilayahLama'];
		$harga_ongkir = $attrOngkir['harga_ongkir'] ;
		$pesanKesalahan = null;
		$runQueryUpdateDataOngkir = null;
		//cek dulu jika id_wilayah yang dipilh sudah ada daftar harga ongkirnya maka jangan update
		if ($id_wilayahLama != $id_wilayah) {
			$getData = $this->checkSameOngkir($id_toko,$id_wilayah);
		}
		if ($getData->num_rows>0){
			$pesanKesalahan = "Tarif pengiriman wilayah tersebut sudah ada!";
		}else{
			$queryUpdateDataOngkir= "UPDATE ongkir SET id_wilayah = '$id_wilayah',harga_ongkir = '$harga_ongkir' WHERE id_ongkir = '$id_ongkir'";
			$runQueryUpdateDataOngkir = $koneksi->query($queryUpdateDataOngkir);
			if ($runQueryUpdateDataOngkir==true) {
			//update berhasil
			}else{
			//update gagal
				$pesanKesalahan = "Terjadi kesalahan saat perbarui data!";
			}
		}
		return array($pesanKesalahan,$runQueryUpdateDataOngkir);
	}
	function insertNewOngkir($attrOngkir){
		global $koneksi;
		$id_toko = $attrOngkir['id_toko'];
		$id_wilayah = $attrOngkir['id_wilayah'] ;
		$harga_ongkir = $attrOngkir['harga_ongkir'] ;
		$pesanKesalahan = null;
		$runQueryInsertNewOngkir=null;
		//cek dulu apakah ongkir dengan id_wilayah tersebut sudah ditetapkan atau belum. Jika sudah beri alert kalau ongkir sudah ada dan sebaliknya jika belum maka boleh menginputkan data ongkir baru
		//check jika ongkir sudah ada dengan wilayah dan id toko trsbut
		$getData = $this->checkSameOngkir($id_toko,$id_wilayah);
		if ($getData->num_rows>0) {
			//ada data yang sama dan tidak bisa ongkir
			$pesanKesalahan = "Tarif pengiriman wilayah tersebut sudah ada!";
		}else{
			$queryInsertNewOngkir = "INSERT INTO ongkir (id_wilayah,id_toko,harga_ongkir) VALUES ('$id_wilayah','$id_toko','$harga_ongkir')";
			$runQueryInsertNewOngkir = $koneksi->query($queryInsertNewOngkir);
		}
		return array($pesanKesalahan,$runQueryInsertNewOngkir);
	}
	function getAllDataOngkirBaseOnToko($id_toko){
		global $koneksi;
		$queryGetAllDataOngkirBaseOnToko = "SELECT * FROM ongkir INNER JOIN wilayah USING(id_wilayah) WHERE id_toko = '$id_toko'";
		$runqueryGetAllDataOngkirBaseOnToko = $koneksi->query($queryGetAllDataOngkirBaseOnToko);
		return $runqueryGetAllDataOngkirBaseOnToko;
	}
	public function selectDataOngkirById($id_ongkir){
		global $koneksi;
		$queryGetDataOngkirById="SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'";
		$runQuery = $koneksi->query($queryGetDataOngkirById);
		$data = $runQuery->fetch_assoc();
		return $data;
	}
	//fungsi untuk mencari nilai dari suatu kolom spesifik
	function selectColumnAtrributeValue($columnName,$primaryKey){
		global $koneksi;
		$query = "SELECT $columnName FROM ongkir WHERE id_ongkir = '$primaryKey'";
		$runQuery = $koneksi->query($query);
		$columnValue = $runQuery->fetch_assoc();
		return $columnValue;
	}
	function getDataOngkirJoinWilayahById($id_ongkir){
		global $koneksi;
		$query = "SELECT * FROM ongkir o INNER JOIN wilayah w USING(id_wilayah) WHERE id_ongkir = '$id_ongkir'";
		$runQuery = $koneksi->query($query);
		$getData = $runQuery->fetch_assoc();
		return $getData;
	}
}
class Kategoribanten{
	function getAllDataKategoriBanten(){
		global $koneksi;
		$queryGetAllDataKategoriBanten = "SELECT * FROM kategoribanten";
		$runQueryGetAllDataKategoriBanten = $koneksi->query($queryGetAllDataKategoriBanten);
		return $runQueryGetAllDataKategoriBanten;
	}
}
class Tingkatanbanten{
	function getAllDataTingkatanBanten(){
		global $koneksi;
		$queryGetAllDataTingkatanBanten = "SELECT id_tingkatan,nama_tingkatan FROM tingkatanbanten";
		$runQueryGetAllDataTingkatanBanten = $koneksi->query($queryGetAllDataTingkatanBanten);
		return $runQueryGetAllDataTingkatanBanten;
	}
}
class Detailbanten{
	public $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function getAllDataDetailBantenByKategori($kategoriSelected){
		if ($kategoriSelected == "Semua Kategori") {
			//run query untuk load semua kategori
			$runQueryGetAllDataDetailBantenByKategori = $this->getAllDataDetailBanten();
		}else{
			$queryGetAllDataDetailBantenByKategori = "SELECT * FROM detailbanten db INNER JOIN tingkatanbanten tb USING (id_tingkatan) INNER JOIN banten b USING(id_banten) INNER JOIN toko USING (id_toko) INNER  JOIN wilayah USING(id_wilayah) INNER JOIN kategoribanten USING(id_kategori) WHERE b.id_kategori = '$kategoriSelected'";
			$runQueryGetAllDataDetailBantenByKategori = $this->koneksi->query($queryGetAllDataDetailBantenByKategori);
		}
		return $runQueryGetAllDataDetailBantenByKategori;
	}
	function getAllDataDetailBantenBySearch($search){
		$querygetAllDataDetailBantenBySearch = "SELECT * FROM detailbanten db INNER JOIN tingkatanbanten tb USING (id_tingkatan) INNER JOIN banten b USING(id_banten) INNER JOIN toko USING (id_toko) INNER  JOIN wilayah USING(id_wilayah) INNER JOIN kategoribanten USING(id_kategori) WHERE b.nama_banten LIKE '%$search%'";
		$runQuerygetAllDataDetailBantenBySearch = $this->koneksi->query($querygetAllDataDetailBantenBySearch);
		return $runQuerygetAllDataDetailBantenBySearch;
	}
	function getAllDataDetailBantenByKategoriAndSearch($kategoriSelected,$search){
		if ($kategoriSelected == "Semua Kategori") {
			//run query untuk load semua kategori
			$querygetAllDataDetailBantenByKategoriAndSearch = "SELECT * FROM detailbanten db INNER JOIN tingkatanbanten tb USING (id_tingkatan) INNER JOIN banten b USING(id_banten) INNER JOIN toko USING (id_toko) INNER  JOIN wilayah USING(id_wilayah) INNER JOIN kategoribanten USING(id_kategori) WHERE b.nama_banten LIKE '%$search%'";
			$runquerygetAllDataDetailBantenByKategoriAndSearch = $this->koneksi->query($querygetAllDataDetailBantenByKategoriAndSearch);
		}else{
			$querygetAllDataDetailBantenByKategoriAndSearch = "SELECT * FROM detailbanten db INNER JOIN tingkatanbanten tb USING (id_tingkatan) INNER JOIN banten b USING(id_banten) INNER JOIN toko USING (id_toko) INNER  JOIN wilayah USING(id_wilayah) INNER JOIN kategoribanten USING(id_kategori) WHERE b.id_kategori = '$kategoriSelected' && b.nama_banten LIKE '%$search%'";
			$runquerygetAllDataDetailBantenByKategoriAndSearch = $this->koneksi->query($querygetAllDataDetailBantenByKategoriAndSearch);
		}
		return $runquerygetAllDataDetailBantenByKategoriAndSearch;
	}
	function getAllDataDetailBanten(){
		$queryGetAllDataDetailBanten = "SELECT * FROM detailbanten db INNER JOIN tingkatanbanten tb USING(id_tingkatan) INNER JOIN banten b USING(id_banten) INNER JOIN toko  USING(id_toko) INNER JOIN wilayah USING(id_wilayah) INNER JOIN kategoribanten USING(id_kategori)";
		$runQueryGetAllDataDetailBanten = $this->koneksi->query($queryGetAllDataDetailBanten);
		return $runQueryGetAllDataDetailBanten;
	}
	function insertNewDetailBanten($attrDetail){
		global $koneksi;
		$id_banten = $attrDetail['id_banten'];
		$id_tingkatan = $attrDetail['id_tingkatan'];
		$stok_detail = $attrDetail['stok_detail'];
		$diskon_detail = $attrDetail['diskon_detail'];
		$hargajual_detail = $attrDetail['hargajual_detail'];
		$hargadiskon_detail = $hargajual_detail * ((100-$diskon_detail)/100);
		$queryInsertNewDetailBanten = "INSERT INTO detailbanten (id_banten,id_tingkatan,stok_detail,diskon_detail,hargajual_detail,hargadiskon_detail) VALUES('$id_banten','$id_tingkatan','$stok_detail','$diskon_detail','$hargajual_detail','$hargadiskon_detail')";
		$runQueryInsertNewDetailBanten = $koneksi->query($queryInsertNewDetailBanten);
		return $runQueryInsertNewDetailBanten;
	}
	function getAllDetailBantenByIdBanten($id_banten){
		$queryGetAllDetailBantenByIdBanten = "SELECT * FROM detailbanten db INNER JOIN banten b USING (id_banten) INNER JOIN tingkatanbanten tb USING(id_tingkatan) WHERE db.id_banten = '$id_banten'";
		$runQueryGetAllDetailBanten = $this->koneksi->query($queryGetAllDetailBantenByIdBanten);
		return $runQueryGetAllDetailBanten;
	}
	function getSpesificDataDetailBanten($id_detail){
		$queryGetSpesificDataDetailBanten = "SELECT * FROM detailbanten db INNER JOIN banten b USING(id_banten) INNER JOIN tingkatanbanten tb USING(id_tingkatan) WHERE db.id_detail = '$id_detail'";
		$runQueryGetSpesificDataDetailBanten = $this->koneksi->query($queryGetSpesificDataDetailBanten);
		return $runQueryGetSpesificDataDetailBanten->fetch_assoc();
	}
	function updateSpesificDetailBantenByIdDetail($attrDetail){
		$id_detail = $attrDetail['id_detail'];
		$stok_detail = $attrDetail['stok_detail'];
		$diskon_detail = $attrDetail['diskon_detail'];
		$hargajual_detail = $attrDetail['hargajual_detail'];
		$hargadiskon_detail = $hargajual_detail *((100-$diskon_detail)/100);
		$pesanKesalahan = null;
		$queryUpdateSpesificDetailBantenByIdDetail = "UPDATE detailbanten SET stok_detail = '$stok_detail', diskon_detail = '$diskon_detail', hargajual_detail = '$hargajual_detail', hargadiskon_detail = '$hargadiskon_detail' WHERE id_detail = '$id_detail'";
		$runQueryUpdateSpesificDetailBantenByIdDetail = $this->koneksi->query($queryUpdateSpesificDetailBantenByIdDetail);
		if ($runQueryUpdateSpesificDetailBantenByIdDetail == false) {
			$pesanKesalahan = "Terjadi kesalahan saat mengupdate data!";
		}
		return $pesanKesalahan;
	}
	function substractSpesificStockDetailBanten($id_detail,$pengurang){
		$pesanKesalahan = null;
		$querySubstractSpesificStockDetailBanten = "UPDATE detailbanten SET stok_detail = stok_detail - $pengurang WHERE id_detail = '$id_detail'";
		$runquerySubstractSpesificStockDetailBanten = $this->koneksi->query($querySubstractSpesificStockDetailBanten);
		if ($runquerySubstractSpesificStockDetailBanten == false) {
			$pesanKesalahan = "Terjadi kesalahan saat query update!";
		}
		return $pesanKesalahan;
	}
	function deleteSpesificDetailBanten($id_detail){
		$pesanKesalahan = null;
		$queryDeleteSpesificDetailBanten = "DELETE FROM detailbanten WHERE id_detail = '$id_detail'";
		$runQueryDeleteSpesificDetailBanten = $this->koneksi->query($queryDeleteSpesificDetailBanten);
		if ($runQueryDeleteSpesificDetailBanten == false) {
			$pesanKesalahan = "Terjadi kesalahan saat menghapus informasi tambahan barang!";
		}
		return $pesanKesalahan;

	}
	function checkAmountRowsDetailBantenByIdBanten($id_banten){
		$queryCheckRows = "SELECT COUNT(id_detail) AS 'rows' FROM detailbanten WHERE id_banten = '$id_banten'";
		$runQueryCheckRows = $this->koneksi->query($queryCheckRows);
		$getRows = $runQueryCheckRows->fetch_assoc();
		$getRows = $getRows['rows'];
		return $getRows;


	}
	function ifAlreadyIdTingkatan($id_banten,$id_tingkatan){
		$queryCheckIfAlreadyIdTingkatan = "SELECT id_detail FROM detailbanten WHERE id_banten = '$id_banten' AND id_tingkatan = '$id_tingkatan'";
		$runQueryCheckIfAlreadyIdTingkatan = $this->koneksi->query($queryCheckIfAlreadyIdTingkatan);
		$getIdTingkatan = $runQueryCheckIfAlreadyIdTingkatan->num_rows;
		return $getIdTingkatan;

	}
	function triggerBeforeDeleteBanten($id_banten){
		$queryTriggerBeforeDeleteBanten = "DELETE FROM detailbanten WHERE id_banten = '$id_banten'";
		$runqueryTriggerBeforeDeleteBanten = $this->koneksi->query($queryTriggerBeforeDeleteBanten);
		return $runqueryTriggerBeforeDeleteBanten;
	}
}
class Banten{
	private $koneksi;
	private $objUtil;
	private $objDetailBanten;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
		$this->objUtil = new Utilities();
		$this->objDetailBanten = new Detailbanten();
	}
	function getAllDataBantenBySearch($banten_dicari,$id_toko,$offset,$row_count){
		$queryFindBantenBySearch = "SELECT * FROM banten INNER JOIN kategoribanten USING(id_kategori) WHERE id_toko = '$id_toko' AND (banten.nama_banten LIKE '%$banten_dicari%' OR kategoribanten.nama_kategori LIKE '%$banten_dicari%') LIMIT $offset,$row_count";
		$runQueryFindBantenBySearch = $this->koneksi->query($queryFindBantenBySearch);
		return $runQueryFindBantenBySearch;
	}
	function insertNewBanten($attrBanten){
		//retrieve all data from parameter
		$id_kategori = $attrBanten['id_kategori'];
		$id_toko = $attrBanten['id_toko'] ;
		$nama_banten = $attrBanten['nama_banten'] ;
		$deskripsi_banten = $attrBanten['deskripsi_banten'] ;
		$kelengkapan_banten = $attrBanten['kelengkapan_banten'] ;
		$attrFotoBanten = $attrBanten['foto_banten'] ;
		$pesanKesalahan = null;
		$runQueryInsertNewBanten = null;
		$uploadError = false;
		//cek apakah user mengupload foto baru atau tidak, caranya dengan mengecek nilai error dari _FILES
		if ($attrFotoBanten['error']!=4) {
			//berarti user mengupload foto baru, sehingga sesuaikan nama foto yang akan diedit dan upload ke folder imgbanten
			$url = "../../assets/imgbanten/";
			list($uploadError,$pesanKesalahan,$nama_foto) = $this->objUtil->uploadNewImage($attrFotoBanten,$url);
			$foto_banten = $nama_foto;
		}else{
			$foto_banten = $foto_bantenLama;
		}
		if ($uploadError==false) {
			$queryInsertNewBanten = "INSERT INTO banten (id_kategori, id_toko, nama_banten, deskripsi_banten, kelengkapan_banten, foto_banten) VALUES ('$id_kategori','$id_toko','$nama_banten','$deskripsi_banten','$kelengkapan_banten','$foto_banten')";
			$runQueryInsertNewBanten = $this->koneksi->query($queryInsertNewBanten);
			if ($runQueryInsertNewBanten==true) {
			//update berhasil
			}else{
			//update gagal
				$pesanKesalahan = "Terjadi kesalahan saat menambahkan barang!";
			}
		}
		return array($pesanKesalahan,$runQueryInsertNewBanten);
	}
	function getAmountBantenByIdToko($id_toko){
		$queryGetAmountBantenByIdToko = "SELECT COUNT(banten.id_banten) AS banyak_banten FROM banten INNER JOIN kategoribanten USING(id_kategori) WHERE id_toko = '$id_toko'";
		$runQueryGetAmountBantenByIdToko = $this->koneksi->query($queryGetAmountBantenByIdToko);
		$getData = $runQueryGetAmountBantenByIdToko->fetch_assoc();
		$amount_banten = $getData['banyak_banten'];
		return $amount_banten;
	}
	function getAmountBantenBySearch($id_toko,$banten_dicari){
		$queryGetAmountBantenBySearch = "SELECT * FROM banten INNER JOIN kategoribanten USING(id_kategori) WHERE id_toko = '$id_toko' AND (banten.nama_banten LIKE '%$banten_dicari%' OR kategoribanten.nama_kategori LIKE '%$banten_dicari%')";
		$runqueryGetAmountBantenBySearch = $this->koneksi->query($queryGetAmountBantenBySearch);
		return $runqueryGetAmountBantenBySearch;
	}
	function showAllDataBantenByIdTokoPerPage($id_toko,$offset,$row_count){
		$queryShowAllDataBantenByIdTokoPerPage = "SELECT * FROM banten INNER JOIN kategoribanten USING(id_kategori) WHERE id_toko = '$id_toko' LIMIT $offset,$row_count";
		$runqueryShowAllDataBantenByIdTokoPerPage = $this->koneksi->query($queryShowAllDataBantenByIdTokoPerPage);
		return $runqueryShowAllDataBantenByIdTokoPerPage;
	}
	function getAllDataBantenByIdToko($id_toko){
		global $koneksi;
		$queryGetAllDataBantenByIdToko = "SELECT * FROM banten INNER JOIN kategoribanten USING(id_kategori) WHERE id_toko = '$id_toko'";
		$runQueryGetAllDataBantenByIdToko = $koneksi->query($queryGetAllDataBantenByIdToko);
		return $runQueryGetAllDataBantenByIdToko;
	}
	function getSpesificDataBantenByIdBanten($id_banten){
		global $koneksi;
		$queryGetSpesificDataBantenByIdBanten = "SELECT * FROM banten INNER JOIN kategoribanten USING(id_kategori) WHERE id_banten = '$id_banten'";
		$runQueryGetSpesificDataBantenByIdBanten = $koneksi->query($queryGetSpesificDataBantenByIdBanten);
		$getData = $runQueryGetSpesificDataBantenByIdBanten->fetch_assoc();
		return $getData;
	}
	function updateDataBantenByIdBanten($attrBanten){
		global $koneksi;
		$id_banten = $attrBanten['id_banten'];
		$id_kategori = $attrBanten['id_kategori'];
		$nama_banten = $attrBanten['nama_banten'];
		$deskripsi_banten = $attrBanten['deskripsi_banten'];
		$kelengkapan_banten = $attrBanten['kelengkapan_banten'];
		$foto_bantenLama = $attrBanten['foto_bantenLama'];
		$attrFotoBantenBaru = $attrBanten['foto_bantenBaru'];
		$uploadError = false;
		$pesanKesalahan = null;
		$runQueryUpdateDataBantenByIdBanten = null;
		//cek apakah user mengupload foto baru atau tidak, caranya dengan mengecek nilai error dari _FILES
		if ($attrFotoBantenBaru['error']!=4) {
			$objUtil = new Utilities();
				//berarti user mengupload foto baru, sehingga sesuaikan nama foto yang akan diedit dan upload ke folder imgbanten
			$url = "../../assets/imgbanten/";
			list($uploadError,$pesanKesalahan,$nama_foto) = $objUtil->uploadNewImage($attrFotoBantenBaru,$url);
			$foto_banten = $nama_foto;
		}else{
			$foto_banten = $foto_bantenLama;
		}
		if ($uploadError==false) {
			//update data
			$queryUpdateDataBantenById = "UPDATE banten SET nama_banten = '$nama_banten',deskripsi_banten = '$deskripsi_banten',kelengkapan_banten = '$kelengkapan_banten',id_kategori = '$id_kategori',foto_banten = '$foto_banten' WHERE id_banten = '$id_banten'";
			$runQueryUpdateDataBantenByIdBanten = $koneksi->query($queryUpdateDataBantenById);
		}
		if ($runQueryUpdateDataBantenByIdBanten==false) {
			$pesanKesalahan[] = "Terjadi kesalahan saat mengupdate data";
		}
		return array($pesanKesalahan,$uploadError,$runQueryUpdateDataBantenByIdBanten);	
	}
	function deleteSpecificBanten($id_banten){
		$isAnyKesalahan = false;
		$pesanKesalahan = "";
		//delete dahulu tabel detail_banten yang id_banten nya ingin didelete (TRIGER)
		$runqueryTriggerBeforeDeleteBanten = $this->objDetailBanten->triggerBeforeDeleteBanten($id_banten);
		if ($runqueryTriggerBeforeDeleteBanten==true) {
			//delete tabel banten, yang id_banten nya sesuai dengan yang ingin didelete
			$queryDeleteSpecificBanten = "DELETE FROM banten WHERE id_banten='$id_banten'";
			$runQueryDeleteSpecificBanten = $this->koneksi->query($queryDeleteSpecificBanten);
			if ($runQueryDeleteSpecificBanten!=true) {
				$isAnyKesalahan = true;
				$pesanKesalahan .= "Terjadi kesalahan saat menghapus data!";
			}
		}else{
			$isAnyKesalahan = true;
			$pesanKesalahan .= "Terjadi kesalahan saat menghapus data!";
		}
		return array($isAnyKesalahan,$pesanKesalahan);
	}
}
class Jasa{
	public $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}
	function getAllDataJasaPengiriman(){
		$queryGetAllDataJasaPengiriman = "SELECT * FROM jasa";
		$runqueryGetAllDataJasaPengiriman = $this->koneksi->query($queryGetAllDataJasaPengiriman);
		return $runqueryGetAllDataJasaPengiriman;
	}
}
class Utilities{
	public $koneksi;
	function __construct(){
		global $koneksi;
		$this->koneksi = $koneksi;
	}

	function uploadNewImage($attrFoto,$urlDestination){
		$pesanKesalahan = array();
		$uploadError = false;
		//mendapatkan nama foto
		$nama_foto = $attrFoto['name'];
		//hilangkan whitespace (spasi) pada nama_foto agar bisa di load di jquery
		$tipe_foto = explode(".", $nama_foto);
		$nama_foto = $tipe_foto[0];
		$split_nama_foto = explode(' ', $nama_foto);
		$nama_foto_fix = "";
		for ($i=0; $i < count($split_nama_foto); $i++) { 
			$nama_foto_fix .= $split_nama_foto[$i];
		}
		$nama_foto_fix.=".".end($tipe_foto); //gabungkan dengan .png atau .jpg
		// Mendapatkan lokasi foto diupload oleh user
		$lokasi_foto = $attrFoto['tmp_name'];
		//mendapatkan tipe data file yang diinputkan user berupa jpg/jpeg/png
		$tipe_foto = end($tipe_foto);
		$tipe_foto =strtolower($tipe_foto);
		//mendapatkan ukuran foto yang diupload
		$size_foto = $attrFoto['size'];
		// Lokasi foto tujuan diupload di folder assets
		$destination = $urlDestination.$nama_foto_fix;
		$extensions= array("jpeg","jpg","png");
			// Cek ekstensi foto yang diupload
		if (in_array($tipe_foto, $extensions)==false) {
			$pesanKesalahan[] ="Silahkan masukan format foto (jpg/jpeg/png)";
			$uploadError = true;
		}
		// Cek ukuran file yang diupload
		if($size_foto>2097152) {
			$pesanKesalahan[] ="Silahkan upload gambar < 2 MB";
			$uploadError=true;
		}
		if (empty($pesanKesalahan)==true) {
			move_uploaded_file($lokasi_foto,$destination);
		}
		return array($uploadError,$pesanKesalahan,$nama_foto_fix);
	}
	function arrangeErrorMessage($pesanKesalahan){
		$fullErrMsg = null;
		foreach ($pesanKesalahan as $err) {
			$fullErrMsg .= $err;
			$fullErrMsg .= ".";
			$fullErrMsg .= '\n\n';
		}
		return $fullErrMsg;
	}
}

class Flasher{
	function showSimpleFlash($title,$icon,$text,$url,$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33",$confirmButtonText){
		echo "<script>
		Swal.fire({
			title: '$title',
			icon:'$icon',
			text: '$text',
			showCancelButton: false,
			confirmButtonColor: '$confirmButtonColor',
			cancelButtonColor: '$cancelButtonColor',
			confirmButtonText: '$confirmButtonText'
			}).then((result) => {
				document.location.href = '$url';
			})</script>";
		}
		function showIntervalTimeFlash(){
			echo "<script>
			let timerInterval
			Swal.fire({
				title: 'Lihat Keranjangmu!',
				timer: 1000,
				timerProgressBar: false,
				onBeforeOpen: () => {
					timerInterval = setInterval(() => {
						const content = Swal.getContent()
						if (content) {
							const b = content.querySelector('b')
							if (b) {
								b.textContent = Swal.getTimerLeft()
							}
						}
						}, 100)
						},
						onClose: () => {
							clearInterval(timerInterval)
						}
						}).then((result) => {
							document.location.href = 'index.php?page=Keranjang';
						})</script>";
					}
				}
// Instansiasi objek dari kelas-kelas yang ada
				$objPenjual= new Penjual();
				$objPembeli = new Pembeli();
				$objBank = new Bank();
				$objWilayah = new Wilayah();
				$objToko = new Toko();
				$objOngkir = new Ongkir();
				$objKategoriBanten = new Kategoribanten();
				$objBanten = new Banten();
				$objTingkatan = new Tingkatanbanten();
				$objDetailBanten = new Detailbanten();
				$objUtil = new Utilities();
				$objFlash = new Flasher();
				$objJasa = new Jasa();
				$objPembelian = new Pembelian();
				$objNota = new Nota();
				$objPembayaran = new Pembayaran();
				$objStatus = new Status();
				?>
