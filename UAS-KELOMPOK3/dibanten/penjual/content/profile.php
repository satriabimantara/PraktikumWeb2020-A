<?php
$penjual = $objPenjual->getSpesificPenjual($penjual['id_penjual']);
?>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<h1 class='display-4'>Informasi pribadi <span>perbarui</span><br>datamu <span>disini</span>
		</h1>
		<!-- Button trigger modal -->
		<a href='' class='btn tombol-profile tombol' data-toggle='modal' data-target='#modalProfile' id="btn-edit-profile">Edit Profile</a>
	</div>
</div>
<!-- Akhir Jumbotron -->

<!-- Service Container -->
<div class="container">
<div class="row justify-content-center">
	<div class="col-10 profile-panel">
		<div class="row">
			<!-- Image Profile User -->
			<div class="col-lg-4">
				<img src="../../assets/imgpenjual/<?= $penjual['foto_penjual']; ?>" alt="employee" class="img-fluid img-border">
				<!-- Button Triger Ganti Password -->
				<!-- Button trigger modal -->
				<a href="" class="btn tombol tombol-reset  mt-3 " data-toggle="modal" data-target="#modalProfile" id="btn-change-password">
					Ganti Password
				</a>
			</div>
			<!-- Informasi pribadi -->
			<div class="col-lg-4">
				<div class="row">
					<div class="col">
						<h4 class="">Nama</h4>
						<p><?= $penjual['namadepan_penjual']." ".$penjual['namabelakang_penjual']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h4>Email</h4>
						<p><?= $penjual['email_penjual']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h4>Nomor Handphone</h4>
						<p><?= $penjual['hp_penjual']; ?></p>
					</div>
				</div>
			</div>
			<!-- informasi Pribadi -->
			<div class="col-lg-4">
				<div class="row">
					<div class="col">
						<h4>Wallet</h4>
						<p>Rp. <?= number_format($penjual['dompet_penjual']); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h4>Bank</h4>
						<p><?= $penjual['nama_bank']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h4>Nomor Rekening</h4>
						<p><?= $penjual['rekening_penjual']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Akhir service container div berada di index-->
<?php
$runQuery = $objBank->getAllBankNotSelect($penjual['id_bank']);
?>
<!-- Modal for profile -->
<form method="post" action="index.php?page=Profile" enctype="multipart/form-data">
	<div class="modal fade" id="modalProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
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
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
												<path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
											</svg>
										</div>
										<div class="input-group-text" id="hide-password-lama">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
												<path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
												<path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
											</svg>
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
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
												<path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
											</svg>
										</div>
										<div class="input-group-text" id="hide-password-baru">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
												<path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
												<path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
											</svg>
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
									<input type="password" class="form-control modal-input" id="repeat_password_baru" name="repeat_password_baru" value="" required="true">
									<div class="input-group-prepend ">
										<div class="input-group-text" id="show-password-baru-repeat">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
												<path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
											</svg>
										</div>
										<div class="input-group-text" id="hide-password-baru-repeat">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
												<path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
												<path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
											</svg>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Akhir ulangi password baru -->
					</div>
					<!-- Akhir konten ganti password -->
					<!-- Hanya tampil ketika password lama tidak sesuai dengan db yang didapat dari jquery -->
					<div class="ifPasswordFalse mt-3" value="">
						<div class="alert alert-danger" role="alert">
							<strong>Pesan Kesalahan!</strong> <p>You should check in on some of those fields below.</p>
						</div>
					</div>
					<!-- Hanya tampil ketika password baru tidak sama dengan repeat password -->
					<div class="ifPasswordNotSame mt-3" value="">
						<div class="alert alert-warning" role="alert">
							<strong>Pesan Kesalahan!</strong> <p>You should check in on some of those fields below.</p>
						</div>
					</div>
					<!-- Hanya tampil jika button edit profile ditekan -->
					<div class="ifEditClick" value="">
						<div class="form-group row">
							<div class="form-group col-6">
								<label for="namadepan_penjual" class="form-label">Nama Depan</label>
								<input type="hidden" name="id_penjual" value="<?= $penjual['id_penjual']; ?>">
								<input type="text" class="form-control modal-input" id="namadepan_penjual" value="<?= $penjual['namadepan_penjual']; ?>" name="namadepan_penjual" required="true">
							</div>
							<div class="form-group col-6">
								<label for="namabelakang_penjual" class="form-label"> Nama Belakang</label>
								<input type="text" class="form-control modal-input" id="namabelakang_penjual" value="<?= $penjual['namabelakang_penjual']; ?>" name="namabelakang_penjual" required="true">
							</div>
						</div>
						<div class="form-group">
							<label for="username_penjual" class="form-label"> Username</label>
							<input type="text" class="form-control modal-input" id="username_penjual" value="<?= $penjual['username_penjual']; ?>" name="username_penjual" required="true">
						</div>
						<div class="form-group">
							<label for="hp_penjual" class="form-label"> Nomor Handphone</label>
							<input type="number" class="form-control modal-input" id="hp_penjual" value="<?= $penjual['hp_penjual']; ?>" name="hp_penjual" required="true">
						</div>
						<div class="form-group">
							<label for="id_bank" class="form-label ">Bank</label>
							<select class="form-control modal-input" id="id_bank" name="id_bank" required="true">
								<option value="<?= $penjual['id_bank']; ?>">
									<?= $penjual['nama_bank']; ?>
								</option>
								<?php while ( $getBank = $runQuery->fetch_assoc()) :?>
									<option value="<?= $getBank['id_bank']; ?>">
										<?= $getBank['nama_bank']; ?>
									</option>
								<?php endwhile; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="rekening_penjual" class="form-label"> Nomor Rekening</label>
							<input type="number" class="form-control modal-input" id="rekening_penjual" value="<?= $penjual['rekening_penjual']; ?>" name="rekening_penjual" required="true">
						</div>
						<!-- Upload foto -->
						<label for="foto_penjual" class="form-label">Upload Foto (JPG 2MB)</label>
						<div class="form-group">
							<div class="custom-file mt-2">
								<input type="file" class="custom-file-input " name="foto_penjual" id="foto_penjual" value="<?= $penjual['foto_penjual']; ?>">
								<label for="foto_penjual" class="custom-file-label modal-input" >Select File</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
					<div class="ifEditClick">
						<button type="submit" class="btn btn-danger tombol" name="btnHapusProfile">Hapus</button>
					</div>
					<button type="submit" class="btn btn-primary tombol" name="btnAksiProfile" value="">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Akhir modal profile -->
