<?php 
$id_toko = $penjual['id_toko'];
$getDataWilayah = $objWilayah->getAllDataWilayah();
//select all data ongkir base on toko
$getTarifOngkir = $objOngkir->getAllDataOngkirBaseOnToko($id_toko);
$nomorTabel = 1;
?>

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
<?php if ($getTarifOngkir->num_rows!=0):?>
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
								<?php while ($ongkir = $getTarifOngkir->fetch_assoc()): ?>
									<tr>
										<td class="table-text" ><?= $nomorTabel; ?></td>
										<td class="table-text"><?= $ongkir['provinsi_wilayah']; ?></td>
										<td class="table-text"><?= $ongkir['kota_wilayah']; ?></td>
										<td class="table-text">Rp. <?= number_format($ongkir['harga_ongkir']); ?></td>
										<td >
											<!-- Gunakan jquery untuk menghapus data ongkir tertentu -->
											<!-- button -->
											<button type="button" class="btn btn-danger tombol btn-sm tampilModalHapus" data-toggle="modal" data-target="#modalWilayahPengiriman" data-id="<?= $ongkir['id_ongkir']; ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
											<!-- Gunakan Jquery untuk mengedit data ongkir tertentu -->
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-warning tombol tombol-aksi btn-sm tampilModalUbah" data-toggle="modal" data-target="#modalWilayahPengiriman" data-id="<?= $ongkir['id_ongkir']; ?>" >
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<?php $nomorTabel++; ?>
								<?php endwhile; ?>
							</tbody>
						</table>
						<!-- end info harga ongkir -->
					</div>
				</div>
			</div>
		</div>

	<?php endif; ?>
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
							<!-- Kirimkan id_ongkir secara hidden -->
							<input type="hidden" name="id_ongkir" id="id_ongkir" value="">
							<!-- kirimkan id_wilayah secara hidden untuk membandingkan wilayah tersebut sudah ada ongkir atau belum -->
							<input type="hidden" name="id_wilayahLama" id="id_wilayahLama" value="">
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
								<?php while ( $wilayah = $getDataWilayah->fetch_assoc()):?>
									<option value="<?= $wilayah['id_wilayah']; ?>">
										<?= $wilayah['kota_wilayah']; ?>
									</option>
								<?php endwhile; ?>
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

	<!-- cek jika button tambah ongkir ditekan -->
	<?php
	if (isset($_POST['btnAksi'])) {
	//get all value
		$attrOngkir = array();
		$attrOngkir['id_toko'] = $id_toko;
		$attrOngkir['id_wilayah'] = $_POST['id_wilayah'];
		$attrOngkir['harga_ongkir'] = $_POST['harga_ongkir'];
		if ($_POST['btnAksi']=="edit") {
			$attrOngkir['id_wilayahLama'] = $_POST['id_wilayahLama'];
			$attrOngkir['id_ongkir'] = $_POST['id_ongkir'];
			list($pesanKesalahan,$runQueryUpdateDataOngkir) = $objOngkir->updateDataOngkir($attrOngkir);
			if ($pesanKesalahan==null && $runQueryUpdateDataOngkir==true) {
			//berhasil
				echo "<script>
				Swal.fire({
					title: 'BERHASIL DIPERBARUI',
					icon:'success',
					text: 'Tarif pengiriman berhasil diperbaharui!',
					showCancelButton: false,
					confirmButtonColor: '#22bb33',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Kembali'
					}).then((result) => {
						document.location.href = 'index.php?page=Wilayah Pengiriman';
					})</script>";
				}else{
					echo "<script>
					Swal.fire({
						title: 'GAGAL DIPERBARUI',
						icon:'warning',
						text: '$pesanKesalahan',
						showCancelButton: false,
						confirmButtonColor: '#d33',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Kembali'
						}).then((result) => {
							document.location.href = 'index.php?page=Wilayah Pengiriman';
						})</script>";
					}
				}else if ($_POST['btnAksi']=="tambah") {
					list($pesanKesalahan,$runQueryInsertNewOngkir) = $objOngkir->insertNewOngkir($attrOngkir);
					if ($runQueryInsertNewOngkir==true) {
		//berhasil
						echo "<script>
						Swal.fire({
							title: 'BERHASIL DITAMBAHKAN',
							icon:'success',
							text: 'Tarif pengiriman berhasil ditambahkan!',
							showCancelButton: false,
							confirmButtonColor: '#22bb33',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Kembali'
							}).then((result) => {
								document.location.href = 'index.php?page=Wilayah Pengiriman';
							})</script>";
						}else if ($pesanKesalahan!=null) {
		//ada pesan kesalahan dari class
							echo "<script>
							Swal.fire({
								title: 'TARIF SUDAH ADA',
								icon:'warning',
								text: '$pesanKesalahan',
								showCancelButton: false,
								confirmButtonColor: '#d33',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Kembali'
								}).then((result) => {
									document.location.href = 'index.php?page=Wilayah Pengiriman';
								})</script>";
							}else{
								echo "<script>
								Swal.fire({
									title: 'GAGAL DITAMBAHKAN',
									icon:'warning',
									text: 'Terjadi kesalahan saat menambahkan!',
									showCancelButton: false,
									confirmButtonColor: '#d33',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Kembali'
									}).then((result) => {
										document.location.href = 'index.php?page=Wilayah Pengiriman';
									})</script>";
								}
							}else if ($_POST['btnAksi']=="hapus") {
								$runqueryDeleteOngkirById=$objOngkir->deleteOngkirById( $_POST['id_ongkir']);
								if ($runqueryDeleteOngkirById==true) {
								//berhasil hapus data
									echo "<script>
									Swal.fire({
										title: 'BERHASIL DIHAPUS',
										icon:'success',
										text: 'Tarif pengiriman berhasil dihapus!',
										showCancelButton: false,
										confirmButtonColor: '#22bb33',
										cancelButtonColor: '#d33',
										confirmButtonText: 'Kembali'
										}).then((result) => {
											document.location.href = 'index.php?page=Wilayah Pengiriman';
										})</script>";
									}else{
										echo "<script>
										Swal.fire({
											title: 'GAGAL DIHAPUS',
											icon:'warning',
											text: 'Terjadi kesalahan saat menghapus!',
											showCancelButton: false,
											confirmButtonColor: '#d33',
											cancelButtonColor: '#d33',
											confirmButtonText: 'Kembali'
											}).then((result) => {
												document.location.href = 'index.php?page=Wilayah Pengiriman';
											})</script>";
										}
									}
								}
								?>
