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
											<a class="btn btn-danger rounded-circle tombol" href="index.php?page=Keranjang">
												<i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
								<!-- Akhir heading -->
								<!-- Konten barang yang dibeli -->
									<div class="card mb-3 card-keranjang-banten">
										<div class="row no-gutters">
											<div class="col-lg-6">
												<img src="../../assets/imgbanten/bantentumpeng.png" class="card-img" alt="Foto Banten">
											</div>
											<div class="col-lg-6">
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
								<!-- Akhir Konten barang yang dibeli -->
								<form action="index.php?page=Nota" method="post">
									<!-- Lewatkan id_pembeli -->
									<input type="hidden" name="idpembeli_pembelian" value="">
									<!-- lewatkan id_toko untuk memasukkan data belanjaan berdasarkan tokonya -->
									<input type="hidden" name="idtoko_checkout" value="">
									<!-- Informasi Penerima dan lokasi pengiriman -->
									<div class="row">
										<div class="col-lg">
											<label for="namapembeli_pembelian">Nama Pembeli</label>
											<input type="text" class="form-control input-login" name="namapembeli_pembelian" value="Satria Bimantara" required="true">
										</div>
										<div class="col-lg">
											<label for="emailpembeli_pembelian">Email</label>
											<input type="email" class="form-control input-login" name="emailpembeli_pembelian" value="satria@gmail.com" required="true">
										</div>
										<div class="col-lg">
											<label for="hppembeli_pembelian">Nomor Handphone</label>
											<input type="number" class="form-control input-login" name="hppembeli_pembelian" value="081234567890" minlength="12" required="true">
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<label for="alamatpengiriman_pembelian">Alamat Pengiriman</label>
											<textarea id="" rows="3" class="form-control input-login" name="alamatpengiriman_pembelian" required='true'>Jl. Abcdefg</textarea  >
										</div>
										<div class="col-lg">
											<label for="kodepospengiriman_pembelian">Kodepos</label>
											<input type="text" class="form-control input-login" value="123456" name="kodepospengiriman_pembelian" required='true'>
										</div>
										<div class="col-lg">
											<label for="kotapengiriman_pembelian">Kota Pengiriman</label>
											<select class="form-control input-login " name="kotapengiriman_pembelian" required="true" title="Pilih Kota Pengiriman" aria-describedby="kotapengiriman_help">
												<option value="">- Pilih Kota Pengiriman -</option>
												<option value="Denpasar">Denpasar</option>
											</select>
											<small id="kotapengiriman_help" class="form-text text-muted">Kota tempat barang diterima</small>
										</div>
										<div class="col-lg">
											<label for="provinsipengiriman_pembelian">Provinsi</label>
											<input type="text" class="form-control input-login" value="Bali" name="provinsipengiriman_pembelian" readonly="true">
										</div>
									</div>
									<!-- Akhir informasi penerima dan lokasi pengiriman -->
									<!-- Ongkos Kirim, tanggal, shippers, button checkout -->
									<div class="row">
										<!-- Tanggal Pengiriman -->
										<div class="form-group col-lg-6 ">
											<label for="tanggalkirim_pembelian">Tanggal Pengiriman</label>
											<input type="hidden" name="tanggalbeli_pembelian" value="">
											<input type="date" name="tanggalkirim_pembelian" class="form-control input-login tanggal_pengiriman" value="" required="true" title="Tentukan tanggal pengiriman barang" data-id="">
										</div>
										<div class="form-group col-lg-4">
											<label for="tarifongkir_pembelian">Tarif Pengiriman</label>
											<select class="form-control input-login btn-select-ongkir" name="tarifongkir_pembelian" title="Tentukan tarif pengiriman barang" required="true" >
												<option value="" class="first-select">- Pilih Ongkir Kota Tujuan -</option>
												<option value="20000">Denpasar-Rp. 20,000</option>
											</select>
										</div>
										<div class="form-group col-lg-2">
											<label for="jasapengiriman_pembelian">Jasa Pengiriman</label>
											<select class="form-control input-login btn-select-jasa" name="jasapengiriman_pembelian" title="Tentukan jasa pengiriman barang" required="true" >
												<option value="" class="first-select">- Pilih Jasa Pengiriman -</option>
												<option value="gojek">GOJEK - GOSEND</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col justify-content-between d-flex">
											<div>
												<h5 class="card-title">Total Belanjaan</h5>
												<p class="card-text label-harga" >
													Rp. 1,500,000
												</p>
											</div>
											<div>
												<button class="btn btn-primary tombol " type="submit" name="btnCheckout" value="">
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
			<!-- Akhir card per toko -->
		</div>
	</div>
	<!-- Akhir div Row 1 (Checkout-panel) berada di index-->