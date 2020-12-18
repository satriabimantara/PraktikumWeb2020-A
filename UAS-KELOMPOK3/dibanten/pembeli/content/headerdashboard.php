<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<h1 class='display-4'>Berbelanja <span>banten</span><br> dengan <span>mudah</span> sekarang
		</h1>
		<form class="form-inline my-2 my-lg-0 " method="post" action="index.php" name="formSearchBanten" id="formSearchBanten">
			<div class="input-group">
				<div class="input-group-prepend">
					<button class="input-group-text modal-input" type="submit" name="btnCariBanten" id="btnCariBanten">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</div>
				<input class="form-control modal-input" type="search" placeholder="Cari Banten" aria-label="Search" name="banten_dicari" value="" required="true" id="banten_dicari">
			</div>
		</form>
	</div>
</div>
<!-- akhir Jumbotron -->

<!-- Modal untuk konfirmasi pembayaran atau payment -->
<form action="index.php?page=Payment" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="modalKonfirmasiPembayaran" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalKonfirmasiPembayaranLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalKonfirmasiPembayaranLabel">Konfirmasi Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="modalBodyKonfirmasiPembayaran">
						<div class="alert alert-primary" role="alert" id="alertKonfirmasiPembayaran"></div>
						<input type="hidden" name="idpembelian_dibayar" value="" id="idpembelian_dibayar">
						<div class="form-group ">
							<label for="namapembayar_pembayaran" class="form-label">Nama Penyetor</label>
							<input type="text" class="form-control modal-input" id="namapembayar_pembayaran" value="" name="namapembayar_pembayaran" required="true" maxlength="100" >
						</div>
						<div class="form-row">
							<div class="col">
								<?php
								$runQueryGetAllDataBank = $objBank->getAllDataBank();
								?>
								<label for="bank_pembayaran" class="form-label">Bank</label>
								<select id="bank_pembayaran" class="form-control modal-input" name="bank_pembayaran" required="true" aria-describedby="bankHelp">
									<option value="">- Bank Pilihan -</option>
									<?php while ( $bank = $runQueryGetAllDataBank->fetch_assoc()):?>
										<option value="<?= $bank['nama_bank']; ?>"><?= $bank['nama_bank']; ?></option>
									<?php endwhile; ?>
								</select>
								<small id="bankHelp" class="form-text text-muted">Pilih bank tujuan Anda!</small>
							</div>
							<div class="col">
								<label for="nomorrekening_pembayaran" class="form-label">Nomor Rekening</label>
								<input type="number" class="form-control modal-input" value="" name="nomorrekening_pembayaran" required="true" aria-describedby="nomorrekeningHelp">
								<small id="nomorrekeningHelp" class="form-text text-muted">Masukkan nomor rekening tujuan Anda</small>
							</div>
						</div>
						<label for="buktitransfer_pembayaran" class="form-label">Upload Bukti Tranfer (JPG/PNG 2MB)</label>
						<!-- Upload foto -->
						<div class="form-group">
							<div class="custom-file mt-2">
								<input type="file" class="custom-file-input " name="buktitransfer_pembayaran" id="buktitransfer_pembayaran" value="" required="true">
								<label for="buktitransfer_pembayaran" class="custom-file-label modal-input" >Foto Bukti Transfer</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-success tombol" name="btnSubmitKonfirmasiPembayaran" value="">
						<i class="fa fa-upload" aria-hidden="true"></i>&nbsp; Submit
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Akhir modal untuk konfirmasi pembayaran -->
<!-- Modal pesanan diterima telah sampai -->
<form action="index.php?page=Nota" method="post">
	<div class="modal fade" id="modalPesananDiterimaPembeli" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPesananDiterimaPembeliLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalPesananDiterimaPembeliLabel">Pesanan Diterima</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="modal-body-kontenpembelian">
						<!-- Baris untuk toko -->
						<div class="row" id="kontenpembelian-toko">
							<div class="col">
								<!-- Foto Banner Toko -->
								<div class="row" id="penilaian-bannertoko">
									<div class="col">

									</div>
								</div>
								<!-- AKhir Foto Banner Toko -->
								<!-- Range Penilaian -->
								<div class="row mt-3" id="penilaian-ratingtoko">
									<div class="col">
										
									</div>
								</div>
								<!-- Akhir range penilaian -->
							</div>
						</div>
						<!-- AKhir baris untuk toko -->
						<!-- Baris untuk banten -->

						<div class="row" id="penilaian-banten">
							<div class="col">
								
							</div>
						</div>
						<!-- Akhir baris untuk banten -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-success" name="btnSubmitPesananSelesai">Selesai</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Akhir modal pesanan diterima telah sampai -->
