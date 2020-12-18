<?php
require_once 'headerdashboard.php';

// Menangkap button "Pesanan Selesai"
if (isset($_POST['btnSubmitPesananSelesai'])) {
	$id_pembelian = $_POST['id_pembelian'];
	$rating_toko = $_POST['input_ratingtoko'];
	$id_toko = $_POST['id_toko'];
	//update pembelian set kolom status pembelian = "Selesai"
	$column_set = ["status_pembelian","tanggalkonfirmasi_pembelian"];
	$value_set = ["Selesai", date("Y-m-d")];
	$runQueryUpdateSpesificPembelian = $objPembelian->updateSpesificPembelian($id_pembelian,$column_set,$value_set);
	//get rating toko before
	$data_toko = $objToko->getSpesificDataToko($id_toko);
	$rating_toko_before = $data_toko['rating_toko'];
	if ($rating_toko_before != 0) {
		$rating_toko = ($rating_toko + $rating_toko_before)/2;
	}
	//update rating toko
	$runQueryUpdateRatingToko = $objToko->updateRatingToko($id_toko,$rating_toko);
	if ($runQueryUpdateSpesificPembelian==true && $runQueryUpdateRatingToko==true) {
		$objFlash->showSimpleFlash("PESANAN SAMPAI","success","Horay! Pesananmu sudah sampai!","index.php?page=Nota",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
	}else{
		$objFlash->showSimpleFlash("TERJADI KESALAHAN","warning","Terjadi kesalahan!","index.php?page=Nota",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
	}
}

$data_toko = $objNota->getNotaPembeli($pembeli['id_pembeli']);
//cek tanggalbeli_pembelian jika sudah lewat 2 hari sejak pembelian, maka update pembelian dibatalkan
foreach ($data_toko as $id_toko => $data_toko_value ) {
	foreach ($data_toko[$id_toko]['detail_pembelian'] as $id_pembelian =>  $data_pembelian) {
		if (!empty($data_pembelian)) {
			$group_pembelian = array();
			$group_pembelian = $data_pembelian;
			foreach ($group_pembelian as $value) {
				$diff=0;
				$status_pesanan = $value['status_pembelian'];
				$tanggalbeli_pembelian = $value['tanggalbeli_pembelian'];
				$tanggalkonfirmasi_pembelian = $value['tanggalkonfirmasi_pembelian'];
				$date1=date_create(date("Y-m-d"));
				if ($status_pesanan=="pending") {
					$date2=date_create($tanggalbeli_pembelian);
					$diff=date_diff($date1,$date2)->format("%d");
				}elseif ($status_pesanan=="Upload Pembayaran" || $status_pesanan=="Pesanan Diterima" || $status_pesanan=="Lunas" || $status_pesanan=="Barang Diproses") {
					$date2=date_create($tanggalkonfirmasi_pembelian);
					$diff=date_diff($date1,$date2)->format("%d");
				}
				// Jika selisih 2 hari, maka set status pembelian dibatalkan
				if (($diff>=3) && ($status_pesanan!="Pesanan Dibatalkan")) {
					$id_pembelian = $value['id_pembelian'];
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
						$objFlash->showSimpleFlash("PESANAN DIBATALKAN OTOMATIS","info","Pesanan telah dibatalkan otomatis oleh sistem","index.php?page=Nota",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Home");
					}elseif ($runQueryUpdateSpesificPembelian==false){
						$objFlash->showSimpleFlash("PESANAN GAGAL DIBATALKAN OTOMATIS","warning","Telah terjadi kesalahan!","index.php?page=Nota",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Kembali");
					}
				}
			}
		}
	}
}
?>
<div class="container">
	<!-- Row 1 (Checkout-panel)  -->
	<div class="row justify-content-center">
		<div class="col-10 keranjang-panel ">
			<div class="alert alert-info" role="alert">
				<h3>Nota Pembelian</h3>
			</div>
			<!-- Card per toko -->
			<?php  foreach ($data_toko as $id_toko => $data_toko_value ): ?>
				<div class="row">
					<div class="col">
						<div class="card shadow card-toko">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<?php
										
										?>
									</div>
								</div>
								<!-- Heading -->
								<div class="row ">
									<div class="col-lg keranjang-panel-heading d-flex justify-content-between">
										<div>
											<h3><?= $data_toko_value['detail_toko'][0]['namatoko_dp']; ?></h3>
											<p>
												<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;
												<?= $data_toko_value['detail_toko'][0]['kotatoko_dp']; ?>
											</p>
										</div>
										<div>
											<a class="btn btn-danger rounded-circle tombol" href="index.php">
												<i class="fa fa-home fa-2x" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
								<!-- Akhir heading -->

								<!-- Konten barang yang dibeli -->
								<?php
								// foreach ($data_toko[$id_toko]['detail_pembelian'] as $id_pembelian =>  $data_pembelian) {
								// 	if (!empty($data_pembelian)) {
								// 		$group_pembelian = array();
								// 		$group_pembelian = $data_pembelian;
								// 		foreach ($group_pembelian as $value) {
								// 			print_r($value);
								// 			echo '<br><br>';
								// 		}
								// 		echo "<br>".'NEXT';
								// 	}
								// }
								?>
								<?php foreach ($data_toko[$id_toko]['detail_pembelian'] as $id_pembelian =>  $data_pembelian): ?>
									<?php if (!empty($data_pembelian)): ?>
										<?php $total_belanjaan = 0; ?>
										<?php foreach ($data_pembelian as $pembelian): ?>
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
															<p class="card-text">
																<?= $pembelian['catatanpemesanan_dp']; ?>
															</p>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach ?>
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
																<strong>Nomor Pembelian : <?= $data_pembelian[0]['id_pembelian']; ?></strong><br>
																Tanggal Pembelian : <?= $data_pembelian[0]['tanggalbeli_pembelian']; ?><br>
																Tanggal Pengiriman : <?= $data_pembelian[0]['tanggalkirim_pembelian']; ?><br>
																Total : <strong>Rp. <?= number_format($total_belanjaan + $data_pembelian[0]['tarifongkir_pembelian']); ?></strong>
																<br>
																Status Pembelian : <?= ucfirst($data_pembelian[0]['status_pembelian']); ?>
															</div>
															<!-- Akhir Pembelian -->
															<!-- Pelanggan -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pelanggan
																</h3>
																<strong><?= $data_pembelian[0]['namapembeli_pembelian']; ?>	</strong><br>
																<?= $data_pembelian[0]['hppembeli_pembelian']; ?> / <?= $data_pembelian[0]['emailpembeli_pembelian']; ?>
															</div>
															<!-- AKhir Pelanggan -->
															<!-- Pengiriman -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pengiriman
																</h3>
																<strong><?= $data_pembelian[0]['jasapengiriman_pembelian']; ?></strong><br>
																Tarif Pengiriman : Rp. <?= number_format($data_pembelian[0]['tarifongkir_pembelian']); ?><br>
																Alamat : <?= $data_pembelian[0]['alamatpengiriman_pembelian']; ?> [<?= $data_pembelian[0]['kodepospengiriman_pembelian']; ?> - <?= $data_pembelian[0]['kotapengiriman_pembelian']; ?> - <?= $data_pembelian[0]['provinsipengiriman_pembelian']; ?>]
															</div>
															<!-- AKhir Pengiriman -->
														</div>
														<!-- Alert Pembayaran -->
														<?php if ($pembelian['status_pembelian']=="pending"): ?>
															<div class="alert alert-warning alert-dismissible fade show" role="alert">
																<strong>Menunggu konfirmasi pesanan</strong>. Pesananmu telah masuk ke penjual. Tunggu konfirmasi pesananmu dari penjual! Pesanan akan <strong>dibatalkan</strong> 2 hari sejak pesanan dibuat, jika penjual tidak menanggapinya.
																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
														<?php endif ?>
														<?php if ($pembelian['status_pembelian']=="Barang Dikirim"): ?>
															<button type="button" class="btn btn-success tombol btn-pesananditerima" data-toggle="modal" data-target="#modalPesananDiterimaPembeli" data-idpembelian = "<?= $pembelian['id_pembelian']; ?>">
																Pesanan Sampai
															</button>
														<?php endif ?>
														<?php if ($pembelian['status_pembelian']=="Pesanan Diterima"): ?>
															<div class="row mt-5">
																<div class="col">
																	<div class="row">
																		<div class="col">
																			<div class="alert alert-primary " role="alert">
																				<strong>Sudah dikonfirmasi!</strong> Pesananmu sudah diterima. Selesaikan pembayaran agar pesananmu segera diproses dan dikirim oleh penjual. Pesananmu akan <strong>dibatalkan</strong> otomatis oleh sistem <strong>2 hari</strong> sejak pesanan dikonfirmasi!
																			</div>
																		</div>
																	</div>
																	<?php
																//get data penjual by id_toko nya
																	$runQueryGetDataPenjualAndBankByIdToko = $objPenjual->getDataPenjualAndBankByIdToko($id_toko);
																	while ($penjual = $runQueryGetDataPenjualAndBankByIdToko->fetch_assoc()) :?>
																		<div class="row">
																			<div class="col">
																				<div class="alert alert-danger" role="alert">
																					<h4 class="alert-heading">Pembayaran</h4>
																					<p>
																						Silahkan lakukan pembayaran sebesar Rp <?= number_format($total_belanjaan + $data_pembelian[0]['tarifongkir_pembelian']); ?> ke <br><strong> Bank <?= $penjual['nama_bank']; ?> <?= $penjual['rekening_penjual']; ?> A.N <?= $penjual['namadepan_penjual']." ".$penjual['namabelakang_penjual']; ?></strong>
																					</p>
																					<hr>
																					<p class="mb-0">
																						<a href="#" class="btn btn-primary tombol " type="button" role="button" data-toggle="modal" data-target="#modalKonfirmasiPembayaran" data-idpembelian="<?= $id_pembelian; ?>" data-totalpembayaran="<?= number_format($total_belanjaan + $data_pembelian[0]['tarifongkir_pembelian']); ?>"  name="btnPembayaran">
																							<i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp; Bayar
																						</a>
																					</p>
																				</div>
																			</div>
																		</div>
																	<?php endwhile; ?>
																</div>
															</div>
														<?php endif ?>
														<?php if ($pembelian['status_pembelian']=="Pesanan Dibatalkan"): ?>
															<div class="alert alert-danger" role="alert">
																<strong>Pesanan Dibatalkan</strong>. <?= $pembelian['catatanpenolakan_pembelian']; ?>
															</div>
														<?php endif ?>
														<?php if ($pembelian['status_pembelian']=="Upload Pembayaran"): ?>
															<div class="alert alert-warning " role="alert">
																<strong>Menunggu konfirmasi pembayaran!</strong> Pembayaranmu telah diterima oleh penjual. Tunggu penjual mengonfirmasinya. Pesanan akan <strong>dibatalkan</strong> dalam waktu <strong>2 hari</strong> terhitung dari pesanan dibayarkan jika penjual tidak meresponnya!. 
															</div>
														<?php endif ?>
														<?php if ($pembelian['status_pembelian']=="Lunas"): ?>
															<div class="alert alert-info " role="alert">
																<strong>Pembayaran diterima!</strong> Pembayaranmu telah diterima oleh penjual. Tunggu pesananmu dikirim. Pesanan akan <strong>dibatalkan</strong> dan pembayaran akan <strong>dikembalikan</strong> dalam waktu <strong>2 hari</strong> terhitung dari pembayaran dikonfirmasi!  
															</div>
														<?php endif ?>
														<!-- Akhir alert pembayaran -->
													</div>
												</div>
											</div>
										</div>
										<!-- Akhir Informasi Pembelian -->
									<?php endif ?>
								<?php endforeach ?>
								<!-- Akhir Konten barang yang dibeli -->
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
	if (isset($_POST['btnSubmitPesananSelesai'])) {
		print_r($_POST);
	}
	?>