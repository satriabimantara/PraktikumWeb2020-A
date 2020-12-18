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
				<?php if (isset($_POST['btnSearchLaporan'])): ?>
					<?php
					$total_penjualan = 0;
					$date = array();
					$date['tgl_mulai'] = $_POST['tgl_mulai'];
					$date['tgl_akhir'] = $_POST['tgl_akhir'];
					$status = "konfirmasi_pembayaran";
					//query laporan penjualan berdasarkan rentang tanggal yang statusnya konfirmasi_pembayaran
					$runQueryGetLaporanPembelianByDateAndStatus = $objPembelian->getLaporanPembelianByDateAndStatus($date,$status);
					?>
					<div class="row">
						<div class="col">
							<div class="alert alert-warning" role="alert">
								<h2 class="alert-heading">Laporan Penjualan</h2>
								<p style="color: black;">
									Berikut adalah hasil laporan penjualan tokomu dari tanggal <?= $date['tgl_mulai']; ?> sampai <?= $date['tgl_akhir']; ?><br>
									Laporan penjualan hanya pembeli yang sudah dikonfirmasi pembayarannya!
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
									<?php while ($lap_pembelian = $runQueryGetLaporanPembelianByDateAndStatus->fetch_assoc()) :?>
										<tr>
											<th scope="row"><?= $lap_pembelian['id_pembelian']; ?></th>
											<td><?= $lap_pembelian['namapembeli_pembelian']; ?></td>
											<td><?= $lap_pembelian['tanggalbeli_pembelian']; ?></td>
											<td><?= $lap_pembelian['jasapengiriman_pembelian']; ?></td>
											<td><?= $lap_pembelian['status_pembelian']; ?></td>
											<td>Rp. <?= number_format(($lap_pembelian['totalharga_pembelian']-$lap_pembelian['tarifongkir_pembelian'])); ?></td>
											<td>Rp. <?= number_format($lap_pembelian['tarifongkir_pembelian']); ?></td>
											<td>Rp. <?= number_format($lap_pembelian['totalharga_pembelian']); ?></td>
										</tr>
										<?php
										$total_penjualan +=$lap_pembelian['totalharga_pembelian'];
										?>
									<?php endwhile ?>
								</tbody>
								<tfoot>
									<tr>
										<th scope="row" colspan="7">TOTAL PENJUALAN</th>
										<td >Rp. <?= number_format($total_penjualan); ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				<?php endif ?>
			</div>
			<!-- AKhir Konten Laporan -->
		</div>
	</div>
<!-- Akhir service container div berada di index