<?php
include '../../config/class.php';
if (isset($_POST['password_lamaChecked']) && isset($_POST['id_pembeliProfile'])) {
	//mengecek pada bagian profile jika ada yang ingin mengubah password dan mengecek password lama dari database
	$id_pembeli = $_POST['id_pembeliProfile'];
	$password_lama = $_POST['password_lamaChecked'];
	$isSamePassword =  $objPembeli->verifyPassword($password_lama,$id_pembeli);//return 1 if true and 0 if false
	echo json_encode($isSamePassword);
}elseif (isset($_GET['start'])) {
	$possibleData = array();
	$data = array();
	$startIndeks = $_GET['start'];
	if (isset($_GET['kategori']) && isset($_GET['search'])) {
		$kategori = $_GET['kategori']; 
		$search = $_GET['search']; 
		$runQueryGetAllDataDetailBantenByKategoriAndSearch = $objDetailBanten->getAllDataDetailBantenByKategoriAndSearch($kategoriSelected,$search);
		while ($detail = $runQueryGetAllDataDetailBantenByKategoriAndSearch->fetch_assoc()) {
			array_push($possibleData, $detail);
		}
	}elseif (isset($_GET['kategori'])) {
		$kategori = $_GET['kategori']; 
		$runQueryGetAllDataDetailBantenByKategori = $objDetailBanten->getAllDataDetailBantenByKategori($kategori);
		while ($detail = $runQueryGetAllDataDetailBantenByKategori->fetch_assoc()) {
			array_push($possibleData, $detail);
		}
	}elseif (isset($_GET['search'])) {
		$search = $_GET['search']; 
		$runQueryGetAllDataDetailBantenBySearch = $objDetailBanten->getAllDataDetailBantenBySearch($search);
		while ($detail = $runQueryGetAllDataDetailBantenBySearch->fetch_assoc()) {
			array_push($possibleData, $detail);
		}
	}elseif (!isset($_GET['kategori']) && !isset($_GET['search'])) {
		$getAllDataDetailBanten = $objDetailBanten->getAllDataDetailBanten();
		while ($detail = $getAllDataDetailBanten->fetch_assoc()) {
			array_push($possibleData, $detail);
		}
	}
	for ($i=$startIndeks; $i < $startIndeks+4; $i++) { 
		if ($i<count($possibleData)) {
			array_push($data, $possibleData[$i]);
		}
	}
	echo json_encode($data);
}elseif (isset($_POST['btn_pesananditerima'])) {
	$id_pembelian = $_POST['id_pembelian'];
	$data_pembelian = $objPembelian->getSpesificDetailPembelian($id_pembelian);
	echo json_encode($data_pembelian);
}
?>