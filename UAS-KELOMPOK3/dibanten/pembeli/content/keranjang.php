<?php 
require_once 'headerdashboard.php';
if (!isset($_SESSION['keranjang']) || empty($_SESSION['toko']) || empty($_SESSION['keranjang'])) {
	//alert keranjang kosong
	$objFlash->showSimpleFlash("KERANJANG KOSONG","warning",'Belum ada barang di keranjang!',"index.php",$confirmButtonColor="#4BB543",$cancelButtonColor = "#d33","Beranda");
	exit();
}
?>
<div class="container">
	<!-- Row 1 (Keranjang Panel)  -->
	<div class="row justify-content-center">
		<div class="col-10 keranjang-panel ">
			<!-- Card per toko -->
			<?php foreach ($_SESSION['toko'] as $id_toko => $detail_toko): ?>
				<div class="row">
					<div class="col">
						<div class="card shadow card-toko">
							<div class="card-body">
								<!-- Heading -->
								<div class="row">
									<div class="col-lg keranjang-panel-heading">
										<h3><?= $detail_toko['nama_toko']; ?></h3>
										<p>
											<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;
											<?= $detail_toko['kota_toko']; ?>
										</p>
									</div>
								</div>
								<!-- Akhir heading -->
								<?php foreach ($_SESSION['keranjang'][$id_toko] as $detail_banten): ?>
									<!-- Konten barang yang dibeli -->
									<div class="card mb-3 card-keranjang-banten">
										<div class="row no-gutters">
											<div class="col-lg-5">
												<img src="../../assets/imgbanten/<?= $detail_banten['foto_banten']; ?>" class="card-img" alt="Foto Banten">
											</div>
											<div class="col-lg-7">
												<div class="card-body">
													<h5 class="card-title">
														<?= $detail_banten['nama_banten']; ?>
													</h5>
													<p class="card-text label-harga" >
														Rp. <?= number_format($detail_banten['hargadiskon_detail']); ?>
													</p>
													<!-- Catatan pemesanan -->
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<p>
																	Catatan Pemesanan
																</p>
																<input type="text" class="form-control catatan-pemesanan" id="catatanpemesanan<?= $detail_banten['id_detail']; ?>" value="<?= $detail_banten['catatan_pemesanan']; ?>" data-id_detail = "<?= $detail_banten['id_detail']; ?>" data-id_toko = "<?= $id_toko; ?>" >
															</div>
														</div>		
													</div>
													<!-- Akhir catatan pemesanan -->
													<div class="row ">
														<div class="col-lg-8">
															<p style="height: 2px"></p>
															<div class="btn-group" role="group" aria-label="Basic example">
																<button type="button" class="btn btn-group-color btnHapusBantenKeranjang" data-id_detail="<?= $detail_banten['id_detail']; ?>" data-id_toko = "<?= $id_toko; ?>" >
																	<svg viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
																	</svg>
																</button>
																<button type="button" class="btn btn-group-color btnKurangBantenKeranjang " data-id_detail="<?= $detail_banten['id_detail']; ?>" data-id_toko = "<?= $id_toko; ?>" id="btnKurangBantenKeranjang<?= $detail_banten['id_detail']; ?>">
																	<svg  viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 7.5a.5.5 0 0 0 0 1h8a.5.5 0 0 0 0-1H4z"/>
																	</svg>
																</button>
																<button type="button" class="btn btn-group-color btnTambahBantenKeranjang" data-id_detail="<?= $detail_banten['id_detail']; ?>" data-id_toko = "<?= $id_toko; ?>">
																	<svg  viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
																	</svg>
																</button>
															</div>
														</div>
														<div class="col-lg-4">
															<input type="number" class="form-control card-input" value="<?= $detail_banten['jumlah_dibeli']; ?>" min="1" max="<?= $detail_banten['stok_detail']; ?>" id="<?= $detail_banten['id_detail']; ?>">
														</div>
													</div>
													<div id="alertMaximumStockLimit<?= $detail_banten['id_detail']; ?>" style="display: none;">
														<div class="row mt-5">
															<div class="col">
																<div class="alert alert-danger" role="alert">
																	<strong>Peringatan! </strong>Anda sudah mencapai jumlah stok maksimal yang dapat dibeli!
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Akhir Konten barang yang dibeli -->
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			<!-- Akhir card per toko -->
			<!-- Button Row -->
			<div class="row">
				<div class="col d-flex justify-content-between">
					<a href="index.php" class="btn btn-info tombol rounded-circle">
						<i class="fa fa-home fa-2x" aria-hidden="true"></i>
					</a>
					<a href="index.php?page=Checkout" class="btn btn-primary tombol rounded-circle">
						<i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i>
					</a>
				</div>
			</div>
			<!-- Akhir button row -->
		</div>
	</div>
	<!-- Akhir div row 1 (keranjang Panel) berada di index-->
	<?php 
	// echo "<pre>";
	// print_r($_SESSION['keranjang']);
	// echo "</pre>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_SESSION['toko']);
	// echo "</pre>";
	// echo "<br>";
	?>

