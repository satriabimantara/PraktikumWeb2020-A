<?php
if (!isset($_SESSION['pembeli'])) {
	//arahkan untuk login terlebih dahulu
	$objFlash->showSimpleFlash("LOGIN REQUIRED","warning",'Silahkan login untuk melanjutkan!',"login.php",$confirmButtonColor="#4BB543",$cancelButtonColor = "#d33","Login");
	exit();
}else{
	require_once 'headerdashboard.php';
	if (!isset($_SESSION['toko']) || !isset($_SESSION['keranjang'])|| empty($_SESSION['toko']) || empty($_SESSION['keranjang'])) {
		$objFlash->showSimpleFlash("KERANJANG KOSONG","warning",'Belum ada barang di keranjang!',"index.php",$confirmButtonColor="#4BB543",$cancelButtonColor = "#d33","Beranda");
		exit();
	}
}

?>

<div class="container">
	<!-- Row 1 (Checkout-panel)  -->
	<div class="row justify-content-center">
		<div class="col-10 keranjang-panel ">
			<!-- Card per toko -->
			<?php foreach ($_SESSION['toko'] as $id_toko => $detail_toko): ?>
				<?php $total_belanjaan = 0;?>
				<div class="row">
					<div class="col">
						<div class="card shadow card-toko">
							<div class="card-body">
								<!-- Heading -->
								<div class="row ">
									<div class="col-lg keranjang-panel-heading d-flex justify-content-between">
										<div>
											<h3><?= $detail_toko['nama_toko']; ?></h3>
											<p>
												<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;
												<?= $detail_toko['kota_toko']; ?>
											</p>
										</div>
										<div>
											<a class="btn btn-danger rounded-circle tombol" href="index.php?page=Keranjang">
												<i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
								<!-- Akhir heading -->
								<!-- Konten barang yang dibeli -->
								<?php foreach ($_SESSION['keranjang'][$id_toko] as $detail_banten): ?>
									<div class="card mb-3 card-keranjang-banten">
										<div class="row no-gutters">
											<div class="col-lg-6">
												<img src="../../assets/imgbanten/<?= $detail_banten['foto_banten']; ?>" class="card-img" alt="Foto Banten">
											</div>
											<div class="col-lg-6">
												<div class="card-body">
													<h5 class="card-title">
														<?= $detail_banten['nama_banten']; ?>
													</h5>
													<p class="card-text label-diskon">
														Tingkatan <?= $detail_banten['tingkatan_banten']; ?>
													</p>
													<?php if ($detail_banten['diskon_detail']!=0): ?>
														<p class="card-text label-diskon">
															<i class="fa fa-tags" aria-hidden="true"></i>&nbsp;
															<?= $detail_banten['diskon_detail']; ?>% (<?= $detail_banten['jumlah_dibeli']; ?> barang)
														</p>
														<p class="card-text label-diskon" style="text-decoration:line-through">
															Rp. <?= number_format($detail_banten['hargajual_detail'] * $detail_banten['jumlah_dibeli']); ?>
														</p>
													<?php endif ?>
													<p class="card-text label-harga" >
														Rp. <?= number_format($detail_banten['hargadiskon_detail'] * $detail_banten['jumlah_dibeli']); ?>
														<?php
														$total_belanjaan+= ($detail_banten['hargadiskon_detail'] * $detail_banten['jumlah_dibeli']) ;
														?>
													</p>
													<p class="card-text">
														<?= $detail_banten['catatan_pemesanan']; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>
								<!-- Akhir Konten barang yang dibeli -->
								<form action="index.php?page=Checkout" method="post">
									<!-- Lewatkan id_pembeli -->
									<input type="hidden" name="idpembeli_pembelian" value="<?= $_SESSION['pembeli']['id_pembeli']; ?>">
									<!-- lewatkan id_toko untuk memasukkan data belanjaan berdasarkan tokonya -->
									<input type="hidden" name="idtoko_checkout" value="<?= $id_toko; ?>">
									<!-- Informasi Penerima dan lokasi pengiriman -->
									<div class="row">
										<div class="col-lg">
											<label for="namapembeli_pembelian">Nama Pembeli</label>
											<input type="text" class="form-control input-login" name="namapembeli_pembelian" value="<?= $_SESSION['pembeli']['namadepan_pembeli']; ?><?= " ".$_SESSION['pembeli']['namabelakang_pembeli']; ?>" required="true">
										</div>
										<div class="col-lg">
											<label for="emailpembeli_pembelian">Email</label>
											<input type="email" class="form-control input-login" name="emailpembeli_pembelian" value="<?= $_SESSION['pembeli']['email_pembeli']; ?>" required="true">
										</div>
										<div class="col-lg">
											<label for="hppembeli_pembelian">Nomor Handphone</label>
											<input type="number" class="form-control input-login" name="hppembeli_pembelian" value="<?= $_SESSION['pembeli']['hp_pembeli']; ?>" minlength="12" required="true">
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<label for="alamatpengiriman_pembelian">Alamat Pengiriman</label>
											<textarea id="" rows="3" class="form-control input-login" name="alamatpengiriman_pembelian" required='true'><?= $_SESSION['pembeli']['alamat_pembeli']; ?></textarea  >
										</div>
										<div class="col-lg">
											<label for="kodepospengiriman_pembelian">Kodepos</label>
											<input type="text" class="form-control input-login" value="<?php echo $_SESSION['pembeli']['kodepos_pembeli']?>" name="kodepospengiriman_pembelian" required='true'>
										</div>
										<div class="col-lg">
											<label for="kotapengiriman_pembelian">Kota Pengiriman</label>
											<select class="form-control input-login " name="kotapengiriman_pembelian" required="true" title="Pilih Kota Pengiriman" aria-describedby="kotapengiriman_help">
												<option value="">- Pilih Kota Pengiriman -</option>
												<?php
												$runQueryGetAllKotaWilayah = $objWilayah->getAllKotaWilayah();
												while ( $wilayah = $runQueryGetAllKotaWilayah->fetch_assoc()) :?>
													<option value="<?= $wilayah['kota_wilayah'] ?>">
														<?= $wilayah['kota_wilayah']; ?>
													</option>
												<?php endwhile; ?>
											</select>
											<small id="kotapengiriman_help" class="form-text text-muted">Kota tempat barang diterima</small>
										</div>
										<div class="col-lg">
											<label for="provinsipengiriman_pembelian">Provinsi</label>
											<input type="text" class="form-control input-login" value="<?php echo $_SESSION['pembeli']['provinsi_pembeli']?>" name="provinsipengiriman_pembelian" readonly="true">
										</div>
									</div>
									<!-- Akhir informasi penerima dan lokasi pengiriman -->
									<!-- Ongkos Kirim, tanggal, shippers, button checkout -->
									<div class="row">
										<!-- Tanggal Pengiriman -->
										<div class="form-group col-lg-6 ">
											<label for="tanggalkirim_pembelian">Tanggal Pengiriman</label>
											<input type="hidden" name="tanggalbeli_pembelian" value="<?= date("Y-m-d"); ?>">
											<input type="date" name="tanggalkirim_pembelian" class="form-control input-login tanggal_pengiriman" value="" required="true" title="Tentukan tanggal pengiriman barang" data-id="<?= $id_toko; ?>" min="<?= date("Y-m-d"); ?>">
										</div>
										<div class="form-group col-lg-4">
											<?php
											$runQueryGetAllDataOngkir = $objOngkir->getAllDataOngkirBaseOnToko($id_toko);
											?>
											<label for="tarifongkir_pembelian">Tarif Pengiriman</label>
											<select class="form-control input-login btn-select-ongkir" name="tarifongkir_pembelian" title="Tentukan tarif pengiriman barang" required="true" >
												<option value="" class="first-select">- Pilih Ongkir Kota Tujuan -</option>
												<?php while ( $ongkir = $runQueryGetAllDataOngkir->fetch_assoc()) :?>
													<option value="<?= $ongkir['harga_ongkir'] ?>">
														<?= $ongkir['kota_wilayah']."-Rp. ".number_format($ongkir['harga_ongkir']); ?>
													</option>
												<?php endwhile; ?>
											</select>
										</div>
										<div class="form-group col-lg-2">
											<?php
											$runQueryGetAllDataJasaPengiriman = $objJasa->getAllDataJasaPengiriman();
											?>
											<label for="jasapengiriman_pembelian">Jasa Pengiriman</label>
											<select class="form-control input-login btn-select-jasa" name="jasapengiriman_pembelian" title="Tentukan jasa pengiriman barang" required="true" >
												<option value="" class="first-select">- Pilih Jasa Pengiriman -</option>
												<?php while ( $jasa = $runQueryGetAllDataJasaPengiriman->fetch_assoc()) :?>
													<option value="<?= $jasa['nama_jasa'] ?>">
														<?= $jasa['nama_jasa']; ?>
													</option>
												<?php endwhile; ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col justify-content-between d-flex">
											<div>
												<h5 class="card-title">Total Belanjaan</h5>
												<input type="hidden" name="totalharga_pembelian" value="<?= $total_belanjaan; ?>">
												<p class="card-text label-harga" >
													Rp. <?= number_format($total_belanjaan); ?>
												</p>
											</div>
											<div>
												<button class="btn btn-primary tombol " type="submit" name="btnCheckout" value="" data-idtoko = "<?= $id_toko; ?>">
													Checkout
												</button>
											</div>
										</div>
									</div>
									<!-- Akhir Ongkos Kirim, tanggal, shippers, button checkout dan total belanjaan -->
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			<!-- Akhir card per toko -->
		</div>
	</div>
	<!-- Akhir div Row 1 (Checkout-panel) berada di index-->

	<?php
	if (isset($_POST['btnCheckout'])) {
		$data = array();
		$idtoko_checkout = $_POST['idtoko_checkout'];
		$data_detailpembelian = array();
		$data['idpembeli_pembelian'] = $_POST['idpembeli_pembelian'];
		$data['idtoko_pembelian'] = $_POST['idtoko_checkout'];
		$data['namapembeli_pembelian'] = $_POST['namapembeli_pembelian'];
		$data['emailpembeli_pembelian'] = $_POST['emailpembeli_pembelian'];
		$data['hppembeli_pembelian'] = $_POST['hppembeli_pembelian'];
		$data['alamatpengiriman_pembelian'] = $_POST['alamatpengiriman_pembelian'];
		$data['kodepospengiriman_pembelian'] = $_POST['kodepospengiriman_pembelian'];
		$data['kotapengiriman_pembelian'] = $_POST['kotapengiriman_pembelian'];
		$data['provinsipengiriman_pembelian'] = $_POST['provinsipengiriman_pembelian'];
		$data['tanggalkirim_pembelian'] = $_POST['tanggalkirim_pembelian'];
		$data['tanggalbeli_pembelian'] = $_POST['tanggalbeli_pembelian'];
		$data['tarifongkir_pembelian'] = $_POST['tarifongkir_pembelian'];
		$data['jasapengiriman_pembelian'] = $_POST['jasapengiriman_pembelian'];
		$data['totalharga_pembelian'] = $_POST['totalharga_pembelian'] + $data['tarifongkir_pembelian'];
		//1. Menyimpan data ke tabel pembelian
		//digunakan untuk kolom id_pembelian di tabel detail_pembelian
		$lastid_pembelian = $objPembelian->insertNewPembelian($data); 
		//2. Memasukkan barang-barang yang dibeli ke tabel detail_pembelian
		echo 'Barang-Barang yang dibeli : ';
		foreach ($_SESSION['keranjang'][$idtoko_checkout] as $detail_banten){
			$data_detailpembelian['id_pembelian'] = $lastid_pembelian;
			$data_detailpembelian['id_detailpembelian'] = $detail_banten['id_detail'];
			$data_detailpembelian['hargajual_dp'] = $detail_banten['hargajual_detail'];
			$data_detailpembelian['diskon_dp'] = $detail_banten['diskon_detail'];
			$data_detailpembelian['hargadiskon_dp'] = $detail_banten['hargadiskon_detail'];
			$data_detailpembelian['quantity_dp'] = $detail_banten['jumlah_dibeli'];
			$data_detailpembelian['namabanten_dp'] = $detail_banten['nama_banten'];
			$data_detailpembelian['tingkatanbanten_dp'] = $detail_banten['tingkatan_banten'];
			$data_detailpembelian['kelengkapanbanten_dp'] = $detail_banten['kelengkapan_banten'];
			$data_detailpembelian['deskripsibanten_dp'] = $detail_banten['deskripsi_banten'];
			$data_detailpembelian['kategoribanten_dp'] = $detail_banten['kategori_banten'];
			$data_detailpembelian['namatoko_dp'] = $detail_banten['nama_toko'];
			$data_detailpembelian['alamattoko_dp'] = $detail_banten['alamat_toko'];
			$data_detailpembelian['kodepostoko_dp'] = $detail_banten['kodepos_toko'];
			$data_detailpembelian['kotatoko_dp'] = $detail_banten['kota_toko'];
			$data_detailpembelian['provinsitoko_dp'] = $detail_banten['provinsi_toko'];
			$data_detailpembelian['catatanpemesanan_dp'] = $detail_banten['catatan_pemesanan'];
			$runQueryInsertNewDetailPembelian = $objPembelian->insertNewDetailPembelian($data_detailpembelian);
			//Mengupdate stok barang setelah barang dibeli di detail_banten
			$jumlah_dibeli = $detail_banten['jumlah_dibeli'];
			$id_detail =  $detail_banten['id_detail'];
			$pesanKesalahanSubstractStock = $objDetailBanten->substractSpesificStockDetailBanten($id_detail,$jumlah_dibeli);
		}
		//2.1 mengosongkan keranjang belanja
		unset($_SESSION['keranjang'][$idtoko_checkout]);
		unset($_SESSION['toko'][$idtoko_checkout]);
		unset($_SESSION['jumlahitemtoko'][$idtoko_checkout]);
		//2.2 Redirect ke halaman nota belanja
		if ($runQueryInsertNewDetailPembelian == true && $pesanKesalahanSubstractStock==null) {
			$id_pembeli = $pembeli['id_pembeli'];
			$objFlash->showSimpleFlash("CHECKOUT SUKSES","success","Silahkan lanjutkan ke pembayaran Anda!","index.php?page=Nota&id=$id_pembeli",$confirmButtonColor="#4BB543",$cancelButtonColor = "#d33","Nota");
		}else{
			$objFlash->showSimpleFlash("ERROR","danger","Sesuatu terjadi saat query!","index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
		}
	}

	?>
	<?php 
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	// echo '<pre>';
	// print_r($_SESSION['keranjang']);
	// echo '</pre>';
	// echo "<pre>";
	// print_r($_SESSION['pembeli']);
	// echo "</pre>";
	// echo "<pre>";
	// print_r($_SESSION['keranjang']);
	// echo "</pre>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_SESSION['toko']);
	// echo "</pre>";
	// echo "<br>";
	?>