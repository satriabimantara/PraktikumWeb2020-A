<?php
//retrieve data from ajax send
if (isset($_POST)) {
	$id_detail = $_POST['id_detail'];
	$id_toko = $_POST['id_toko'];
	$hargajual_detail = $_POST['hargajual_detail'];
	$diskon_detail = $_POST['diskon_detail'];
	$hargadiskon_detail = $_POST['hargadiskon_detail'];
	$stok_detail = $_POST['stok_detail'];
	$nama_banten = $_POST['nama_banten'];
	$tingkatan_banten = $_POST['nama_tingkatan'];
	$kelengkapan_banten = $_POST['kelengkapan_banten'];
	$deskripsi_banten = $_POST['deskripsi_banten'];
	$kategori_banten = $_POST['nama_kategori'];
	$nama_toko = $_POST['nama_toko'];
	$alamat_toko = $_POST['alamat_toko'];
	$kodepos_toko = $_POST['kodepos_toko'];
	$kota_toko = $_POST['kota_toko'];
	$provinsi_toko = $_POST['provinsi_toko'];
	$foto_banten = $_POST['foto_banten'];
	$kota_wilayah = $_POST['kota_wilayah'];
}
?>
<div class="col-lg-3 mt-3 mb-3">
	<div class="card shadow h-100">
		<img src="../../assets/imgbanten/<?= $foto_banten; ?>" class="card-img-top" alt="Foto Barang">
		<div class="card-body">
			<h5 class="card-title">
				<?= $nama_banten; ?>
			</h5>
			<p class="text-card-banten">
				Tingkatan <?= $tingkatan_banten; ?>
			</p>
			<p class="text-card-banten">
				<?= $kategori_banten; ?>
			</p>
			<?php
			if ($diskon_detail!=0) {
				$style = "text-decoration:line-through";
			}else{
				$style="";
			}
			?>
			<p class="card-text label-harga" style="<?= $style; ?>">
				Rp. <?= number_format($hargajual_detail); ?>
			</p>
			<?php if ($diskon_detail!=0): ?>
				<p class="text-card-banten">
					<i class="fa fa-tags" aria-hidden="true"></i>
					</svg>
					<?= $diskon_detail; ?>% Rp. <span class="label-diskon"><?= number_format($hargadiskon_detail); ?></span>
				</p>
			<?php endif ?>
			<p class="text-card-banten">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<?= $nama_toko; ?>
			</p>
			<p class="text-card-banten">
				<?php for ($i=0; $i < 5; $i++) : ?>
					<i class="fa fa-star" aria-hidden="true"></i>
				<?php endfor; ?>
			</p>
			<form method="post" action="index.php?page=Beli">
				<input type="hidden" name="id_detail" value="<?= $id_detail; ?>">
				<input type="hidden" name="id_toko" value="<?= $id_toko; ?>">
				<input type="hidden" name="hargajual_detail" value="<?= $hargajual_detail; ?>">
				<input type="hidden" name="diskon_detail" value="<?= $diskon_detail; ?>">
				<input type="hidden" name="hargadiskon_detail" value="<?= $hargadiskon_detail; ?>">
				<input type="hidden" name="stok_detail" value="<?= $stok_detail; ?>">
				<input type="hidden" name="nama_banten" value="<?= $nama_banten; ?>">
				<input type="hidden" name="tingkatan_banten" value="<?= $tingkatan_banten; ?>">
				<input type="hidden" name="kelengkapan_banten" value="<?= $kelengkapan_banten; ?>">
				<input type="hidden" name="deskripsi_banten" value="<?= $deskripsi_banten; ?>">
				<input type="hidden" name="kategori_banten" value="<?= $kategori_banten; ?>">
				<input type="hidden" name="nama_toko" value="<?= $nama_toko; ?>">
				<input type="hidden" name="alamat_toko" value="<?= $alamat_toko; ?>">
				<input type="hidden" name="kodepos_toko" value="<?= $kodepos_toko; ?>">
				<input type="hidden" name="kota_toko" value="<?= $kota_toko; ?>">
				<input type="hidden" name="provinsi_toko" value="<?= $provinsi_toko; ?>">
				<input type="hidden" name="foto_banten" value="<?= $foto_banten; ?>">
				<button type="submit" name="btnBeliBanten" class="btn btn-primary btn-card">Beli</button>
			</form>
		</div>
	</div>
</div>
