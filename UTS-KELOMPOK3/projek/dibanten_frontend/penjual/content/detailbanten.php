<?php 
require_once 'headerdashboard.php';
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10 service-panel">
			<!-- Heading -->
			<div class="row mb-lg-3">
				<div class="col">
					<nav class="navbar navbar-expand-lg navbar-light ">
						<a class="navbar-brand etalase-header" href="#">
							Detail Barang
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEtalaseBanten" aria-controls="navbarEtalaseBanten" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarEtalaseBanten">
							<ul class="navbar-nav ml-auto">
								<div class="form-group mr-sm-2">
									<a href="index.php?page=Etalase" class="btn btn-primary my-2 my-sm-0 tombol" type="submit">Etalase</a>
								</div>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Heading -->
			<!-- Konten Etalase -->
			<div class="row mb-3 mt-3">
					<div class="col-lg-6 mb-5 ">
						<div class="card shadow-sm">
							<div class="card-header">
								<div class="d-flex justify-content-between">
									Banten Saraswati
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 mb-lg-0">
										<img src="../../assets/imgbanten/bantentumpeng.png" alt="namabanten" class="img-fluid img-etalase">
									</div>
									<div class="col-lg-6">
										<h4>Tingkatan</h4>
										<p>Madya</p>
										<h4>Stok</h4>
										<p>2</p>
										<h4>Diskon</h4>
										<p>0</p>
										<h4>Harga</h4>
										<p>Rp. 1,500,000</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="d-flex justify-content-between">
									<!-- Button trigger modal -->
									<button type="button" class="btn tombol-card btn-danger tampilModalHapusDetailInformasiBanten" data-toggle="modal" data-target="#modalDetailBanten"  name="btnHapusDetailBanten" value="">
										Hapus
									</button>
									<button type="button" class="btn tombol-card btn-warning tampilModalEditDetailInformasiBanten" data-toggle="modal" data-target="#modalDetailBanten"  name="btnEditDetailBanten" value="">
										Edit
									</button>
								</div>
							</div>
						</div>
					</div>
			</div>
			<!-- Akhir Konten Etalase -->
		</div>
	</div>
</div>

<!-- Modal -->
<form method="post" action="index.php?page=Detail Banten&id=<?= $id_banten; ?>">
	<div class="modal fade" id="modalDetailBanten" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalDetailBantenLabel" aria-hidden="true">
		<div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalDetailBantenLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<img src="" class=" img-thumbnail-modal d-block mx-auto " alt="Foto Banten" id="foto_bantenDetail">
					<!-- Input id_detail yang dipilih secara hidden melalui jquery -->
					<input type="hidden" name="id_detailSelected" value="" id="id_detailSelected">
					<!-- konten edit informasi toko -->
					<div class="row">
						<div class="col">
							<div class="form-group ">
								<label for="nama_bantenDetail" class="form-label">Nama Barang</label>
								<input type="text" class="form-control modal-input" id="nama_bantenDetail" value="" name="nama_bantenDetail" required="true" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group ">
								<label for="nama_tingkatanDetail" class="form-label">Tingkatan</label>
								<input type="text" class="form-control modal-input" id="nama_tingkatanDetail" value="" name="nama_tingkatanDetail" required="true" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group ">
								<label for="stok_detail" class="form-label">Stok</label>
								<input type="number" class="form-control modal-input" id="stok_detail" value="" name="stok_detail" required="true" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group ">
								<label for="diskon_detail" class="form-label">Diskon</label>
								<input type="number" class="form-control modal-input" id="diskon_detail" value="" name="diskon_detail" required="true" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group ">
								<label for="hargajual_detail" class="form-label">Harga</label>
								<input type="number" class="form-control modal-input" id="hargajual_detail" value="" name="hargajual_detail" required="true" >
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary tombol" name="btnAksiDetail" value="">Tambah</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Akhir Modal -->