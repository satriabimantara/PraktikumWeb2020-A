<!-- Jumbotron -->
<div class="jumbotron jumbotron-dashboard jumbotron-fluid">
	<div class="container">
		<h1 class='display-4'>Jual beli banten <span>mudah</span><br>dan <span>terpercaya</span> di Bali
		</h1>
		<button type='button' class='btn btn-primary tombol tampilModalTambahBanten' data-toggle='modal' data-target='#formModalTambahBanten' id='btnTambahBanten'>
		Tambah Banten
		</button>
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
<form method="post" enctype="multipart/form-data">
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
							<option value="1">Dewa Yadnya</option>
						</select>
					</div>
					<div class="form-group">
						<label for="deskripsi_banten" class="form-label"> Deskripsi</label>
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
<form method="post" enctype="multipart/form-data">
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
					<!-- Modal Body Konfirmasi Pembayaran Penjual -->
					<div id="modal-body-konfirmasipembayaranpenjual">
						<img src="" alt="Foto Bukti Transfer Pembayaran" id="buktitransfer_pembayaran" width="300" height="300 " class="item-center">
						<div class="form-group mt-3">
							<button class="btn btn-info item-center" name="btnUnduhBuktiTransfer">
								<i class="fa fa-download" aria-hidden="true"></i>&nbsp; Unduh Bukti Transfer
							</button>
						</div>
						<input type="hidden" name="idpembelian_dibayar" value="" id="idpembelian_dibayar">
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
					</div>
					<!-- AKhir modal body konfirmasi pembayaran penjual -->
					<!-- Modal Body Ubah status dan Resi Pengiriman -->
					<div class="" id="modal-body-editpembelian">
						<p>Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Ut, animi veritatis labore earum aliquid. Impedit assumenda, consequatur animi consequuntur soluta commodi, ex aliquam magnam dolorum dolores obcaecati velit ullam, fugit?</p>
					</div>
					<!-- AKhir modal body ubah status dan resi pengiriman -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-success tombol" name="btnSubmitKonfirmasiPembayaran" value="">
						<i class="fa fa-check" aria-hidden="true"></i>&nbsp; Konfirmasi
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Akhir modal untuk konfirmasi pembayaran -->