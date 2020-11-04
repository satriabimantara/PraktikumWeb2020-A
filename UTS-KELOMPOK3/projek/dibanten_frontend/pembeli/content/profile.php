<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid ">
	<div class="container">
		<h1 class='display-4'>Informasi pribadi <span>perbarui</span><br>datamu <span>disini</span>
		</h1>
		<!-- Button trigger modal -->
		<button type="button" class="btn tombol-profile tombol" data-toggle="modal" data-target="#modalProfilePembeli" id="btn-edit-profile">
			Edit Profile
		</button>
	</div>
</div>
<!-- Akhir Jumbotron -->
<!-- Service Container -->
<div class="container ">
	<div class="row justify-content-center">
		<div class="col-10 profile-panel">
			<div class="row">
				<!-- Image Profile User -->
				<div class="col-lg-4">
					<img src="../../assets/imgpembeli/avatarpembeli.png" alt="Foto Profile Pembeli" class="img-fluid img-border">
					<!-- Button Triger Ganti Password -->
					<!-- Button trigger modal -->
					<a href="" class="btn tombol tombol-reset  mt-3 " data-toggle="modal" data-target="#modalProfilePembeli" id="btn-change-password">
						Ganti Password
					</a>
				</div>
				<!-- Informasi pribadi -->
				<div class="col-lg-4">
					<div class="row">
						<div class="col">
							<h4 class="">Nama</h4>
							<p>Satria Bimantara</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<h4>Email</h4>
							<p>satria@gmail.com</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<h4>Nomor Handphone</h4>
							<p>081234567890</p>
						</div>
					</div>
				</div>
				<!-- informasi Pribadi -->
				<div class="col-lg-4">
					<div class="row">
						<div class="col">
							<h4>Username</h4>
							<p>satria</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<h4>Alamat</h4>
							<p>Jl. abc</p>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<h4>Provinsi</h4>
							<p>Bali</p>
						</div>
						<div class="col-4">
							<h4>Kota</h4>
							<p>Denpasar</p>
						</div>
						<div class="col-4">
							<h4>Kodepos</h4>
							<p>123456</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir service container div berada di index-->

	<!-- Modal Edit Profile dan Ganti Password -->
	<form method="post" enctype="multipart/form-data">
		<!-- Modal -->
		<div class="modal fade" id="modalProfilePembeli" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalProfilePembeliLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="titleModal">
							Edit Profile
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Hanya tampil jika button ganti profile ditekan-->
						<div id="ifChangePasswordClick" value="">
							<!-- Password lama -->
							<div class="form-row align-items-center">
								<div class="col my-1">
									<label class="form-label" for="password_lama">Password Lama</label>
									<div class="input-group">
										<input type="password" class="form-control modal-input" id="password_lama" name="password_lama" value="" required="true">
										<div class="input-group-prepend ">
											<div class="input-group-text" id="show-password-lama">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</div>
											<div class="input-group-text" id="hide-password-lama">
												<i class="fa fa-eye-slash" aria-hidden="true"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Akhir password lama -->
							<!-- Password baru -->
							<div class="form-row align-items-center">
								<div class="col my-1">
									<label class="form-label" for="password_baru">Password Baru</label>
									<div class="input-group">
										<input type="password" class="form-control modal-input" id="password_baru" name="password_baru" value="" required="true">
										<div class="input-group-prepend ">
											<div class="input-group-text" id="show-password-baru">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</div>
											<div class="input-group-text" id="hide-password-baru">
												<i class="fa fa-eye-slash" aria-hidden="true"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Akhir password baru -->
							<!-- Ulangi password baru -->
							<div class="form-row align-items-center">
								<div class="col my-1">
									<label class="form-label" for="repeat_password_baru">Ulangi Password Baru</label>
									<div class="input-group">
										<input type="password" class="form-control modal-input" id="repeat_password_baru" name="repeat_password_baru" value="" >
										<div class="input-group-prepend ">
											<div class="input-group-text" id="show-password-baru-repeat">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</div>
											<div class="input-group-text" id="hide-password-baru-repeat">
												<i class="fa fa-eye-slash" aria-hidden="true"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Akhir ulangi password baru -->
						</div>
						<!-- Akhir konten ganti password -->
						<!-- Hanya tampil ketika password lama tidak sesuai dengan db yang didapat dari jquery -->
						<div class="mt-3" value="" id="ifPasswordFalse">
							<div class="alert alert-danger" role="alert">
								<strong>Pesan Kesalahan!</strong> <p>You should check in on some of those fields below.</p>
							</div>
						</div>
						<!-- Hanya tampil ketika password baru tidak sama dengan repeat password -->
						<div class="mt-3" value="" id="ifPasswordNotSame">
							<div class="alert alert-warning" role="alert">
								<strong>Pesan Kesalahan!</strong> <p>You should check in on some of those fields below.</p>
							</div>
						</div>
						<!-- Hanya tampil jika button edit profile ditekan -->
						<div class="ifEditClick" value="">
							<div class="form-group row">
								<div class="form-group col-6">
									<label for="namadepan_pembeli" class="form-label">Nama Depan</label>
									<input type="text" class="form-control modal-input" id="namadepan_pembeli" value="Satria" name="namadepan_pembeli" required="true">
								</div>
								<div class="form-group col-6">
									<label for="namabelakang_pembeli" class="form-label"> Nama Belakang</label>
									<input type="text" class="form-control modal-input" id="namabelakang_pembeli" value="Bimantara" name="namabelakang_pembeli" required="true">
								</div>
							</div>
							<div class="form-group">
								<label for="username_pembeli" class="form-label"> Username</label>
								<input type="text" class="form-control modal-input" id="username_pembeli" value="satria" name="username_pembeli" required="true">
							</div>
							<div class="form-group">
								<label for="hp_pembeli" class="form-label"> Nomor Handphone</label>
								<input type="number" class="form-control modal-input" id="hp_pembeli" value="081234567890" name="hp_pembeli" required="true">
							</div>

							<div class="form-group">
								<label for="alamat_pembeli" class="form-label">Alamat</label>
								<input type="text" class="form-control modal-input" id="alamat_pembeli" value="Jl. abc" name="alamat_pembeli" required="true">
							</div>
							<div class="form-group row">
								<div class="form-group col-4">
									<label for="provinsi_pembeli" class="form-label"> Provinsi</label>
									<input type="text" class="form-control modal-input" id="provinsi_pembeli" value="Bali" name="provinsi_pembeli" required="true">
								</div>
								<div class="form-group col-4">
									<label for="kota_pembeli" class="form-label">Kota</label>
									<input type="text" class="form-control modal-input" id="kota_pembeli" value="Denpasar" name="kota_pembeli" required="true">
								</div>
								<div class="form-group col-4">
									<label for="kodepos_pembeli" class="form-label">Kodepos</label>
									<input type="number" class="form-control modal-input" id="kodepos_pembeli" value="123456" name="kodepos_pembeli" required="true">
								</div>
							</div>
							<label for="foto_pembeli" class="form-label">Upload Foto (JPG/PNG 2MB)</label>
							<div class="form-group">
								<div class="custom-file mt-2">
									<input type="file" class="custom-file-input " name="foto_pembeli" id="foto_pembeli" value="">
									<label for="foto_pembeli" class="custom-file-label modal-input" >Select File</label>
								</div>
							</div>
						</div>
						<!-- AKhir konten edit profile -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
						<div class="ifEditClick">
							<button type="submit" class="btn btn-danger tombol" name="btnHapusProfile">Hapus Profile</button>
						</div>
						<button type="submit" class="btn btn-primary tombol" name="btnAksiProfile" value="">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- Akhir modal profile pembeli -->