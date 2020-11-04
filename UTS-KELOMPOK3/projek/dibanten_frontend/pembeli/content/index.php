<?php
include '../templates/headermain.php';
?>
<!-- Start Navbar -->
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light"><a class="" href="#"><img src="../../assets/imgstyle/logo1.png"
		alt="" class="img img-fluid img-brand"></a><button class="navbar-toggler" type="button"
		data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
		aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="../content/index.php">
					Home
				</a>
				<a class="nav-item nav-link" href="index.php?page=Keranjang" >
					Keranjang
				</a>
				<a class="nav-item nav-link" href="index.php?page=Checkout">
					Checkout
				</a>
					<a class="nav-item nav-link" href="index.php?page=History">
						Riwayat Belanja
					</a>
					<a class="nav-item nav-link" href="index.php?page=Nota">
						Nota
					</a>
				<!-- Button Login -->
					<div class="dropdown">
						<a class="nav-item btn btn-danger tombol dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Logout
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="index.php?page=Profile">
								<i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile 
							</a>
							<a class="dropdown-item" href="logout.php">
								<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout 
							</a>
						</div>
					</div>
					<!-- Akhir button login -->
				</div>
			</div>
		</nav>
	</div>
	<!-- End Navbar -->
	<?php
	if (isset($_GET['page'])) {
		if ($_GET['page']=="Keranjang") {
			require_once 'keranjang.php';
		}elseif ($_GET['page']=="Checkout") {
			require_once 'checkout.php';
		}elseif ($_GET['page']=="Beli") {
			require_once 'beli.php';
		}elseif ($_GET['page']=="Profile") {
			require_once 'profile.php';
		}elseif ($_GET['page']=="Nota") {
			require_once 'nota.php';
		}elseif ($_GET['page']=="History") {
			require_once 'riwayatbelanja.php';
		}elseif ($_GET['page']=="Payment") {
			require_once 'payment.php';
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