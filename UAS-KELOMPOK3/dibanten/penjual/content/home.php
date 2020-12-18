<?php
require_once 'headerdashboard.php';
$id_toko = $penjual['id_toko'];
//get data pembelian yang masuk berdasarkan id_toko
$data_pembelian = $objNota->getNotaToko($id_toko);
?>
<!-- Service Container -->
<div class="container ">
	<div class="row justify-content-center">
		<div class="col-10 service-panel">
			<div class="row">
				<!-- Jika sudah mempunyai toko maka tampilkan fitur-fitur berikut -->
				<div class="col-lg">
					<img src="../../assets/imgstyle/ser1.jpg" alt="employee" class="float-left" id="img_service1">
					<h4 id="title_service1">Mudah Berjualan</h4>
					<p id="text-service1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</div>
				<div class="col-lg">
					<img src="../../assets/imgstyle/ser2.jpg" alt="hires" class="float-left" id="img_service2">
					<h4 id="title_service2">Pengelolaan Data</h4>
					<p id="text-service2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					</p>
				</div>
				<div class="col-lg">
					<img src="../../assets/imgstyle/ser3.jpg" alt="security" class="float-left" id="img_service3">
					<h4 id="title_service3">Akses Mudah</h4>
					<p id="text-service3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</div>
			</div>
			<div class="row">
				<!-- Jika sudah mempunyai toko maka tampilkan fitur-fitur berikut -->
				<div class="col-lg">
					<img src="../../assets/imgstyle/ser4.jpg" alt="employee" class="float-left" id="img_service4">
					<h4 id="title_service4">Konektivitas</h4>
					<p id="text-service4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</div>
				<div class="col-lg">
					<img src="../../assets/imgstyle/ser5.jpg" alt="hires" class="float-left" id="img_service5">
					<h4 id="title_service5">Keamanan Data</h4>
					<p id="text-service5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</div>
				<div class="col-lg">
					<img src="../../assets/imgstyle/ser6.jpg" alt="security" class="float-left" id="img_service6">
					<h4 id="title_service6">Notifikasi Pesanan</h4>
					<p id="text-service6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</div>
			</div>
		</div>
	</div>
	<p style="margin-top: 10em;"></p>
	<?php if (count($data_pembelian) != 0): ?>
		<!-- Konten Pesanan Masuk -->
		<div class="row justify-content-center">
			<div class="col-10 keranjang-panel ">
				<div class="row">
					<div class="col ">
						<div class="alert alert-info" role="alert">
							<h3>Pesanan Masuk</h3>
						</div>
					</div>
				</div>
				<!-- Card Per Pembelian-->
				<?php  foreach ($data_pembelian as $id_pembelian => $data): ?>
					<div class="row">
						<div class="col">
							<div class="card shadow card-toko">
								<div class="card-body">
									<!-- Heading -->
									<div class="row ">
										<div class="col-lg keranjang-panel-heading d-flex justify-content-between">
											<div>
												<h3><?= $data['detail_pembeli'][0]['namapembeli_pembelian']; ?></h3>
												<p>
													<i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;
													<?= $data['detail_pembeli'][0]['emailpembeli_pembelian']; ?>
												</p>
												<p>
													<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;
													<?= $data['detail_pembeli'][0]['hppembeli_pembelian']; ?>
												</p>
											</div>
											<div>
												<div class="alert alert-danger" role="alert">
													<h5><?= $id_pembelian; ?></h5>
												</div>
											</div>
										</div>
									</div>
									<!-- Akhir heading -->
									<!-- Konten barang yang dibeli -->
									<?php foreach ($data['detail_pembelian'] as $indeks_pembelian =>  $pembelian): ?>
										<?php
										$total_belanjaan = 0;
										$diff=0;
										$status_pesanan = $pembelian['status_pembelian'];
										$tanggalbeli_pembelian = $pembelian['tanggalbeli_pembelian'];
										$tanggalkonfirmasi_pembelian = $pembelian['tanggalkonfirmasi_pembelian'];
										if ($status_pesanan=="pending") {
											$date1=date_create(date("Y-m-d"));
											$date2=date_create($tanggalbeli_pembelian);
											$diff=date_diff($date1,$date2)->format("%d");
										}elseif ($status_pesanan=="Upload Pembayaran" || $status_pesanan == "Pesanan Diterima" || $status_pesanan=="Lunas" || $status_pesanan=="Barang Diproses") {
											$date1=date_create(date("Y-m-d"));
											$date2=date_create($tanggalkonfirmasi_pembelian);
											$diff=date_diff($date1,$date2)->format("%d");
										}
										// Jika selisih 2 hari, maka set status pembelian dibatalkan
										if (($diff>=3) && ($status_pesanan!="Pesanan Dibatalkan")) {
											$id_pembelian = $pembelian['id_pembelian'];
											$column_set = ["status_pembelian","tanggalkonfirmasi_pembelian"];
											$value_set = ["Pesanan Dibatalkan", date("Y-m-d")];
											$runQueryUpdateSpesificPembelian = null;
											//jika status = "Barang Diproses", maka batas waktu 5 hari sejak tanggal konfirmasi
											if ($status_pesanan=="Barang Diproses") {
												if ($diff>=6) {
													$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($id_pembelian,$column_set,$value_set);
												}
											}else{
												$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($id_pembelian,$column_set,$value_set);
											}
											if ($runQueryUpdateSpesificPembelian!=null && $runQueryUpdateSpesificPembelian==true) {
												$objFlash->showSimpleFlash("PESANAN DIBATALKAN OTOMATIS","info","Pesanan telah dibatalkan otomatis oleh sistem","index.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
											}elseif ($runQueryUpdateSpesificPembelian==false){
												$objFlash->showSimpleFlash("PESANAN GAGAL DIBATALKAN OTOMATIS","warning","Telah terjadi kesalahan!","index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
											}
										}
										?>
										<div class="card mb-3 card-keranjang-banten">
											<div class="row no-gutters">
												<div class="col-lg-5">
													<img src="../../assets/imgbanten/<?= $pembelian['foto_banten']; ?>" class="card-img" alt="Foto Banten">
												</div>
												<div class="col-lg-3">
													<div class="card-body">
														<h5 class="card-title">
															<?= $pembelian['namabanten_dp']; ?>
														</h5>
														<?php if ($pembelian['diskon_dp']!=0): ?>
															<p class="card-text label-diskon">
																<i class="fa fa-tags" aria-hidden="true"></i>&nbsp;
																<?= $pembelian['diskon_dp']; ?>% (<?= $pembelian['quantity_dp']; ?> barang)
															</p>
															<p class="card-text label-diskon" style="text-decoration:line-through">
																Rp. <?= number_format($pembelian['hargajual_dp'] * $pembelian['quantity_dp']); ?>
															</p>
														<?php endif ?>
														<p class="card-text label-harga" >
															Rp. <?= number_format($pembelian['hargadiskon_dp'] * $pembelian['quantity_dp']); ?>
															<?php
															$total_belanjaan += ($pembelian['hargadiskon_dp'] * $pembelian['quantity_dp']) ;
															?>
														</p>
													</div>
												</div>
											</div>
										</div>
										<!-- Informasi Pembelian -->
										<div class="row mt-3 mb-3">
											<div class="col">
												<div class="card">
													<div class="card-body">
														<div class="row">
															<!-- Pembelian -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pembelian
																</h3>
																Tanggal Pembelian : <?= $pembelian['tanggalbeli_pembelian']; ?><br>
																Tanggal Pengiriman : <?= $pembelian['tanggalkirim_pembelian']; ?><br>
																<?php if ($pembelian['catatanpemesanan_dp']!=null): ?>
																	Catatan : <?= $pembelian['catatanpemesanan_dp']; ?> <br>
																<?php endif ?>
																Total : <strong>Rp. <?= number_format($total_belanjaan + $pembelian['tarifongkir_pembelian']); ?></strong>
															</div>
															<!-- Akhir Pembelian -->
															<!-- STatus -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Status Barang
																</h3>
																[<?= $pembelian['status_pembelian']; ?>]
																
															</div>
															<!-- AKhir STatus -->
															<!-- Pengiriman -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pengiriman
																</h3>
																<strong><?= $pembelian['jasapengiriman_pembelian']; ?></strong><br>
																Tarif Pengiriman : Rp. <?= number_format($pembelian['tarifongkir_pembelian']); ?><br>
																Alamat : <?= $pembelian['alamatpengiriman_pembelian']; ?> [<?= $pembelian['kodepospengiriman_pembelian']; ?> - <?= $pembelian['kotapengiriman_pembelian']; ?> - <?= $pembelian['provinsipengiriman_pembelian']; ?>]
															</div>
															<!-- AKhir Pengiriman -->
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<!-- Akhir Informasi Pembelian -->
									<?php endforeach ?>
									<?php if ($data['detail_pembelian'][0]['status_pembelian']=="Lunas" || $data['detail_pembelian'][0]['status_pembelian']=="Barang Diproses"): ?>
										<div class="row">
											<div class="col">
												<div class="alert alert-dark" role="alert">
													<strong>Segera Proses dan Kirim Pesanan!</strong> Pesanan yang tidak diproses akan otomatis <strong>dibatalkan</strong> oleh sistem <strong>2 hari</strong> sejak pembayaran dikonfirmasi lunas. Batas waktu pengiriman barang, <strong>5 hari</strong> sejak barang diproses!
												</div>
												<div class="alert alert-warning alert-dismissible fade show" role="alert">
													<strong>Edit Pesananmu</strong>. Update status pesananmu agar pembeli mengetahuinya!
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											</div>
										</div>
									<?php endif ?>
									<!-- Akhir Konten barang yang dibeli -->
									<?php if ($data['detail_pembelian'][0]['status_pembelian']=="Pesanan Diterima"): ?>
										<div class="row">
											<div class="col">
												<div class="alert alert-secondary" role="alert">
													<strong>Menunggu pembayaran</strong> pembeli. Pesanan akan <strong>dibatalkan</strong> otomatis jika pembeli tidak membayar dalam <strong>2 hari</strong> terhitung dari pesanan itu dibuat!
												</div>
											</div>
										</div>
									<?php endif ?>
									<!-- Button Footer -->
									<div class="d-flex justify-content-between">
										<?php if ($data['detail_pembelian'][0]['status_pembelian']=="Lunas" || $data['detail_pembelian'][0]['status_pembelian']=="Barang Diproses"): ?>
											<a href="#" class="btn btn-warning tombol " type="button" role="button" data-toggle="modal" data-target="#modalLihatPembayaranPembeli" data-idpembelian="<?= $id_pembelian; ?>"name="btnEditPembelianPembeli">
												<i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Edit Pesanan
											</a>
										<?php endif ?>
										<?php if ($data['detail_pembelian'][0]['status_pembelian']=="pending"): ?>
											<a href="#" class="btn btn-danger tombol " type="button" role="button" data-toggle="modal" data-target="#modalLihatPembayaranPembeli" data-idpembelian="<?= $id_pembelian; ?>"name="btnTolakPesanan">
												<i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Tolak Pesanan
											</a>
											<a href="#" class="btn btn-success tombol " type="button" role="button" data-toggle="modal" data-target="#modalLihatPembayaranPembeli" data-idpembelian="<?= $id_pembelian; ?>"name="btnKonfirmasiPesananPembeli">
												<i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Konfirmasi Pesanan
											</a>
										<?php endif ?>
										<?php if ($data['detail_pembelian'][0]['status_pembelian']=="Upload Pembayaran"): ?>
											<a href="#" class="btn btn-primary tombol " type="button" role="button" data-toggle="modal" data-target="#modalLihatPembayaranPembeli" data-idpembelian="<?= $id_pembelian; ?>"name="btnKonfirmasiPembayaranPembeli">
												<i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp; Konfirmasi Pembayaran
											</a>
										<?php endif ?>
									</div>
									<!-- Akhir button footer -->
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<!-- Akhir Card Per Pembelian-->
			</div>
		</div>
		<!-- Akhir Konten Pesanan Masuk -->
	<?php endif ?>
	<!-- Akhir Service Container berada di index-->

	<?php
	if (isset($_POST['btnSubmitTambahBanten'])) {
	//get all variable
		$attrBanten = array();
		$attrBanten['id_kategori'] = $_POST['id_kategori'];
		$attrBanten['id_toko'] = $penjual['id_toko'];
		$attrBanten['nama_banten'] = $_POST['nama_banten'];
		$attrBanten['deskripsi_banten'] = $_POST['deskripsi_banten'];
		$attrBanten['kelengkapan_banten'] = $_POST['kelengkapan_banten'];
		$attrBanten['foto_banten'] = $_FILES['foto_banten'];
		list($pesanKesalahan,$runQueryInsertNewBanten) = $objBanten->insertNewBanten($attrBanten);
		if ($pesanKesalahan == null && $runQueryInsertNewBanten == true) {
			$objFlash->showSimpleFlash("BERHASIL MENAMBAH BARANG","success","Data barang berhasil ditambahkan!","index.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
		}else{
			$pesanKesalahan = $objUtil->arrangeErrorMessage($pesanKesalahan);
			$objFlash->showSimpleFlash("GAGAL MENAMBAH BARANG","warning",$pesanKesalahan,"index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
		}
	}elseif (isset($_POST['btnSubmitModalPesananPembeli'])) {
		$id_pembelian = $_POST['idpembelian_dibayar'];
		if ($_POST['btnSubmitModalPesananPembeli'] == "konfirmasi_pesanan") {
			//update status pembelian menjadi konfirmasi_pesanan
			$column_set = ["status_pembelian","tanggalkonfirmasi_pembelian"];
			$value_set = ["Pesanan Diterima", date("Y-m-d")];
			$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($id_pembelian,$column_set,$value_set);
			if ($runQueryUpdateSpesificPembelian==true) {
				$objFlash->showSimpleFlash("BERHASIL KONFIRMASI PESANAN","success","Pesanan sudah dikonfirmasi. Tunggu pembayaran dari customer dan selesaikan pesananmu!","index.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
			}else{
				$objFlash->showSimpleFlash("GAGAL KONFIRMASI PESANAN","warning","Telah terjadi kesalahan!","index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
			}
		}elseif ($_POST['btnSubmitModalPesananPembeli'] == "konfirmasi_pembayaran") {
			//retrieve isi wallet penjual
			$id_penjual = $penjual['id_penjual'];
			$wallet = $objPenjual->getWalletPenjual($id_penjual);
			//update wallet penjual sejumlah pembayaran
			$totalharga_pembayaran = $_POST['totalharga_pembayaran'];
			$totalharga_pembayaran = explode("Rp. ", $totalharga_pembayaran);
			$totalharga_pembayaran = $totalharga_pembayaran[1];
			$totalharga_pembayaran = str_replace(',', '', $totalharga_pembayaran);
			$totalharga_pembayaran+=$wallet;
			$ifUpdateWalletSuccess = false;
			$runQueryUpdateWalletPenjual = $objPenjual->updateWalletPenjual($id_penjual,$totalharga_pembayaran);
			if ($runQueryUpdateWalletPenjual==true) {
				$ifUpdateWalletSuccess=true;
				$penjual['dompet_penjual'] = $totalharga_pembayaran;
			}
			//update status pembelian menjadi konfirmasi_pembayaran
			$column_set = ["status_pembelian","tanggalkonfirmasi_pembelian"];
			$value_set = ["Lunas", date("Y-m-d")];
			$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($id_pembelian,$column_set,$value_set);
			//update tanggalkonfirmasi_pembayaran pada tabel pembayaran
			$column_set = ["tanggalkonfirmasi_pembayaran"];
			$value_set = [date("Y-m-d")];
			$runQueryUpdateSpesificPembayaran = $objPembayaran->updateSpecificPembayaran($id_pembelian,$column_set,$value_set);
			if ($runQueryUpdateSpesificPembelian==true && $ifUpdateWalletSuccess==true && $runQueryUpdateSpesificPembayaran) {
				$objFlash->showSimpleFlash("BERHASIL KONFIRMASI PEMBAYARAN","success","Pembayaran sudah terkonfirmasi. Segera selesaikan dan kirim pesanan yang ada!","index.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
			}else{
				$objFlash->showSimpleFlash("GAGAL KONFIRMASI PEMBAYARAN","warning","Telah terjadi kesalahan!","index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
			}
		}elseif ($_POST['btnSubmitModalPesananPembeli'] == "edit_pesanan") {
			$id_pembelian = $_POST['idpembelian_dibayar'];
			$status_pembelian = $_POST['nama_status'];
			$resipengiriman_pembelian = $_POST['resipengiriman_pembelian'];
			$column_set = ["status_pembelian","tanggalkonfirmasi_pembelian","resipengiriman_pembelian"];
			$value_set = [$status_pembelian, date("Y-m-d"), $resipengiriman_pembelian];
			$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($id_pembelian,$column_set,$value_set);
			if ($runQueryUpdateSpesificPembelian==true) {
				$msg = "Status pembelian berhasil diupdate! "."Status menjadi ".$status_pembelian;
				$objFlash->showSimpleFlash("BERHASIL UPDATE PEMBELIAN","success",$msg,"index.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
			}else{
				$objFlash->showSimpleFlash("TRIGGER ERROR","warning","Terjadi kesalahan!","index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
			}
		}elseif ($_POST['btnSubmitModalPesananPembeli'] == "tolak_pesanan") {
			$id_pembelian = $_POST['idpembelian_dibayar'];
			$catatanpenolakan_pembelian = $_POST['catatanpenolakan_pembelian'];
			$status_pembelian = "Pesanan Dibatalkan";
			$column_set = ["status_pembelian","tanggalkonfirmasi_pembelian","catatanpenolakan_pembelian"];
			$value_set = [$status_pembelian, date("Y-m-d"),$catatanpenolakan_pembelian];
			$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($id_pembelian,$column_set,$value_set);
			if ($runQueryUpdateSpesificPembelian==true) {
				$objFlash->showSimpleFlash("BERHASIL UPDATE PEMBELIAN","success","Pembelian ini dibatalkan. Pesan akan disampaikan ke pembeli!","index.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
			}else{
				$objFlash->showSimpleFlash("TRIGGER ERROR","warning","Terjadi kesalahan!","index.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
			}
		}
	}

	?>
