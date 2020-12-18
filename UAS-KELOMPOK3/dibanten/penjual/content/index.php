<?php 
include '../templates/headermain.php';

if (!isset($_SESSION['penjual'])) {
	//berikan pesan bahwa anda harus login dulu baru bisa masuk ke halaman login
	$objFlash->showSimpleFlash("LOGIN REQUIRED","warning","Silahkan login untuk dapat melanjutkan!","login.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Login");
	exit();
}
$penjual = $_SESSION['penjual'];
//Retrieve Jumlah Pesanan Baru yang masuk
$amountPesananMasuk = $objPembelian->getAmountDetailPembelianPerToko($penjual['id_toko']);
?>
<!-- Start Navbar -->
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light"><a class="" href="#"><img src="../../assets/imgstyle/logo1.png"
		alt="" class="img img-fluid img-brand"></a><button class="navbar-toggler" type="button"
		data-toggle="collapse" data-target="#navbarIndexPenjual" aria-controls="navbarIndexPenjual"
		aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarIndexPenjual">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="index.php">
					Home
				</a>
				<?php if ($penjual['id_toko']!=0): ?>
					<a class="nav-item nav-link" href="index.php?page=Etalase">
						Etalase
					</a>
					<a class="nav-item nav-link" href="index.php?page=Wilayah Pengiriman">
						Wilayah Pengiriman 
					</a>
				<?php endif ?>
				<?php if (!isset($_GET['page']) && $amountPesananMasuk!=0): ?>
					<a type="button" role="button" class="nav-item nav-link" title="Pesanan Masuk" name="btnNotifikasiPesanan">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Pesanan <span class="badge badge-primary"><?= $amountPesananMasuk; ?></span>
					</a>
				<?php endif ?>
				<div class="dropdown">
					<a class="nav-item btn btn-danger tombol dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Logout
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="index.php?page=Profile">
							<i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile 
						</a>
						<?php if ($penjual['id_toko']!=0): ?>
							<a class="dropdown-item" href="index.php?page=Laporan">
								<i class="fa fa-book" aria-hidden="true"></i>&nbsp;Laporan 
							</a>
							<a class="dropdown-item" href="index.php?page=Informasi Toko">
								<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Informasi Toko 
							</a>
						<?php endif ?>
						<a class="dropdown-item" href="logout.php">
							<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout 
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>
<!-- End Navbar -->
<?php
if (isset($_GET['page'])) {
	if ($_GET['page']=="Profile") {
		require_once 'profile.php';
	}elseif ($_GET['page']=="Registrasi Toko") {
		require_once 'registrasitoko.php';
	}elseif ($_GET['page']=="Informasi Toko") {
		require_once 'informasitoko.php';
	}elseif ($_GET['page']=="Wilayah Pengiriman") {
		require_once 'wilayahpengiriman.php';
	}elseif ($_GET['page']=="Etalase") {
		require_once 'etalase.php';
	}elseif ($_GET['page']=="Detail Banten") {
		require_once 'detailbanten.php';
	}elseif ($_GET['page']=="Laporan") {
		require_once 'laporanpenjualan.php';
	}
}else{
	require_once 'home.php';
}
?>
<!-- Footer -->
<div class="row footer">
	<div class="col text-center">
		<p>
			2020 All Rights Reserved Satria Bimantara
		</p>
	</div>
</div>
<!-- Akhir Footer -->
</div>
<!-- Akhir Service Container -->
<?php 
include '../templates/footermain.php';
?>