<?php
$getDataWilayah = $objWilayah->getAllDataWilayah();
?>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">Mulai <span>berjualan</span><br> dengan <span>mudah</span> sekarang
		</h1>
		<a href="index.php" class="btn tombol btn-secondary">
			Kembali
		</a>
	</div>
</div>
<!-- akhir Jumbotron -->
<!-- Service Container -->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10 toko-panel">
			<div class="row">
				<!-- Input Informasi Registrasi Toko -->
				<div class="col-lg">
					<h1 class="display-4 registrasi-title text-center mb-5">
						Create Your Own Store
					</h1>
					<form method="post" action="index.php?page=Registrasi Toko" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nama_toko" class="form-label">Nama Toko</label>
							<input type="text" class="form-control input-login" id="nama_toko" name="nama_toko" value="" maxlength="50" aria-describedby="nama_toko" required="true">
							<small id="nama_toko" class="form-text text-muted">*Masukkan nama toko maksimum 50 karakter</small>
						</div>
						<div class="form-group">
							<label for="alamat_toko" class="form-label">Alamat Toko</label>
							<input type="text" class="form-control input-login" id="alamat_toko" name="alamat_toko" value="" required="true">
						</div>
						<div class="form-row">
							<div class="form-group col-4">
								<label for="provinsi_toko">Provinsi</label>
								<input type="text" class="form-control input-login" id="provinsi_toko" value="Bali" readonly="true" name="provinsi_toko" required="true">
							</div>
							<div class="form-group col-4">
								<label for="id_wilayah">Kota</label>
								<select id="id_wilayah" class="form-control input-login" name="id_wilayah" required="true">
									<option>- Kota -</option>
									<?php while ( $wilayah = $getDataWilayah->fetch_assoc()):?>
										<option value="<?= $wilayah['id_wilayah']."-".$wilayah['kota_wilayah']; ?>"><?= $wilayah['kota_wilayah']; ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group col-4">
								<label for="kodepos_toko">Kodepos</label>
								<input type="number" class="form-control input-login" id="kodepos_toko" name="kodepos_toko"required="true">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<label for="deskripsi_toko" class="form-label">Deskripsi Toko</label>
								<textarea type="text" class="form-control  txt-area" id="deskripsi_toko" name="deskripsi_toko" value="" rows="5"></textarea>
							</div>
							<div class="form-group col-6">
								<label for="catatan_toko" class="form-label">Catatan Toko</label>
								<textarea type="text" class="form-control  txt-area" id="catatan_toko" name="catatan_toko" value="" rows="5"></textarea>
							</div>
						</div>
						<!-- Upload foto -->
						<div class="form-group">
							<label for="foto_toko" class="form-label">Upload Foto (Max 2MB)</label>
							<div class="custom-file mt-2">
								<input type="file" class="custom-file-input" name="foto_toko" id="foto_toko" required="true">
								<label for="foto_toko" class="custom-file-label" >Select File</label>
							</div>
						</div>
						<!-- Button trigger modal -->
						<button type="button" class="btn tombol btn-danger btn-block mt-5" data-toggle="modal" data-target="#modalCreateToko" name="btnModal" >
							Create
						</button>
						<!-- Akhir Button Trigger -->
						<!-- Modal Read Term Condition Create Toko -->
						<div class="modal fade" id="modalCreateToko" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalCreateTokoLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalCreateTokoLabel">
											Terms and Conditions
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
										<p>
											<div class="form-group form-check">
												<input type="checkbox" class="form-check-input" id="checkCondtions" required="true" name="checkCondtions">
												<p class="form-check-label" for="checkCondtions">I Agree With Terms and Conditions</p>
											</div>
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
										<button type="submit" class="btn btn-danger tombol" name="btnRegistrasiToko" value="">Create</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Akhir Modal Create Toko -->
					</form>
				</div>
				<div class="col-lg  pict-card">
					<img src="../../assets/imgstyle/register.jpg" alt="" class="img-portrait img-register-toko">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Service Container -->

<?php
if (isset($_POST['btnRegistrasiToko'])) {
	//tangkap semua input form dan masukan ke dalam array yang nantinya akan dilempas ke objek untuk melakukan registrasi toko baru
	$attrToko = array();
	$attrToko['id_penjual'] = $_SESSION['penjual']['id_penjual'];
	$attrToko['nama_toko'] = $_POST['nama_toko'];
	$attrToko['alamat_toko'] = $_POST['alamat_toko'];
	$attrToko['kodepos_toko'] = $_POST['kodepos_toko'];
	$attrToko['provinsi_toko'] = $_POST['provinsi_toko'];
	$attrToko['deskripsi_toko'] = $_POST['deskripsi_toko'];
	$attrToko['catatan_toko'] = $_POST['catatan_toko'];
	$attrToko['foto_toko'] = $_FILES['foto_toko'];
	$id_wilayah = $_POST['id_wilayah'];
	list($id_wilayah,$kota_toko) = explode("-", $id_wilayah);
	$attrToko['id_wilayah'] = $id_wilayah;
	$attrToko['kota_toko'] = $kota_toko;
	list($pesanKesalahan,$runQueryInsertNewToko) = $objToko->insertNewToko($attrToko);
	if ($pesanKesalahan==null && $runQueryInsertNewToko==true) {
		//berhasil melakukan insert dan melakukan update id_toko di tabel penjual
		echo "<script>
		Swal.fire({
			title: 'REGISTRASI BERHASIL',
			icon:'success',
			text: 'Selamat, tokomu sudah terdaftar!',
			showCancelButton: false,
			confirmButtonColor: '#22bb33',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Dashboard'
			}).then((result) => {
				document.location.href = 'index.php';
			})</script>";
		}else{
			//tampilkan pesan kesalahan
			echo "<script>
			Swal.fire({
				title: 'REGISTRASI GAGAL',
				icon:'warning',
				text: '$pesanKesalahan',
				showCancelButton: false,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Kembali'
				}).then((result) => {
					document.location.href = 'index.php?page=Registrasi Toko';
				})</script>";
			}
		}
		?>