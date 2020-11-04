<?php 
require_once 'headerdashboard.php';
?>
<!-- Etalase Banten -->

<div class="container ">
	<div class="row justify-content-center">
		<div class="col-10 service-panel">
			<!-- Jika ada banten yang ditampilkan -->
				<!-- Heading -->
				<div class="row mb-lg-3">
					<div class="col">
						<nav class="navbar navbar-expand-lg navbar-light ">
							<h5 class="navbar-brand etalase-header">
								Etalase Banten
							</h5>		
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEtalaseBanten" aria-controls="navbarEtalaseBanten" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarEtalaseBanten">
								<ul class="navbar-nav ml-auto">
									<form class="form-inline my-2 my-lg-0">
										<div class="form-group  mr-sm-2">
											<select class="form-control input-login" id="id_kategori">
												<option value="">- Kategori  -</option>
												<option value="1">Dewa Yadnya</option>
											</select>
										</div>
										<button class="btn btn-outline-success my-2 my-sm-0 tombol" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
									</form>
								</ul>
							</div>
					</nav>
				</div>
			</div>
			<!-- End Heading -->

			<!-- Konten Etalase -->
			<div class="row mb-3 mt-3">
					<div class="col-lg-6 mb-5 ">
						<div class="card shadow">
							<div class="card-header bg-transparent">
								<div class="d-flex justify-content-between">
									<h3 style="font-family: 'Kanit', sans-serif;">
										Banten Saraswati
									</h3>
									<!-- Button trigger modal -->
									<button type="button" class="btn tombol-card btn-danger tampilModalTambahInformasiBanten" data-toggle="modal" data-id="1" data-target="#modalInformasiBanten" name="btnTambahInformasiBanten" value="" title="Lengkapi Informasi Banten">
										<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 mb-lg-0">
										<img src="../../assets/imgbanten/bantentumpeng.png" alt="Foto Banten" class="img-fluid img-etalase">

									</div>
									<div class="col-lg-6">
										<div class="row">
											<div class="col">
												<h4>Kategori</h4>
												<p>Dewa Yadnya</p>
												<h4>Deskripsi</h4>
												<p>abc</p>
												<h4>Kelengkapan</h4>
												<p>abc</p>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="btn-group ml-auto btn-block" role="group" aria-label="Button Detail">
													<!-- Button trigger modal -->
													<button type="button" class="btn tombol-card btn-dark tampilModalHapusInformasiBanten" data-id="1" data-toggle="modal" data-target="#modalInformasiBanten" name="btnHapusBanten" value="" title="Hapus Banten">
														<i class="fa fa-trash-o fa-lg"></i>
													</button>
													<a class="btn btn-dark tombol-card" title="Detail Banten" href="index.php?page=Detail Banten">
														<i class="fa fa-th-list" aria-hidden="true"></i>
													</a>
													<button type="button" class="btn btn-dark  tombol-card tampilModalEditInformasiBanten" data-toggle="modal" data-target="#modalInformasiBanten" name="btnEditBanten" value="" data-id="1" title="Edit Banten"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-5 ">
						<div class="card shadow">
							<div class="card-header bg-transparent">
								<div class="d-flex justify-content-between">
									<h3 style="font-family: 'Kanit', sans-serif;">
										Banten Galungan
									</h3>
									<!-- Button trigger modal -->
									<button type="button" class="btn tombol-card btn-danger tampilModalTambahInformasiBanten" data-toggle="modal" data-id="1" data-target="#modalInformasiBanten" name="btnTambahInformasiBanten" value="" title="Lengkapi Informasi Banten">
										<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 mb-lg-0">
										<img src="../../assets/imgbanten/canangsari-21.png" alt="Foto Banten" class="img-fluid img-etalase">

									</div>
									<div class="col-lg-6">
										<div class="row">
											<div class="col">
												<h4>Kategori</h4>
												<p>Dewa Yadnya</p>
												<h4>Deskripsi</h4>
												<p>123</p>
												<h4>Kelengkapan</h4>
												<p>123</p>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="btn-group ml-auto btn-block" role="group" aria-label="Button Detail">
													<!-- Button trigger modal -->
													<button type="button" class="btn tombol-card btn-dark tampilModalHapusInformasiBanten" data-id="1" data-toggle="modal" data-target="#modalInformasiBanten" name="btnHapusBanten" value="" title="Hapus Banten">
														<i class="fa fa-trash-o fa-lg"></i>
													</button>
													<a class="btn btn-dark tombol-card" title="Detail Banten" href="index.php?page=Detail Banten">
														<i class="fa fa-th-list" aria-hidden="true"></i>
													</a>
													<button type="button" class="btn btn-dark  tombol-card tampilModalEditInformasiBanten" data-toggle="modal" data-target="#modalInformasiBanten" name="btnEditBanten" value="" data-id="1" title="Edit Banten"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<!-- Akhir Konten Etalase -->
			<nav aria-label="Page navigation example">
				<div class="row pagination pagination-lg">
					<!-- Tombol Before -->
					<div class="col-2 d-flex justify-content-start">
						<li class="page-item ">
							<button class="page-link" type="submit">
											<span aria-hidden="true" class="btn-previous" >&laquo;</span>
										</button>
									</form>
								</li>
							</div>
							<!-- Akhir tombol before -->
							<div class="col-8 d-flex justify-content-center">
									<li class="page-item">
										<button class="page-link page-number" type="submit">1</button>
									</li>
									</div>
									<!-- Tombol Next -->
									<div class="col-2 d-flex justify-content-end">
										<li class="page-item">
														<button class="page-link" type="submit">
															<span aria-hidden="true" class="btn-next">&raquo;</span>
														</button>
													</form>
												</li>
											</div>
											<!-- Akhir tombol next -->
										</div>
									</nav>
							</div>
						</div>
						<!-- Akhir Etalase Banten div berada di index -->
						<!-- Modal Tambah Informasi Banten dan Hapus Banten Bersangkutan -->
						<form method="post" enctype="multipart/form-data">
							<div class="modal fade" id="modalInformasiBanten" tabindex="-1" role="dialog" aria-labelledby="modalInformasiBantenLabel" aria-hidden="true" data-backdrop="static">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalInformasiBantenLabel">
												Lengkapi Informasi Barang
											</h5>
											<button type="button" class="close close-etalase" data-dismiss="modal"  aria-label="Close" id="btnCloseModalInformasiBanten">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<img src="" class=" img-thumbnail-modal d-block mx-auto " alt="Foto Banten" id="foto_bantenSelected">
											<!-- konten edit informasi toko -->
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group ">
														<label for="nama_bantenSelected" class="form-label">Nama Barang</label>
														<input type="text" class="form-control modal-input" id="nama_bantenSelected" value="" name="nama_bantenSelected" required="true" >
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group ">
														<label for="id_kategoriSelected" class="form-label">Kategori</label>
														<select  id="id_kategoriSelected" class="form-control modal-input" name="id_kategoriSelected" required="true">
															<option value="">- Kategori -</option>
															<option value="">Dewa Yadnya</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="deskripsi_bantenSelected" class="form-label"> Deskripsi</label>
														<textarea type="text" class="form-control modal-input" id="deskripsi_bantenSelected" value="" name="deskripsi_bantenSelected" required="true" rows="5" aria-describedby="deskripsi_bantenSelected" maxlength="300" ></textarea>
														<small id="deskripsi_bantenSelected" class="form-text text-muted small-modal-etalase">Beri keterangan maksimal 400 karakter</small>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="kelengkapan_bantenSelected" class="form-label">Kelengkapan</label>
														<textarea type="text" class="form-control modal-input" id="kelengkapan_bantenSelected" value="" name="kelengkapan_bantenSelected" required="true" rows="5" maxlength="400" aria-describedby="kelengkapan_bantenSelected" ></textarea>
														<small id="kelengkapan_bantenSelected" class="form-text text-muted small-modal-etalase">Beri keterangan maksimal 400 karakter</small>
													</div>
												</div>
											</div>
											<!-- Konten yang khusus ditampilkan ketika button tambah banten ditekan, selain itu maka hide ini -->
											<div id="modal-tambah-etalase">
												<!-- Harga -->
												<div class="row">
													<div class="col-lg-8">
														<label for="harga_banten" class="form-label">Harga Barang</label>
														<input type="number" class="form-control modal-input" id="harga_banten" value="" name="harga_banten" >
													</div>
													<div class="col-lg-4">
														<label for="diskon_banten" class="form-label">Diskon Barang</label>
														<input type="number" class="form-control modal-input" id="diskon_banten" value="" name="diskon_banten"  aria-describedby="diskon_bantenDescribe">
														<small id="diskon_bantenDescribe" class="form-text text-muted small-modal-etalase">Masukkan hanya angka saja!</small>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-8">
														<!-- Tingkatan banten -->
														<div class="form-group">
															<label for="id_tingkatan" class="form-label">Tingkatan</label>
															<select id="id_tingkatan" class="form-control modal-input etalase-target-select" name="id_tingkatan" >
																<option value="">- Tingkatan -</option>
																<option value="">Madya</option>
															</select>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group">
															<!-- Stok -->
															<label for="stok_banten" class="form-label">Stok Barang</label>
															<input type="number" class="form-control modal-input" id="stok_banten" value="" name="stok_banten" >
														</div>
													</div>
												</div>
											</div>
											<!-- AKhir konten hapus banten -->
											<!-- Upload foto hanya muncul ketika banten diedit -->
											<div id="modal-edit-etalase">
												<label for="foto_bantenBaru" class="form-label">Upload Foto (JPG 2MB)</label>
												<!-- Upload foto -->
												<div class="form-group">
													<div class="custom-file mt-2">
														<input type="file" class="custom-file-input " name="foto_bantenBaru" id="foto_bantenBaru" value="" >
														<label for="foto_bantenBaru" class="custom-file-label modal-input">Foto barang</label>
													</div>
												</div>
											</div>
											<!-- akhir upload foto -->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
											<div id="alreadyTingkatanBanten">
												<div class="alert alert-danger" role="alert">
													Tingkatan banten sudah ada!
												</div>
											</div>
											<button type="submit" class="btn btn-primary tombol" name="btnAksiEtalase" value="">Tambah</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- Akhir Modal Tambah Informasi Banten dan hapus banten bersangkutan -->