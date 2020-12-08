<?php
require_once 'config/init.php';
//cek apakah sudah ada session login atau belum
if (!isset($_SESSION['user'])) {
	//arahkan untuk login
	echo '<script>alert("Silahkan login terlebih dahulu!");</script>';
	header( "refresh:0.5;url=login.php" );
	exit();
}
// retrieve all data mahasiswa from db
$nomor = 1;
$ifAnyData = false;
$sql_query = "SELECT * FROM mahasiswa";
$data = mysqli_query($conn,$sql_query);
if (mysqli_num_rows($data)>0) {
	$ifAnyData=true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CRUD PHP</title>
	<!-- Link File Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<!-- Link File Style -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- Link Font Awesom -->
	<link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container mt-5">
		<!-- Baris untuk data mahasiswa -->
		<div class="row">
			<div class="col">
				<div class="card" id="konten-data">
					<div class="card-header d-flex justify-content-between">
						<h3>Selamat Datang <?= $_SESSION['user']['nama_user']; ?></h3>
						<h5>[<?= strtoupper($_SESSION['user']['role_user']); ?>]</h5>
					</div>
					<div class="card-body">
						<div class="row mb-3">
							<div class="col d-flex justify-content-between">
								<h5 class="card-title">Data Mahasiswa</h5>
								<a class="btn btn-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
									<h6>Tambah Data Mahasiswa</h6>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Nomor</th>
											<th scope="col">NIM</th>
											<th scope="col">Nama</th>
											<th scope="col">Alamat</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($ifAnyData==true): ?>
											<?php while ($row = mysqli_fetch_assoc($data)) :?>
												<?php
												$id = $row['id_mahasiswa'];
												?>
												<tr>
													<th scope="row"><?= $nomor; ?></th>
													<td><?= $row['nim_mahasiswa']; ?></td>
													<td><?= $row['nama_mahasiswa']; ?></td>
													<td><?= $row['alamat_mahasiswa']; ?></td>
													<td>
														<a href="managedata.php?id=<?= $id; ?>" type="button" class="btn btn-warning">Edit</a>
														<?php if ($_SESSION['user']['role_user']=="admin"): ?>
															<a type="button" class="btn btn-danger" onclick="confirmBeforeDelete(<?= $id; ?>)">Hapus</a>
														<?php endif ?>
													</td>
												</tr>
												<?php $nomor++; ?>
											<?php endwhile; ?>
										<?php endif ?>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<a class="btn btn-danger tombol" href="logout.php" type="button" onclick="alert('Anda berhasil logout!')">Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Akhir baris untuk data mahasiswa -->
		<!-- Baris untuk tambah data mahasiswa -->
		<div class="row mt-5 mb-5" >
			<div class="col">
				<div class="collapse" id="collapseExample">
					<div class="card " id="konten-tambah-data">
						<div class="card-body">
							<h3 class="card-title">
								Tambah Data Mahasiswa
							</h3>
							<form action="tambahdata.php" method="post">
								<div class="form-group">
									<label for="input_nim_mahasiswa">Nomor Induk Mahasiswa</label>
									<input type="text" class="form-control" id="input_nim_mahasiswa" placeholder="Masukkan 10 digit NIM" name="input_nim_mahasiswa" required="true">
								</div>
								<div class="form-group">
									<label for="input_nama_mahasiswa">Nama Mahasiswa</label>
									<input type="text" class="form-control" id="input_nama_mahasiswa" placeholder="Masukkan nama lengkap mahasiswa" name="input_nama_mahasiswa" required="true">
								</div>
								<div class="form-group">
									<label for="input_alamat_mahasiswa">Alamat Mahasiswa</label>
									<textarea class="form-control" id="input_alamat_mahasiswa" name="input_alamat_mahasiswa" rows="3" required="true"></textarea>
								</div>
								<button type="submit" class="btn btn-success" name="btnTambahData" value="">Tambah Data</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Akhir baris untuk tambah data mahasiswa -->
		<!-- Baris alert insert sukes -->
		<?php if (isset($_SESSION['msg'])): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?= $_SESSION['msg']; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
			unset($_SESSION['msg']); //reset session
			?>
		<?php endif ?>
		
		<!-- AKhir baris alert insert sukses -->
	</div>
	<!-- jquery -->
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<!-- Popper -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- script -->
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>