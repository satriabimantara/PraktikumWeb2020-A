<?php
require_once 'headerdashboard.php';
?>
<div class="container">
	<!-- Row 1 (Checkout-panel)  -->
	<div class="row justify-content-center">
		<div class="col-10 keranjang-panel ">
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
															<!-- Pembelian -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pembelian
																</h3>
																<strong>Nomor Pembelian : 1</strong><br>
																Tanggal Pembelian : 2020-11-04<br>
																Tanggal Pengiriman : 2020-11-05<br>
																Total : <strong>Rp. 1,520,000</strong>
															</div>
															<!-- Akhir Pembelian -->
															<!-- Pelanggan -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pelanggan
																</h3>
																<strong>Satria Bimantara</strong><br>
																081234567890 / satria@gmail.com
															</div>
															<!-- AKhir Pelanggan -->
															<!-- Pengiriman -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pengiriman
																</h3>
																<strong>GOJEK - GOSEND</strong><br>
																Tarif Pengiriman : Rp. 20,000<br>
																Alamat : Jl. Abcdefg - [123456 - Denpasar - Bali]
															</div>
															<!-- AKhir Pengiriman -->
														</div>
														<!-- Alert Pembayaran -->
															<div class="row mt-5">
																<div class="col">
																		<div class="row">
																			<div class="col">
																			<div class="alert alert-primary alert-dismissible fade show" role="alert">
																					<strong>
																						<i class="fa fa-check" aria-hidden="true"></i>&nbsp;
																						Upload Bukti Pembayaran
																							
																						</strong> 
																					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																					</button>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
															
															<!-- Akhir alert pembayaran -->
														</div>
													</div>
												</div>
											</div>
											<!-- Akhir Informasi Pembelian -->
								<!-- Konten barang yang dibeli -->
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
															<!-- Pembelian -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pembelian
																</h3>
																<strong>Nomor Pembelian : 2</strong><br>
																Tanggal Pembelian : 2020-11-04<br>
																Tanggal Pengiriman : 2020-11-05<br>
																Total : <strong>Rp. 140,000</strong>
															</div>
															<!-- Akhir Pembelian -->
															<!-- Pelanggan -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pelanggan
																</h3>
																<strong>Satria Bimantara</strong><br>
																081234567890 / satria@gmail.com
															</div>
															<!-- AKhir Pelanggan -->
															<!-- Pengiriman -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pengiriman
																</h3>
																<strong>GOJEK - GOSEND</strong><br>
																Tarif Pengiriman : Rp. 20,000<br>
																Alamat : Jl. Abcdefg - [123456 - Denpasar - Bali]
															</div>
															<!-- AKhir Pengiriman -->
														</div>
														<!-- Alert Pembayaran -->
															<div class="row mt-5">
																<div class="col">
																		<div class="row">
																			<div class="col">
																				<div class="alert alert-danger" role="alert">
																					<h4 class="alert-heading">Pembayaran</h4>
																					<p>
																						Silahkan lakukan pembayaran sebesar Rp 1,520,000 ke <br><strong> Bank BCA 123456789 A.N Devan Bramantya</strong>
																					</p>
																					<hr>
																					<p class="mb-0">
																						<a href="#" class="btn btn-primary tombol " type="button" name="btnPembayaran">
																							<i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp; Bayar
																						</a>
																					</p>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
															
															<!-- Akhir alert pembayaran -->
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