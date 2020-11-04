<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<h1 class='display-4'>Informasi tarif ongkir <br><span>tambah </span>tarif<span> disini</span>
		</h1>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary tombol tampilModalTambah" data-toggle="modal" data-target="#modalWilayahPengiriman" id="btnTambah">
			Tambah
		</button>
	</div>
</div>
<!-- Akhir Jumbotron -->

<!-- Service Container -->
	<div class="container ">
		<div class="row justify-content-center">
			<div class="col-10 profile-panel">
				<div class="alert alert-info" role="alert">
					<h3>Tarif Pengiriman</h3>
				</div>
				<div class="row">
					<div class="col-lg">
						<!-- Info harga ongkir -->
						<table class="table">
							<thead>
								<tr>
									<th scope="col" class="table-header" id="nomor">No</th>
									<th scope="col" class="table-header">Provinsi</th>
									<th scope="col" class="table-header">Kota</th>
									<th scope="col" class="table-header">Tarif</th>
									<th scope="col" class="table-header">Aksi</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td class="table-text" >1</td>
										<td class="table-text">Bali</td>
										<td class="table-text">Klungkung</td>
										<td class="table-text">Rp. 20,000</td>
										<td >
											<button type="button" class="btn btn-danger tombol btn-sm tampilModalHapus" data-toggle="modal" data-target="#modalWilayahPengiriman"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
											<button type="button" class="btn btn-warning tombol tombol-aksi btn-sm tampilModalUbah" data-toggle="modal" data-target="#modalWilayahPengiriman" >
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<tr>
										<td class="table-text" >2</td>
										<td class="table-text">Bali</td>
										<td class="table-text">Denpasar</td>
										<td class="table-text">Rp. 10,000</td>
										<td >
											<button type="button" class="btn btn-danger tombol btn-sm tampilModalHapus" data-toggle="modal" data-target="#modalWilayahPengiriman"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
											<button type="button" class="btn btn-warning tombol tombol-aksi btn-sm tampilModalUbah" data-toggle="modal" data-target="#modalWilayahPengiriman" >
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
							</tbody>
						</table>
						<!-- end info harga ongkir -->
					</div>
				</div>
			</div>
		</div>
	<!-- Akhir service container div berada di index-->

	<!-- Modal Wilayah Pengiriman -->
	<form method="post" action="index.php?page=Wilayah Pengiriman" id="form-edit-wilayah-pengiriman">
		<div class="modal fade" id="modalWilayahPengiriman" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalWilayahPengirimanLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content" id="modal-content">
					<div class="modal-header">
						<!-- Judul modal akan dinamis apakah edit data atau tambah data -->
						<h5 class="modal-title" id="judulModal">
							Tambah Tarif Pengiriman
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="provinsi_wilayah" class="form-label">Provinsi</label>
							<input type="text" class="form-control modal-input" id="provinsi_wilayah" value="Bali" name="provinsi_wilayah" readonly="true">
						</div>
						<div class="form-group">
							<p class="test"></p>
						</div>
						<div class="form-group">
							<label for="id_wilayah">Kota</label>
							<select id="id_wilayah" class="form-control modal-input" name="id_wilayah" required="true">
								<option value="">- Kota -</option>
								<option value="">Denpasar</option>
							</select>
						</div>
						<div class="form-group">
							<label for="harga_ongkir" class="form-label">Tarif (Rp.)</label>
							<input type="number" class="form-control modal-input" id="harga_ongkir" value="" name="harga_ongkir" required="true">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-primary tombol" name="btnAksi" value="">Tambah</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- Akhir Modal Wilayah Pengiriman -->