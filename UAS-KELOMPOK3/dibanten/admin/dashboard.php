<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}
else
{
	?>
	<!doctype html>
	<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title> Admin Dashboard</title>
		
		<link rel="shortcut icon" href="assets/imgstyle/logo2.png">
		<!-- Font awesome -->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<?php include('includes/header.php');?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Dashboard</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="row">

										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body bk-info text-light">
													<div class="stat-panel text-center">
														<?php 
														$sqlbayar = "SELECT id_pembelian FROM pembelian WHERE status_pembelian='Upload Bukti Pembayaran'";
														$querybayar = mysqli_query($koneksidb,$sqlbayar);
														$bayar=mysqli_num_rows($querybayar);
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($bayar);?></div>
														<div class="stat-panel-title text-uppercase">Menunggu Pembayaran</div>
													</div>
												</div>
												<a href="menunggu_pembayaran.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body bk-success text-light">
													<div class="stat-panel text-center">
														<?php 
														$sqltoko = "SELECT id_toko FROM toko";
														$querytoko = mysqli_query($koneksidb,$sqltoko);
														$toko=mysqli_num_rows($querytoko);
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($toko);?></div>
														<div class="stat-panel-title text-uppercase">Toko</div>
													</div>
												</div>
												<a href="toko.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body bk-info text-light">
													<div class="stat-panel text-center">
														<?php 
														$sqljasa = "SELECT id_jasa FROM jasa";
														$queryjasa = mysqli_query($koneksidb,$sqljasa);
														$jasa=mysqli_num_rows($queryjasa);
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($jasa);?></div>
														<div class="stat-panel-title text-uppercase">Jasa Pengiriman</div>
													</div>
												</div>
												<a href="jasa.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="row">

										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body bk-warning text-light">
													<div class="stat-panel text-center">
														<?php 
														$sql3 = "SELECT id_kategori FROM kategoribanten";
														$query3 = mysqli_query($koneksidb,$sql3);
														$brands=mysqli_num_rows($query3);
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($brands);?></div>
														<div class="stat-panel-title text-uppercase">Kategori Banten</div>
													</div>
												</div>
												<a href="kategori.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body bk-success text-light">
													<div class="stat-panel text-center">
														<?php 
														$sql1 = "SELECT id_banten FROM banten";
														$query1 = mysqli_query($koneksidb,$sql1);
														$totalvehicle=mysqli_num_rows($query1);
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($totalvehicle);?></div>
														<div class="stat-panel-title text-uppercase">Banten</div>
													</div>
												</div>
												<a href="banten.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body bk-warning text-light">
													<div class="stat-panel text-center">
														<?php 
														$sql2 = "SELECT id_bank FROM bank";
														$query2 = mysqli_query($koneksidb,$sql2);
														$bank=mysqli_num_rows($query2);
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($bank);?></div>
														<div class="stat-panel-title text-uppercase">Bank</div>
													</div>
												</div>
												<a href="bank.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>

							
							<div class="row">
								<div class="col-md-12">
									<div class="row">

										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT id_wilayah FROM wilayah";
														$query = mysqli_query($koneksidb,$sql);
														$wilayah=mysqli_num_rows($query);
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($wilayah);?></div>
														<div class="stat-panel-title text-uppercase">Wilayah</div>
													</div>
												</div>
												<a href="wilayah.php" class="block-anchor panel-footer text-center">Rincian <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
		
		<script>
			window.onload = function(){
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
</script>
</body>
</html>
<?php } ?>