<?php
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
$awal=$_GET['awal'];
$akhir=$_GET['akhir'];
$stt	 = "Sudah Dibayar";
$sqlsewa = "SELECT booking.*,motor.*,merek.*,users.* FROM booking,motor,merek,users WHERE booking.id_motor=motor.id_motor
			AND merek.id_merek=motor.id_merek AND users.email=booking.email AND booking.status='$stt' 
			AND booking.tgl_booking BETWEEN '$awal' AND '$akhir'";
$querysewa = mysqli_query($koneksidb,$sqlsewa);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="rental motor">
	<meta name="author" content="Ilkom Udayana">

	<title>Cetak Detail Laporan</title>
	<link rel="shortcut icon" href="img/favicon-icon/favicon-logo.png">
	<!-- Bootstrap Core CSS -->
	<link href="../assets/new/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../assets/new/offline-font.css" rel="stylesheet">
	<link href="../assets/new/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../assets/new/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="../assets/new/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="img/logo11.png" alt="logo" width="80" />
						</td>
					</tr>
					<tr>
						<td class="text-center"><h2>Rental Motor</h2></td>
					</tr>
					<tr>
						<td class="text-center">Jalan Kampus Unud, Bukit Jimbaran</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">Detail Laporan</h4>
			<h5 class="text-center">Tanggal <?php echo IndonesiaTgl($awal) ." s/d ". IndonesiaTgl($akhir); ?></h5>
			<br/>
			<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Booking</th>
						<th>Tanggal Booking</th>
						<th>Total Bayar</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no=0;
					$pemasukan=0;
					while($result = mysqli_fetch_array($querysewa)) {
						$biayamotor=$result['durasi']*$result['harga'];
						$total=$biayamotor;
						$pemasukan += $total; 
						$no++;
				?>	
					<tr align="center">
						<td><?php echo $no;?></td>
						<td><?php echo htmlentities($result['kode_booking']);?></td>
						<td><?php echo IndonesiaTgl(htmlentities($result['tgl_booking']));?></td>
						<td><?php echo format_rupiah($total);?></td>
					</tr>
				<?php } ?>					
				</tbody>
				<tfoot>
				<?php
					echo '<tr>';
					echo '<th colspan="3" class="text-center">Total Pemasukan</th>';
					echo '<th class="text-center">'. format_rupiah($pemasukan) .'</th>';
					echo '</tr>';
				?>
				</tfoot>
			</table>


		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#jumlah').terbilang({
				'style'			: 3, 
				'output_div' 	: "jumlah2",
				'akhiran'		: "Rupiah",
			});

			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../assets/new/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="../assets/new/jTerbilang.js"></script>

</body>
</html>