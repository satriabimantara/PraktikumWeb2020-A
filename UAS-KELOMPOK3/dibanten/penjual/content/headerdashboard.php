<?php
$getAllDataKategoriBanten = $objKategoriBanten->getAllDataKategoriBanten();
$id_toko = $penjual['id_toko'];
//select all data ongkir base on toko
$getTarifOngkir = $objOngkir->getAllDataOngkirBaseOnToko($id_toko);
?>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<?php
			//kalau belum daftar
		if ($penjual['id_toko']==0) {
			echo "<h1 class='display-4'>Mulai <span>berjualan</span><br> dengan <span>mudah</span> sekarang
			</h1>
			<a href='index.php?page=Registrasi Toko' class='btn btn-danger tombol'>
			Daftar Toko
			</a>";
		}else{
			if ($penjual['id_toko']!=0 && $getTarifOngkir->num_rows>=9) {
				echo "<h1 class='display-4'>Jual beli banten <span>mudah</span><br>dan <span>terpercaya</span> di Bali
				</h1>
				<button type='button' class='btn btn-primary tombol tampilModalTambahBanten' data-toggle='modal' data-target='#formModalTambahBanten' id='btnTambahBanten'>
				Tambah Banten
				</button>
				";
			}else{
				echo "<h1 class='display-4'>Lengkapi <span>harga</span> tarif<br>  pengiriman <span>disini</span> sekarang
				</h1>
				<a href='index.php?page=Wilayah Pengiriman' class='btn btn-danger tombol'>
				Lengkapi Ongkir
				</a>";
			}
		}
		?>

		
		<form class="form-inline my-2 my-lg-0 " method="post" action="index.php?page=Etalase">
			<div class="input-group">
				<div class="input-group-prepend">
					<button class="input-group-text modal-input" type="submit">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</div>
				<input class="form-control modal-input" type="search" placeholder="Cari Banten" aria-label="Search" name="banten_dicari" value="">
			</div>
		</form>

	</div>
</div>
<!-- akhir Jumbotron -->


<!-- Modal -->
<form method="post" action="index.php" enctype="multipart/form-data">
	<div class="modal fade" id="formModalTambahBanten" tabindex="-1" role="dialog" aria-labelledby="formModalTambahBantenLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModalTambahBantenLabel">
						Tambah Barang Baru
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- konten edit informasi toko -->
					<div class="form-group ">
						<label for="nama_banten" class="form-label">Nama Banten</label>
						<input type="text" class="form-control modal-input" id="nama_banten" value="" name="nama_banten" required="true">
					</div>
					<div class="form-group ">
						<label for="id_kategori" class="form-label">Kategori</label>
						<select id="id_kategori" class="form-control modal-input" name="id_kategori" required="true">
							<option value="">- Kategori -</option>
							<?php while ( $kategoribanten = $getAllDataKategoriBanten->fetch_assoc()):?>
								<option value="<?= $kategoribanten['id_kategori']; ?>"><?= $kategoribanten['nama_kategori']; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="deskripsi_banten" class="form-label">Deskripsi</label>
						<textarea type="text" class="form-control modal-input" id="deskripsi_banten" value="" name="deskripsi_banten" required="true" rows="3" aria-describedby="deskripsi_banten" maxlength="300"></textarea>
						<small id="deskripsi_banten" class="form-text text-muted">Beri keterangan maksimal 400 karakter</small>
					</div>
					<div class="form-group">
						<label for="kelengkapan_banten" class="form-label">Kelengkapan</label>
						<textarea type="text" class="form-control modal-input" id="kelengkapan_banten" value="" name="kelengkapan_banten" required="true" rows="5" maxlength="400" aria-describedby="kelengkapan_banten"></textarea>
						<small id="kelengkapan_banten" class="form-text text-muted">Beri keterangan maksimal 400 karakter</small>
					</div>
					<label for="foto_banten" class="form-label">Upload Foto (JPG 2MB)</label>
					<!-- Upload foto -->
					<div class="form-group">
						<div class="custom-file mt-2">
							<input type="file" class="custom-file-input " name="foto_banten" id="foto_banten" value="<?= $toko['foto_banten']; ?>" required="true">
							<label for="foto_banten" class="custom-file-label modal-input" >Foto barang</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary tombol" name="btnSubmitTambahBanten" value="">Tambah</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Akhir Modal -->

