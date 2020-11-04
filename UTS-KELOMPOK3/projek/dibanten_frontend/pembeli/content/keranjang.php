<?php 
require_once 'headerdashboard.php';
?>
<div class="container">
	<!-- Row 1 (Keranjang Panel)  -->
	<div class="row justify-content-center">
		<div class="col-10 keranjang-panel ">
			<!-- Card per toko -->
				<div class="row">
					<div class="col">
						<div class="card shadow card-toko">
							<div class="card-body">
								<!-- Heading -->
								<div class="row">
									<div class="col-lg keranjang-panel-heading">
										<h3>Toko Griya Agung Banten</h3>
										<p>
											<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;
											Klungkung
										</p>
									</div>
								</div>
								<!-- Akhir heading -->
									<!-- Konten barang yang dibeli -->
									<div class="card mb-3 card-keranjang-banten">
										<div class="row no-gutters">
											<div class="col-lg-5">
												<img src="../../assets/imgbanten/bantentumpeng.png" class="card-img" alt="Foto Banten">
											</div>
											<div class="col-lg-7">
												<div class="card-body">
													<h5 class="card-title">
														Banten Saraswati
													</h5>
													<p class="card-text label-harga" >
														Rp. 1,500,000
													</p>
													<!-- Catatan pemesanan -->
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<p>
																	Catatan Pemesanan
																</p>
																<input type="text" class="form-control catatan-pemesanan" id="catatanpemesanan">
															</div>
														</div>		
													</div>
													<!-- Akhir catatan pemesanan -->
													<div class="row ">
														<div class="col-lg-8">
															<p style="height: 2px"></p>
															<div class="btn-group" role="group" aria-label="Basic example">
																<button type="button" class="btn btn-group-color">
																	<svg viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
																	</svg>
																</button>
																<button type="button" class="btn btn-group-color">
																	<svg  viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 7.5a.5.5 0 0 0 0 1h8a.5.5 0 0 0 0-1H4z"/>
																	</svg>
																</button>
																<button type="button" class="btn btn-group-color">
																	<svg  viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
																	</svg>
																</button>
															</div>
														</div>
														<div class="col-lg-4">
															<input type="number" class="form-control card-input" value="1">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Akhir Konten barang yang dibeli -->
									<!-- Konten barang yang dibeli -->
									<div class="card mb-3 card-keranjang-banten">
										<div class="row no-gutters">
											<div class="col-lg-5">
												<img src="../../assets/imgbanten/bantentumpeng.png" class="card-img" alt="Foto Banten">
											</div>
											<div class="col-lg-7">
												<div class="card-body">
													<h5 class="card-title">
														Banten Pengulap
													</h5>
													<p class="card-text label-harga" >
														Rp. 1,300,000
													</p>
													<!-- Catatan pemesanan -->
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<p>
																	Catatan Pemesanan
																</p>
																<input type="text" class="form-control catatan-pemesanan" id="catatanpemesanan">
															</div>
														</div>		
													</div>
													<!-- Akhir catatan pemesanan -->
													<div class="row ">
														<div class="col-lg-8">
															<p style="height: 2px"></p>
															<div class="btn-group" role="group" aria-label="Basic example">
																<button type="button" class="btn btn-group-color">
																	<svg viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
																	</svg>
																</button>
																<button type="button" class="btn btn-group-color">
																	<svg  viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 7.5a.5.5 0 0 0 0 1h8a.5.5 0 0 0 0-1H4z"/>
																	</svg>
																</button>
																<button type="button" class="btn btn-group-color">
																	<svg  viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
																	</svg>
																</button>
															</div>
														</div>
														<div class="col-lg-4">
															<input type="number" class="form-control card-input" value="1">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Akhir Konten barang yang dibeli -->
							</div>
						</div>
					</div>
				</div>
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

