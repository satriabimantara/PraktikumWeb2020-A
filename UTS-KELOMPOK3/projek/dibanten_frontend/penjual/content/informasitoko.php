<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<h1 class='display-4'>Informasi toko <span>perbarui</span><br>datamu <span>disini</span>
		</h1>
		<!-- Button trigger modal -->
		<!-- Button trigger modal -->
		<button type="button" class="btn tombol-profile tombol" data-toggle="modal" data-target="#modalEditInformasiToko">
			Edit Informasi
		</button>
	</div>
</div>
<!-- Akhir Jumbotron -->
<!-- Service Container -->
<div class="container ">
	<div class="row justify-content-center">
		<div class="col-10 toko-panel">
			<div class="row">
				<div class="card mb-3 card-noborder">
					<!-- Image -->
					<img src="../../assets/imgtoko/BEBANTENAN-26.png" class="card-img-top img-fluid img-banner-toko" alt="...">
					<!-- End Image -->
					<!-- Content -->
					<div class="card-body">
						<div class="container">
							<!-- Informasi Toko Keseluruhan -->
							<div class="row">
								<!-- Informasi toko -->
								<div class="col-6">
									<div class="row">
										<div class="col">
											<h4>Nama Toko</h4>
											<p>ABC</p>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h4>Alamat Toko</h4>
											<p>Jl. abc</p>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h4>Rating</h4>
											<p>
												<?php for ($i=0; $i < 5; $i++):?>
													<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
													</svg>
												<?php endfor; ?>
												<?php for ($i=0; $i < 0 ; $i++):?>
													<svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
													</svg>
												<?php endfor; ?>
											</p>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h4>Deskripsi</h4>
											<p>abc</p>
										</div>
									</div>
								</div>
								<!-- informasi toko -->
								<div class="col-6">
									<div class="row">
										<div class="col">
											<h4>Kodepos</h4>
											<p>123456</p>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h4>Kota</h4>
											<p>Denpasar</p>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h4>Provinsi</h4>
											<p>Bali</p>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h4>Catatan</h4>
											<p>asd</p>
										</div>
									</div>
								</div>
							</div>
							<!-- Button -->
							<div class="row mt-3">
								<div class="container">
									<button class="btn btn-danger  tombol btn-delete-toko">
										Hapus Toko
									</button>
								</div>
							</div>
						</div>
					</div>
					<!-- End Content -->
				</div>
			</div>
		</div>
	</div>

<!-- Akhir Service Container div berada di index-->

<!-- Modal for edit informasi -->
<form method="post" action="index.php?page=Informasi Toko" enctype="multipart/form-data">
	<!-- Modal -->
	<div class="modal fade" id="modalEditInformasiToko" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalEditInformasiTokoLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalEditInformasiTokoLabel">
						Edit Informasi Toko
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- konten edit informasi toko -->
					<div class="form-group ">
						<label for="nama_toko" class="form-label">Nama Toko</label>
						<input type="text" class="form-control modal-input" id="nama_toko" value="ABC" name="nama_toko" required="true">
					</div>
					<div class="form-group">
						<label for="alamat_toko" class="form-label">Alamat</label>
						<input type="text" class="form-control modal-input" id="alamat_toko" value="Jl. abc" name="alamat_toko" required="true">
					</div>
					
					<!-- Kota provinsi kodepos -->
					<div class="form-row">
						<div class="form-group col-4">
							<label for="provinsi_toko" class="form-label">Provinsi</label>
							<input type="text" class="form-control  modal-input" id="provinsi_toko" value="Bali" readonly="true" name="provinsi_toko" required="true">
						</div>
						<div class="form-group col-4">
							<label for="id_wilayah" class="form-label">Kota</label>
							<select id="id_wilayah" class="form-control modal-input" name="id_wilayah" required="true">
								<option value="1">Denpasar</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label for="kodepos_toko" class="form-label">Kodepos</label>
							<input type="number" class="form-control modal-input" id="kodepos_toko" name="kodepos_toko"required="true" value="123456">
						</div>
					</div>
					<div class="form-group">
						<label for="deskripsi_toko" class="form-label"> Deskripsi Toko</label>
						<textarea type="text" class="form-control modal-input" id="deskripsi_toko" value="" name="deskripsi_toko"  rows="3">abc</textarea>
					</div>
					<div class="form-group">
						<label for="catatan_toko" class="form-label">Catatan Toko</label>
						<textarea type="text" class="form-control modal-input" id="catatan_toko" value="" name="catatan_toko"  rows="3">asd</textarea>
					</div>
					<label for="foto_toko" class="form-label">Upload Foto (JPG 2MB)</label>
					<!-- Upload foto -->
					<div class="form-group">
						<div class="custom-file mt-2">
							<input type="file" class="custom-file-input " name="foto_toko" id="foto_toko" value="">
							<label for="foto_toko" class="custom-file-label modal-input" >Select File</label>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary tombol" name="btnUpdateInformasiToko" value="">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>