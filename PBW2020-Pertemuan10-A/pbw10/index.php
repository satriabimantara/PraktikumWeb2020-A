<?php
session_start();
if (!isset($_SESSION['mhs'])) {
	$_SESSION["mhs"] = array();//list for mhs yang sudah diinput
}

function checkValidScore($nilai){
	$isError = false;
	$alert_msg = "";
	if ($nilai < 0 || $nilai > 100) {
		//invalid
		$alert_msg = "Nilai tidak valid. Nilai harus berada di dalam interval 0 - 100!";
		$isError = true;
	}
	return array($isError,$alert_msg);
}
function checkNim($nim){
	$isError = false;
	$alert_msg = array();
	//cek karakter NIM apakah numerik ASCII atau bukan
	for ($char_i = 0; $char_i < strlen($nim); $char_i++) {
		if (ord($nim[$char_i]) <48 || ord($nim[$char_i])>57) {
			$isError = true;
			array_push($alert_msg, "NIM harus merupakan numerik karakter ( 0-9 )");
			break;
		}
	}
	//cek jumlah karakter NIM
	if (strlen($nim)!=10) {
		//invalid
		$isError = true;
		array_push($alert_msg, "Panjang NIM harus 10 numerik karakter. Misal : <strong>1808561013</strong>");
	}
	return array($isError,$alert_msg);
}
function checkNama($nama){
	$isError = false;
	$alert_msg = array();
	//nama harus alphabet karakter
	for ($char_i = 0; $char_i < strlen($nama); $char_i++) {
		if ((ord($nama[$char_i]) <65 || ord($nama[$char_i])>122) && ord($nama[$char_i]) != 32) {
			$isError = true;
			array_push($alert_msg, "Nama harus merupakan alphabet karakter ( A-Z atau a-z )");
			break;
		}
	}
	return array($isError,$alert_msg);
}
function hitungMean($arr_nilai){
	$total = 0;
	foreach ($arr_nilai as $nilai) {
		$total+=$nilai;
	}
	return array($total,$total/count($arr_nilai));
}
function pushErrorMsg(&$alert_msg_all,$alert_msg){
	foreach ($alert_msg as $msg) {
		array_push($alert_msg_all, $msg);
	}
}
if (isset($_POST['btnSubmitData'])) {
	$banyak_nilai = $_POST['banyak_nilai'];
	$input_nama_mhs = $_POST['input_nama_mhs'];
	$input_nim_mhs = $_POST['input_nim_mhs'];
	$nilai_mhs = array();
	$alert_msg_all = array();
	//check valid nama, nim or not
	list($isErrorName,$alert_msg) = checkNama($input_nama_mhs);
	pushErrorMsg($alert_msg_all,$alert_msg);
	list($isErrorNim,$alert_msg) = checkNim($input_nim_mhs);
	pushErrorMsg($alert_msg_all,$alert_msg);
	// Masukkan data-data nilai ke dalam array
	for ($i = 0; $i < $banyak_nilai; $i++) {
		$id_input = "input_nilai_".($i+1);
		array_push($nilai_mhs, $_POST[$id_input]);
	}
	//cek error pada nilai
	foreach ($nilai_mhs as $nilai) {
		list($isErrorScore,$alert_msg) = checkValidScore($nilai);
		if ($isErrorScore==true) {
			array_push($alert_msg_all, $alert_msg);
			break;
		}
	}
	//kalau alert msg kosong artinya tidak ada error
	if (empty($alert_msg_all)) {
		//Hitung rata-rata
		list($total_nilai,$mean) = hitungMean($nilai_mhs);
		//Masukkan data ke dalam session
		$idxsession_mhs = count($_SESSION['mhs']);
		$_SESSION['mhs'][$idxsession_mhs] = array();
		$_SESSION['mhs'][$idxsession_mhs]['nama'] = $input_nama_mhs;
		$_SESSION['mhs'][$idxsession_mhs]['nim'] = $input_nim_mhs;
		$_SESSION['mhs'][$idxsession_mhs]['nilai'] = $nilai_mhs;
		$_SESSION['mhs'][$idxsession_mhs]['total_nilai'] = $total_nilai;
		$_SESSION['mhs'][$idxsession_mhs]['mean'] = $mean;
	}
}elseif (isset($_POST['btnResetDaftar'])) {
	if ($_POST['btnResetDaftar']==1) {
		//yes delete
		session_destroy();
		echo '<script>
		alert("Daftar sudah terhapus semuanya!");
		</script>';
		header('Refresh: 0.2; url=index.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Nilai</title>
	<!-- Link File Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<!-- Link File Style -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- Link Font Awesom -->
	<link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid mt-5 mb-5">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="card shadow card-form">
						<div class="card-body">
							<div class="d-flex justify-content-between mb-3">
								<h2>Data Formulir Mahasiswa</h2>
								<img src="assets/img/unud.png" alt="Logo Universitas Udayana" width="100" height="100">
							</div>
							<div>
								<p class="lead">
									Berikut adalah formulir data mahasiswa yang bisa ditambahkan. Formulir terdiri dari Nama, NIM, serta nilai-nilai yang sudah diperoleh dari mahasiswa. Masukkan data dengan benar dan sesuai dengan format tertera.
								</p>
							</div>
							<?php if (!empty($alert_msg_all)): ?>
								<div class="row mt-5">
									<div class="col">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">Terjadi Kesalahan!</h4>
											<p>
												Terdapat kesalahan data inputan pada formulir yang telah diisi. Berikut adalah kesalahannya : <br>
												<?php foreach ($alert_msg_all as $indeks_msg=> $msg): ?>
													<strong><?= $indeks_msg+1; ?>)</strong> <?= $msg; ?><br>
												<?php endforeach ?>
											</p>
											<hr>
											<p class="mb-0">
												Silahkan lengkapi formulir dengan format yang telah ditentukan!
											</p>
										</div>
									</div>
								</div>
							<?php endif ?>
							
							<form action="index.php" method="post">
								<!-- Baris untuk data -->
								<div class="row mt-3 mb-2 d-flex justify-content-center" id="baris-form">
									<div class="col mt-3 mb-3 form-data">
										<div class="card card-form shadow">
											<div class="card-header">
												<h4 >Data Mahasiswa</h4>
											</div>
											<div class="card-body ">
												<input type="hidden" name="banyak_nilai" id="banyak_nilai" value="1">
												<div class="form-group">
													<label for="input_nama_mhs"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Nama Mahasiswa</label>
													<input type="text" class="form-control" id="input_nama_mhs" name="input_nama_mhs" value="" required="true" aria-describedby="input_nama_mhs_help">
													<small id="input_nama_mhs_help" class="form-text text-muted">Masukkan nama sesuai dengan ketentuan. Karakter (A-Z) atau (a-z)</small>
												</div>
												<div class="form-group">
													<label for="input_nim_mhs"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;Nomor Induk Mahasiswa</label>
													<input type="text" class="form-control" id="input_nim_mhs" name="input_nim_mhs" value="" required="true" aria-describedby="input_nim_mhs_help">
													<small id="input_nim_mhs_help" class="form-text text-muted">NIM merupakan numerik karakter dengan panjang 10</small>
												</div>
												<div class="form-group row">
													<label for="input_banyakNilai" class="col-8 ">Banyak Nilai Mahasiswa</label>
													<div class="col-4">
														<input type="number" class="form-control input_banyakNilai" id="input_banyakNilai" name="input_banyakNilai" value="" min="1" placeholder="Minimal 1"step="1" onkeydown="avoidDecimal();">
													</div>
												</div>
												<div class="form-nilai">
													<div class="form-group" >
														<label for="input_nilai_1">Nilai 1</label>
														<input type="number"  class="form-control " id="input_nilai_1" name="input_nilai_1" value="" required="true" step="0.000001" aria-describedby="input_nilai_1_help">
														<small id="input_nilai_1_help" class="form-text text-muted">Masukkan nilai desimal yang merupakan numerik karakter</small>
													</div>
												</div>
												<div class="row d-flex justify-content-center">
													<div class="col d-flex justify-content-between">
														<button type="button" role="button" class="btn btn-secondary" id="btn-clearinput" style="border-radius: 30px;">
															<i class="fa fa-eraser" aria-hidden="true"></i>&nbsp; Clear
														</button>
														<button  class="btn  btn-primary tombol" type="submit" name="btnSubmitData" id="btnSubmitData" value=""><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Submit Data</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Akhir baris data -->
								
							</form>
							<form action="index.php" method="post">
								<!-- Baris untuk button reset data -->
								<div class="row d-flex justify-content-center">
									<div class="col d-flex justify-content-between">
										<button class="btn  btn-danger tombol" type="submit" name="btnResetDaftar" id="btnResetDaftar" value="" onclick="return confirmDelete('Yakin ingin hapus daftar?')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Reset</button>
									</div>
								</div>
								<!-- Akhir baris untuk button reset data -->
							</form>
							<!-- Baris untuk daftar mahasiswa yang sudah pernah diinput -->
							<?php if (!empty($_SESSION['mhs'])  ): ?>
								<div class="row mt-5">
									<div class="col">
										<!-- Baris untuk header -->
										<div class="row">
											<div class="col">
												<div class="alert alert-warning" role="alert">
													<h2>Daftar Mahasiswa</h2>
												</div>
											</div>
										</div>
										<!-- Akhir baris untuk header -->
										<!-- Baris untuk konten mahasiswa -->
										<div class="row">
											<?php foreach ($_SESSION['mhs'] as $indeks_mhs => $mhs): ?>
												<div class="col-lg-4 mt-3 mb-3">
													<div class="card" >
														<div class="card-header">
															<h4>Mahasiswa <?= $indeks_mhs+1; ?></h4>
														</div>
														<ul class="list-group list-group-flush">
															<li class="list-group-item">NIM : <?= $mhs['nim']; ?></li>
															<li class="list-group-item">Nama : <?= $mhs['nama']; ?></li>
															<li class="list-group-item">
																<strong><?= strtoupper("Nilai"); ?></strong>
															</li>
															<?php foreach ($mhs['nilai'] as $indeks_nilai => $nilai): ?>
																<li class="list-group-item">Nilai <?= $indeks_nilai+1; ?> : <?= $nilai; ?></li>
															<?php endforeach ?>
															<li class="list-group-item">Total Nilai : <strong><?= $mhs['total_nilai']; ?></strong></li>
															<li class="list-group-item">Mean : <strong><?= $mhs['mean']; ?></strong></li>
														</ul>
													</div>
												</div>
											<?php endforeach ?>
										</div>
										<!-- Akhir baris untuk konten mahasiswa -->
									</div>
								</div>
							<?php endif ?>
							<!-- AKhir baris untuk daftar mahasiswa yang sudah pernah diinput -->
						</div>
					</div>
				</div>
			</div>
		</div>
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