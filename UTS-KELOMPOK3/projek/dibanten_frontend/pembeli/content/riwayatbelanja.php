<?php
require_once 'headerdashboard.php';
?>
<div class="container">
	<!-- Row 1 (Checkout-panel)  -->
	<div class="row justify-content-center">
		<div class="col-10 keranjang-panel ">
			<div class="alert alert-secondary" role="alert">
				<h3>Riwayat Belanja</h3>
			</div>
			<!-- Card per toko -->
				<div class="row">
					<div class="col">
						<div class="card shadow card-toko">
							<div class="card-body">
								<!-- Heading -->
								<div class="row ">
									<div class="col-lg keranjang-panel-heading d-flex justify-content-between">
										<div>
											<h3>Toko Griya Agung Banten</h3>
											<p>
												<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;
												Klungkung
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
											<div class="card mb-3 card-keranjang-banten">
												<div class="row no-gutters">
													<div class="col-lg-5">
														<img src="../../assets/imgbanten/bantentumpeng.png" class="card-img" alt="Foto Banten">
													</div>
													<div class="col-lg-3">
														<div class="card-body">
															<h5 class="card-title">
																Banten Saraswati
															</h5>
															<p class="card-text label-diskon">
																Tingkatan Madya
															</p>
															<p class="card-text label-harga" >
																Rp. 1,500,000
															</p>
															<p class="card-text">
																
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
															<!-- Konten Kiri -->
															<div class="col-lg">
																<h3 class="card-title">
																	Pembelian
																</h3>
																<div class="mb-3">
																	<strong>Nomor Pembelian : 1</strong><br>
																	Tanggal Pembelian : 2020-11-04<br>
																	Total : Rp. 1,520,000<br>
																	Status : <strong>Upload Bukti Pembayaran</strong><br>
																</div>
															</div>
															<!-- Akhir Konten Kiri -->
															<!-- Konten Kanan -->
															<div class="col-lg">
																<!-- Konten Lihat Pembayaran -->
																<div class="collapse mb-5" id="collapseLihatPembayaran1">
																	<img src="../../assets/imgbuktipembayaran/kwitansi-bukti-transaksi.png" alt="Foto Bukti Transfer" class="img-fluid " width="200" height="200">
																	<p class="text-card item-center mt-2">
																		Nama Penyetor : <strong>I Made Satria Bimantara</strong><br>
																		Tanggal Bayar : <strong>2020-11-02</strong><br>
																		Bank : <strong>BNI-46</strong><br>
																		Nomor Rekening : <strong>01398842</strong><br>
																		Jumlah : <strong>Rp. 1,500,000</strong>
																	</p>
																</div>
																<!-- Akhir Konten Lihat Pembayaran -->
																<!-- Button -->
																<div class="row ">
																	<div class="col d-flex justify-content-end">
																		<a href="index.php?page=Nota" class="btn btn-danger tombol mr-3" type="button" role="button">
																			<i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;Nota
																		</a>
																			
																		<a  class="btn btn-light tombol " type="button" role="button" name="btnLihatPembayaran" data-idpembelian="1">
																			<i class="fa fa-sticky-note" aria-hidden="true"  ></i>&nbsp; Struk
																		</a>
																			
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
											<div class="card mb-3 card-keranjang-banten">
												<div class="row no-gutters">
													<div class="col-lg-5">
														<img src="../../assets/imgbanten/canangsari-21.png" class="card-img" alt="Foto Banten">
													</div>
													<div class="col-lg-3">
														<div class="card-body">
															<h5 class="card-title">
																Banten Galungan
															</h5>
															<p class="card-text label-diskon">
																Tingkatan Madya
															</p>
															<p class="card-text label-harga" >
																Rp. 120,000
															</p>
															<p class="card-text">
																
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
															<!-- Konten Kiri -->
															<div class="col-lg">
																<h3 class="card-title">
																	Pembelian
																</h3>
																<div class="mb-3">
																	<strong>Nomor Pembelian : 2</strong><br>
																	Tanggal Pembelian : 2020-11-04<br>
																	Total : Rp. 1,520,000<br>
																	Status : <strong>Pending</strong><br>
																</div>
															</div>
															<!-- Akhir Konten Kiri -->
															<!-- Konten Kanan -->
															<div class="col-lg">
																<!-- Button -->
																<div class="row ">
																	<div class="col d-flex justify-content-end">
																		<a href="index.php?page=Nota" class="btn btn-danger tombol mr-3" type="button" role="button">
																			<i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;Nota
																		</a>
																			
																		<a href="#" class="btn btn-primary tombol " type="button" role="button" data-toggle="modal" data-target="#modalKonfirmasiPembayaran" data-idpembelian="2"  data-totalpembayaran="120000"  name="btnPembayaran">
																				<i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp; Bayar
																			</a>
																			
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
									<!-- Akhir Konten barang yang dibeli -->
								</div>
							</div>
						</div>
					</div>
				<!-- Akhir card per toko -->
			</div>
		</div>
	<!-- Akhir div Row 1 (Checkout-panel) berada di index-->