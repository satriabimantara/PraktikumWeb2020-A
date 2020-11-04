<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<h1 class='display-4'>Lihat laporan <span>penjualan</span><br>dan <span>keuntungan</span> penjualanmu!
		</h1>
	</div>
</div>
<!-- Akhir Jumbotron -->
<!-- Service Container -->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10 profile-panel">
			<!-- Input Tanggal Pencarian -->
			<div class="row">
				<div class="col">
					<form method="post" action="index.php?page=Laporan">
						<div class="row">
							<div class="col-lg">
								<label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
								<input type="date" class="form-control modal-input" placeholder="First name" aria-describedby="tglMulaiHelp" name="tgl_mulai" id="tgl_mulai" value="">
								<small id="tglMulaiHelp" class="form-text text-muted">Masukkan rentang tanggal awal pencarian laporan</small>
							</div>
							<div class="col-lg">
								<label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
								<input type="date" class="form-control modal-input" placeholder="First name" aria-describedby="tglAkhirHelp" name="tgl_akhir" id="tgl_akhir" value="">
								<small id="tglAkhirHelp" class="form-text text-muted">Masukkan rentang tanggal akhir pencarian laporan</small>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col d-flex justify-content-end">
								<button class="btn btn-success tombol" type="submit" name="btnSearchLaporan" value="" id="btnSearchLaporan">
									<i class="fa fa-search" aria-hidden="true"></i>&nbsp;Cari
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- AKhir Input Tanggal Pencarian -->
			<!-- Konten Laporan -->
			<div class="mt-5">
					<div class="row">
						<div class="col">
							<div class="alert alert-warning" role="alert">
								<h2 class="alert-heading">Laporan Penjualan</h2>
								<p style="color: black;">
									Berikut adalah hasil laporan penjualan tokomu<br>
									Laporan penjualan hanya pembeli yang sudah melakukan upload transaksi pembayaran!
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">ID Pembelian</th>
										<th scope="col">Pembeli</th>
										<th scope="col">Tanggal</th>
										<th scope="col">Jasa Pengiriman</th>
										<th scope="col">Status</th>
										<th scope="col">Harga Barang</th>
										<th scope="col">Tarif Ongkir</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Satria Bimantara</td>
										<td>2020-11-04</td>
										<td>GOJEK - GOSEND</td>
										<td>Upload Bukti Pembayaran</td>
										<td>Rp. 1,500,000</td>
										<td>Rp. 20,000</td>
										<td>Rp, 1,520,000</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Satria Bimantara</td>
										<td>2020-11-04</td>
										<td>GOJEK - GOSEND</td>
										<td>Upload Bukti Pembayaran</td>
										<td>Rp. 120,000</td>
										<td>Rp. 20,000</td>
										<td>Rp, 140,000</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th scope="row" colspan="7">TOTAL PENJUALAN</th>
										<td >Rp. 1,660,000</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
			</div>
			<!-- AKhir Konten Laporan -->
		</div>
	</div>
<!-- Akhir service container div berada di index