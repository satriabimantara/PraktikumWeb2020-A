<?php
require_once 'headerdashboard.php';
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
					<div class="row">
						<div class="col">
							<div class="card shadow card-toko">
								<div class="card-body">
									<!-- Heading -->
									<div class="row ">
										<div class="col-lg keranjang-panel-heading d-flex justify-content-between">
											<div>
												<h3>Satria Bimantara</h3>
												<p>
													<i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;
													satria@gmail.com
												</p>
												<p>
													<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;
													081234567890
												</p>
											</div>
											<div>
												<div class="alert alert-danger" role="alert">
													<h5>1</h5>
												</div>
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
																Tanggal Pembelian : 2020-11-04<br>
																Tanggal Pengiriman : 2020-11-05<br>
																Total : <strong>Rp. 1,520,000</strong>
															</div>
															<!-- Akhir Pembelian -->
															<!-- STatus -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Status Barang
																</h3>
																[Pending]
																
															</div>
															<!-- AKhir STatus -->
															<!-- Pengiriman -->
															<div class="col-lg-4 mt-1 mb-3">
																<h3 class="card-title">
																	Pengiriman
																</h3>
																<strong>GOJEK - GOSEND</strong><br>
																Tarif Pengiriman : Rp. 20,000<br>
																Alamat : Jl. abc [123456 - Denpasar - Bali]
															</div>
															<!-- AKhir Pengiriman -->
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Akhir Informasi Pembelian -->
									<!-- Akhir Konten barang yang dibeli -->
									<!-- Button Footer -->
									<div class="d-flex justify-content-between">
										<a href="#" class="btn btn-warning tombol " type="button" role="button" data-toggle="modal" data-target="#modalLihatPembayaranPembeli" data-idpembelian="<?= $id_pembelian; ?>"name="btnEditPembelianPembeli">
											<i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Edit Pembelian
										</a>
										
											<a href="#" class="btn btn-primary tombol " type="button" role="button" data-toggle="modal" data-target="#modalLihatPembayaranPembeli" data-idpembelian="<?= $id_pembelian; ?>"name="btnKonfirmasiPembayaranPembeli">
												<i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp; Lihat Pembayaran
											</a>
									</div>
									<!-- Akhir button footer -->
								</div>
							</div>
						</div>
					</div>
				<!-- Akhir Card Per Pembelian-->
			</div>
		</div>
		<!-- Akhir Konten Pesanan Masuk -->
	<!-- Akhir Service Container berada di index-->