<?php
	//cek jika button update ditekan
if (isset($_POST['btnAksiProfile'])) {
	$propertiPenjual = array();
	if ($_POST['btnAksiProfile']=="Ganti Password") {
		$id_penjual = $penjual['id_penjual'];
		$password_baru = $_POST['password_baru'];
		$password_baru = password_hash($password_baru, PASSWORD_DEFAULT); //hashing
		$isPasswordUpdated = $objPenjual->updatePasswordPenjual($password_baru,$id_penjual);
		if ($isPasswordUpdated==true) {
			$objFlash->showSimpleFlash("BERHASIL UPDATE PASSWORD","success","Password berhasil diganti dengan yang baru!","index.php?page=Profile",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
		}else{
			$objFlash->showSimpleFlash("GAGAL UPDATE PASSWORD","warning",'Terjadi kesalahan saat mengganti password!',"index.php?page=Profile",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
		}
	}else if ($_POST['btnAksiProfile']=="Edit Profile") {
		$propertiPenjual['namadepan_penjual'] = $_POST['namadepan_penjual'];
		$propertiPenjual['namabelakang_penjual'] = $_POST['namabelakang_penjual'];
		$propertiPenjual['hp_penjual'] = $_POST['hp_penjual'];
		$propertiPenjual['username_penjual'] = $_POST['username_penjual'];
		$propertiPenjual['id_penjual'] = $_POST['id_penjual'];
		$propertiPenjual['id_bank'] = $_POST['id_bank'];
		$propertiPenjual['rekening_penjual'] = $_POST['rekening_penjual'];
		if ($_FILES['foto_penjual']['name']=="") {
			$propertiPenjual['foto_penjual'] = $penjual['foto_penjual'];
		}else{
			$propertiPenjual['foto_penjual'] = $_FILES['foto_penjual'];
		}
		list($runQueryUpdatePenjual,$pesanKesalahan) = $objPenjual->updateDataPenjual($propertiPenjual);
		if ($runQueryUpdatePenjual>0) {
			$objFlash->showSimpleFlash("BERHASIL UPDATE PROFILE","success","Profilemu berhasil diperbarui!","index.php?page=Profile",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
		}else{
			$fullErrMsg = $objUtil->arrangeErrorMessage($pesanKesalahan);
			$objFlash->showSimpleFlash("PROFILE GAGAL DIPERBARUI","warning",$fullErrMsg,"index.php?page=Profile",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
		}
	}
}
?>
