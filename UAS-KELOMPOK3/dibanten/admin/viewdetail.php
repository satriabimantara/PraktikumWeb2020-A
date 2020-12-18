<!-- Printing -->
	<link rel="stylesheet" href="css/printing.css">
		
<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(isset($_GET['code'])) {
	$Kode = $_GET['code'];
	$sqlsewa = "SELECT pembelian.*,pembeli.*,toko.* FROM pembelian,pembeli,toko WHERE pembelian.idpembeli_pembelian=pembeli.id_pembeli
	AND pembelian.idtoko_pembelian=toko.id_toko AND id_pembelian='$Kode'
	ORDER BY pembelian.id_pembelian ASC";
	$querysewa = mysqli_query($koneksidb,$sqlsewa);
	$result = mysqli_fetch_array($querysewa);
}
else {
	echo "ID Pembelian Tidak Terbaca";
	exit;
}
?>
<html>
<head>
</head>
<body>
<div id="section-to-print">
<div id="only-on-print">
	<h2>Detail Pembelian</h2>
</div>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail Pembelian</h4>
</div>
<div><br/></div>
<table width="100%">
	<tr>
		<td width="20%"><b>Id Pembelian</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['id_pembelian'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Nama Pembeli</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['namapembeli_pembelian'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Nama Toko</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['nama_toko'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Tanggal Pesan</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo IndonesiaTgl($result['tanggalbeli_pembelian']);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Tanggal Kirim</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo IndonesiaTgl($result['tanggalkirim_pembelian']);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Alamat Pengiriman</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['alamatpengiriman_pembelian'].", ".$result['kotapengiriman_pembelian'].", ".$result['provinsipengiriman_pembelian'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Total Harga</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo format_rupiah($result['totalharga_pembelian']);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Jasa Pengiriman</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['jasapengiriman_pembelian'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Status</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['status_pembelian'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
</table>
	<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>

</div>

</body>
</html>