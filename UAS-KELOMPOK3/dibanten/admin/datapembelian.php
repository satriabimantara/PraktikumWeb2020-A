<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');}
else{
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>GO Banten | Admin Kelola Pembayaran</title>
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
 <style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Data Pembelian</h2>
						
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Daftar Pembelian</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
							else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr align="center">
										<th>No</th>
										<th>ID Pembelian</th>
										<th>ID Pembeli</th>
										<th>Tgl. Pesanan</th>
										<th>Tgl. Pengiriman</th>
										<th>Alamat Pengiriman</th>
										<th>Total Harga</th>
										<th>Status</th>
										<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										$sql = "SELECT pembelian.*,pembeli.*,toko.* FROM pembelian,pembeli,toko WHERE pembelian.idpembeli_pembelian=pembeli.id_pembeli
													AND pembelian.idtoko_pembelian=toko.id_toko
													ORDER BY pembelian.id_pembelian ASC";
										$query = mysqli_query($koneksidb,$sql);
										while ($result = mysqli_fetch_array($query)) {
											$i++;
											?>
										<tr align="center">
											<td><?php echo $i;?></td>
											<td><?php echo htmlentities($result['id_pembelian']);?></td>
											<td><?php echo htmlentities($result['idpembeli_pembelian']);?></td>
											<td><?php echo IndonesiaTgl(htmlentities($result['tanggalbeli_pembelian']));?></td>
											<td><?php echo IndonesiaTgl(htmlentities($result['tanggalkirim_pembelian']));?></td>
											<td><?php echo htmlentities($result['alamatpengiriman_pembelian']);?></td>
											<td><?php echo format_rupiah(htmlentities($result['totalharga_pembelian']));?></td>
											<td><?php echo htmlentities($result['status_pembelian']);?></td>
											<td>
											<a href="#myModal" data-toggle="modal" data-load-code="<?php echo $result['id_pembelian']; ?>" data-remote-target="#myModal .modal-body"><span class="fa fa-eye"></span> Detail</a></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
	<!-- Large modal -->
	<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-body">
					<p>One fine body…</p>
				</div>
			</div>
		</div>
	</div>    
	<!-- Large modal --> 

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
		var app = {
			code: '0'
		};
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('viewdetail.php?code='+code);
						app.code = code;
						
					}
		});
    </script>
</body>
</html>
<?php } ?>