<!-- Modal untuk konfirmasi pembayaran atau payment -->
<form action="index.php" method="post" enctype="multipart/form-data">
	<!-- Button trigger modal -->
	<div class="modal fade" id="modalLihatPembayaranPembeli" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalLihatPembayaranPembeliLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLihatPembayaranPembeliLabel">Konfirmasi Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="idpembelian_dibayar" value="" id="idpembelian_dibayar">
					<!-- Modal Body Konfirmasi Pembayaran Penjual -->
					<div id="modal-body-konfirmasipembayaranpenjual">
						<img src="" alt="Foto Bukti Transfer Pembayaran" id="buktitransfer_pembayaran" width="300" height="300 " class="item-center">
						<div class="form-group mt-3">
							<a class="btn btn-info item-center" name="btnUnduhBuktiTransfer" download="" href="#">
								<i class="fa fa-download" aria-hidden="true"></i>&nbsp; Unduh Bukti Transfer
							</a>
						</div>
						<div class="form-group ">
							<label for="namapembayar_pembayaran" class="form-label">Nama Penyetor</label>
							<input type="text" class="form-control modal-input" id="namapembayar_pembayaran" value="" name="namapembayar_pembayaran" required="true" maxlength="100" readonly="true">
						</div>
						<div class="form-row">
							<div class="col">
								<label for="bank_pembayaran" class="form-label">Bank</label>
								<input type="text" class="form-control modal-input" id="bank_pembayaran" value="" name="bank_pembayaran" required="true" maxlength="100" readonly="true">
							</div>
							<div class="col">
								<label for="nomorrekening_pembayaran" class="form-label">Nomor Rekening</label>
								<input type="number" class="form-control modal-input" value="" name="nomorrekening_pembayaran" id="nomorrekening_pembayaran" required="true" readonly="true">
							</div>
						</div>
						<div class="form-group mt-2">
							<label for="tanggalkonfirmasi_pembayaran" class="form-label">Tanggal Pembayaran</label>
							<input type="text" class="form-control modal-input" id="tanggalkonfirmasi_pembayaran" value="" name="tanggalkonfirmasi_pembayaran" required="true" maxlength="100" readonly="true">
						</div>
						<div class="form-group ">
							<label for="totalharga_pembayaran" class="form-label">Total Pembayaran</label>
							<input type="text" class="form-control modal-input" id="totalharga_pembayaran" value="" name="totalharga_pembayaran" required="true" maxlength="100" readonly="true">
						</div>

					</div>
					<!-- AKhir modal body konfirmasi pembayaran penjual -->
					<!-- Modal body untuk tolak pesanan dari pembeli -->
					<div id="modal-body-tolakpesanan">
						<div class="form-group">
							<label for="catatanpenolakan_pembelian" class="form-label">Deskripsi</label>
							<textarea type="text" class="form-control modal-input" id="catatanpenolakan_pembelian" value="" name="catatanpenolakan_pembelian" required="true" rows="5" aria-describedby="catatanpenolakan_pembelianhelp" ></textarea>
							<small id="catatanpenolakan_pembelianhelp" class="form-text text-muted">Beri alasan yang jelas kenapa pesanan ini ditolak!</small>
						</div>
					</div>
					<!-- Akhir modal body untuk tolak pesanan dari pembeli -->
					<!-- Modal Body Ubah status dan Resi Pengiriman -->
					<div id="modal-body-editpembelian">
						<?php
						$data_status =  $objStatus->getStatusAllowedAfterPaidOff();
						?>
						<div class="form-group ">
							<label for="nama_status" class="form-label">Status Pembelian</label>
							<select id="nama_status" class="form-control modal-input" name="nama_status" required="true" aria-describedby="nama_statushelp">
								<option value="">- Status Pembelian -</option>
								<?php foreach ($data_status as $indeks =>$status): ?>
									<option value="<?= $status['nama_status']; ?>"><?= $status['nama_status']; ?></option>
								<?php endforeach ?>
							</select>
							<small id="nama_statushelp" class="form-text text-muted">Hanya pilih "Barang Dikirim" jika nomor resi sudah dimasukkan</small>
						</div>
						<div class="form-group collapse" id="input_nomorresi">
							<label for="resipengiriman_pembelian" class="form-label">Nomor Resi Pengiriman</label>
							<input type="text" class="form-control modal-input" id="resipengiriman_pembelian" value="" name="resipengiriman_pembelian" required="true" ria-describedby="input_nomorresi_help" maxlength="100">
							<small id="input_nomorresi_help" class="form-text text-muted">Masukkan nomor resi maksimal 100 karakter</small>
						</div>
					</div>
					<!-- AKhir modal body ubah status dan resi pengiriman -->
					<!-- Modal Body konfirmasi pesanan pembeli -->
					<div class="" id="modal-body-konfirmasipesanan">
						<p>Pesanan akan dikonfirmasi ke pembeli. Silahkan tekan tombol konfirmasi pesanan dan pastikan menyelesaikan pesanan yang telah dikonfirmasi. Pembatalan otomatis akan dilakukan oleh sistem jika tidak ada perubahan!</p>
					</div>
					<!-- AKhir modal body konfirmasi pesanan pembeli -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-success tombol" name="btnSubmitModalPesananPembeli" value="">
						<i class="fa fa-check" aria-hidden="true"></i>&nbsp; Konfirmasi
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Akhir modal untuk konfirmasi pembayaran -->