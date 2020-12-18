<?php
require_once 'headerdashboard.php';
$data_toko = $objNota->getNotaPembeli($pembeli['id_pembeli']);
?>
<div class="container">
	<!-- Row 1 (Checkout-panel)  -->
	<div class="row justify-content-center">
		<div class="col-10 keranjang-panel ">
			<div class="alert alert-secondary" role="alert">
				<h3>Riwayat Belanja</h3>
			</div>
			<!-- Card per toko -->
			<?php  foreach ($data_toko as $id_toko => $data_toko_value ): ?>
				<div class="row">
					<div class="col">
						<div class="card shadow card-toko">
							<div class="card-body">
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
															<p class="card-text label-diskon">
																Tingkatan <?= $pembelian['tingkatanbanten_dp']; ?>
															</p>
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
															<!-- Konten Kiri -->
															<div class="col-lg">
																<h3 class="card-title">
																	Pembelian
																</h3>
																<div class="mb-3">
																	<strong>Nomor Pembelian : <?= $data_pembelian[0]['id_pembelian']; ?></strong><br>
																	Tanggal Pembelian : <?= $data_pembelian[0]['tanggalbeli_pembelian']; ?><br>
																	Total : Rp. <?= number_format($total_belanjaan + $data_pembelian[0]['tarifongkir_pembelian']); ?><br>
																	Status : <strong><?= strtoupper($data_pembelian[0]['status_pembelian']); ?></strong><br>
																</div>
															</div>
															<!-- Akhir Konten Kiri -->
															<!-- Konten Kanan -->
															<div class="col-lg">
																<!-- Konten Lihat Pembayaran -->
																<div class="collapse mb-5" id="collapseLihatPembayaran<?= $id_pembelian; ?>">
																	<img src="../../assets/imgbuktipembayaran/kwitansi-bukti-transaksi.png" alt="Foto Bukti Transfer" class="img-fluid " width="200" height="200">
																	<p class="text-card item-center mt-2">
																		Nama Penyetor : <strong><?= $data_pembelian[0]['namapembeli_pembelian']; ?></strong><br>
																		Tanggal Bayar : <strong><?= $data_pembelian[0]['tanggalkonfirmasi_pembelian']; ?></strong><br>
																		Bank : <strong><?= $data_pembelian[0]['nama_bank']; ?></strong><br>
																		Nomor Rekening : <strong><?= $data_pembelian[0]['rekening_penjual']; ?></strong><br>
																		Jumlah : <strong>Rp. <?= number_format($data_pembelian[0]['totalharga_pembelian']); ?></strong>
																	</p>
																</div>
																<!-- Akhir Konten Lihat Pembayaran -->
																<!-- Button -->
																<div class="row ">
																	<div class="col d-flex justify-content-end">
																		<a href="index.php?page=Nota" class="btn btn-danger tombol mr-3" type="button" role="button">
																			<i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;Nota
																		</a>
																		<?php if ($data_pembelian[0]['status_pembelian']=="Upload Pembayaran" || $data_pembelian[0]['status_pembelian']=="Lunas"): ?>
																			<a  class="btn btn-light tombol " type="button" role="button" name="btnLihatPembayaran" data-idpembelian="<?= $id_pembelian; ?>">
																				<i class="fa fa-sticky-note" aria-hidden="true"  ></i>&nbsp; Struk
																			</a>
																		<?php endif ?>
																	</div>
																</div>
																<!-- Akhir Button -->
															</div>
															<!-- AKhir konten kanan -->
														</div>
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