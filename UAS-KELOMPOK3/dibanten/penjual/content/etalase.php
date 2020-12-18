<?php 
require_once 'headerdashboard.php'; 
$id_toko = $penjual['id_toko'];
$ifBantenDicariAda ='';
$getAllDataKategoriBanten = $objKategoriBanten->getAllDataKategoriBanten();
$runQueryGetAllDataTingkatanBanten = $objTingkatan->getAllDataTingkatanBanten();
$row_count=4;

//jika ada banten yang dicari
if (isset($_POST['banten_dicari'])) {
	$banten_dicari =  $_POST['banten_dicari'] ;
	echo "<script>console.log('Masih ada, lanjut ke next page')</script>";
	$offset=0;
	if (isset($_GET['offset'])) {
		$offset = $_GET['offset']*$row_count;
	}
	$runQueryGetAllDataBantenBySearch = $objBanten->getAllDataBantenBySearch($_POST['banten_dicari'],$id_toko,$offset,$row_count);
	$ifBantenDicariAda = $objBanten->getAmountBantenBySearch($id_toko,$_POST['banten_dicari'])->num_rows;
	$banyakBantenToko = $ifBantenDicariAda;
	$runQueryGetAllDataBantenByIdToko = $runQueryGetAllDataBantenBySearch;
}
// jika user tidak mencari banten namun mengklik pagination
else{
	$offset=0;
	if (isset($_GET['offset'])) {
		$offset = $_GET['offset']*$row_count;
	}
	$runqueryShowAllDataBantenByIdTokoPerPage = $objBanten->showAllDataBantenByIdTokoPerPage($id_toko,$offset,$row_count);
	$runQueryGetAllDataBantenByIdToko = $runqueryShowAllDataBantenByIdTokoPerPage;
	$banyakBantenToko = $objBanten->getAmountBantenByIdToko($id_toko);
}



?>
<!-- Etalase Banten -->

<div class="container ">
	<div class="row justify-content-center">
		<div class="col-10 service-panel">
			<!-- Jika ada banten yang ditampilkan -->
			<?php if ($banyakBantenToko!=0) : ?>
				<!-- Heading -->
				<div class="row mb-lg-3">
					<div class="col">
						<nav class="navbar navbar-expand-lg navbar-light ">
							<h5 class="navbar-brand etalase-header">
								Etalase Banten
							</h5>		
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEtalaseBanten" aria-controls="navbarEtalaseBanten" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<?php if ((isset($_POST['banten_dicari']) && $ifBantenDicariAda!=0) || ($banyakBantenToko!=0 && !isset($_POST['banten_dicari']))): ?>
							<div class="collapse navbar-collapse" id="navbarEtalaseBanten">
								<ul class="navbar-nav ml-auto">
									<form class="form-inline my-2 my-lg-0" method="post" action="index.php?page=Etalase">
										<div class="form-group  mr-sm-2">
											<select class="form-control input-login" id="id_kategori" name="id_kategori" required="true">
												<option value="">- Kategori  -</option>
												<?php while ($kategoribanten = $getAllDataKategoriBanten->fetch_assoc()):?>
													<option value="<?= $kategoribanten['id_kategori']; ?>"><?= $kategoribanten['nama_kategori']; ?></option>
												<?php endwhile; ?>
											</select>
										</div>
										<button class="btn btn-outline-success my-2 my-sm-0 tombol" type="submit" name="btnSearchBantenByKategori"><i class="fa fa-search" aria-hidden="true"></i></button>
									</form>
								</ul>
							</div>
						<?php endif ?>
					</nav>
				</div>
			</div>
			<!-- End Heading -->

			<!-- Konten Etalase -->
			<div class="row mb-3 mt-3">
				<?php while ($banten = $runQueryGetAllDataBantenByIdToko->fetch_assoc()) : ?>
					<div class="col-lg-6 mb-5 ">
						<div class="card shadow h-100">
							<div class="card-header bg-transparent">
								<div class="d-flex justify-content-between">
									<h3 style="font-family: 'Kanit', sans-serif;">
										<?= $banten['nama_banten']; ?>
									</h3>
									<!-- Button trigger modal -->
									<button type="button" class="btn tombol-card btn-danger tampilModalTambahInformasiBanten" data-toggle="modal" data-id="<?= $banten['id_banten']; ?>" data-target="#modalInformasiBanten" name="btnTambahInformasiBanten" value="" title="Lengkapi Informasi Banten">
										<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 mb-lg-0">
										<img src="../../assets/imgbanten/<?= $banten['foto_banten']; ?>" alt="Foto Banten" class="img-fluid img-etalase">

									</div>
									<div class="col-lg-6">
										<div class="row">
											<div class="col">
												<h4>Kategori</h4>
												<p><?= $banten['nama_kategori']; ?></p>
												<h4>Deskripsi</h4>
												<p><?= $banten['deskripsi_banten']; ?></p>
												<h4>Kelengkapan</h4>
												<p><?= $banten['kelengkapan_banten']; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="btn-group ml-auto btn-block" role="group" aria-label="Button Detail">
													<!-- Button trigger modal -->
													<button type="button" class="btn tombol-card btn-dark tampilModalHapusInformasiBanten" data-id="<?= $banten['id_banten']; ?>" data-toggle="modal" data-target="#modalInformasiBanten" name="btnHapusBanten" value="" title="Hapus Banten">
														<i class="fa fa-trash-o fa-lg"></i>
													</button>
													<a href="index.php?page=Detail Banten&id=<?= $banten['id_banten']; ?>" class="btn btn-dark tombol-card" title="Detail Banten">
														<i class="fa fa-th-list" aria-hidden="true"></i>
													</a>
													<button type="button" class="btn btn-dark  tombol-card tampilModalEditInformasiBanten" data-toggle="modal" data-target="#modalInformasiBanten" name="btnEditBanten" value="" data-id="<?= $banten['id_banten']; ?>" title="Edit Banten"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<!-- Akhir Konten Etalase -->
			<!-- Alert jika banten dicari tidak ada -->
			<?php if ( isset($_POST['banten_dicari']) && $ifBantenDicariAda==0): ?>
				<div class="alert alert-warning" role="alert">
					<strong>Banten Tidak Ada</strong> Banten yang kamu cari tidak ada disini. Tambah banten jika kamu ingin menjualnya!
				</div>
			<?php endif ?>
			<!-- Akhir alert jika banten dicari tidak ada -->
			<!-- Pagination -->
			<?php if ((isset($_POST['banten_dicari']) && $ifBantenDicariAda!=0) || ($banyakBantenToko!=0 && !isset($_POST['banten_dicari']))): ?>
			<!-- Logika untuk before and next -->
			<?php
			$banyak_banten = $banyakBantenToko;
			$b = 4; //banyak data ditampilkan per halaman
			$nPage = $banyak_banten/$b;
			$mod = $banyak_banten%$b;
			if ($mod!=0) {
				$nPage+=1;
			}
			$nPage = floor($nPage);
			if (isset($_GET['offset'])) {
				$pageBefore = 0; //minimum of page
				$pageNow = $_GET['offset'];
				$pageAfter = $nPage-1; //maksimum of page. Indeks dimulai dari 0 sehingga harus dikurang 1
				//jika sedang berada di awal page, before set 0
				if ($pageNow==0) {
					//cek jika total page yang dihasilkan memang 1 halaman, maka page after tetap, jika tidak maka pageafter ditambah 1
					if ($nPage-1 == $pageNow) {
						$pageAfter = $pageNow ;
					}else{
						$pageAfter = $pageNow +1;
					}
				}elseif ($pageNow==$nPage-1) {
					$pageBefore = $pageNow-1;
				}
			}else{
				$pageBefore=0;
				//jika jumlah banten yang ditampilkan hanya 1 page
				if ($nPage-1 == $pageBefore) {
					$pageAfter = $pageBefore;
				}else{
					$pageAfter = $pageBefore+1;
				}
			}
			?>
			<nav aria-label="Page navigation example">
				<div class="row pagination pagination-lg">
					<!-- Tombol Before -->
					<div class="col-2 d-flex justify-content-start">
						<li class="page-item ">
							<?php if (isset($_POST['banten_dicari'])): ?>
								<form method="post" action="index.php?page=Etalase&offset=<?= $pageBefore; ?>"><!-- Lempar secara hidden untuk banten yang dicari agar ditangkap di awal etalase -->
									<input type="hidden" name="banten_dicari" value="<?= $banten_dicari; ?>">
									<?php else: ?>
										<form method="post" action="index.php?page=Etalase&offset=<?= $pageBefore; ?>">
										<?php endif ?>
										<button class="page-link" type="submit">
											<span aria-hidden="true" class="btn-previous" >&laquo;</span>
										</button>
									</form>
								</li>
							</div>
							<!-- Akhir tombol before -->
							<div class="col-8 d-flex justify-content-center">
								<?php for ($i=0; $i <$nPage ; $i++) : ?>
									<?php if (isset($_POST['banten_dicari'])): ?>
										<form method="post" action="index.php?page=Etalase&offset=<?= $i; ?>">
											<!-- Lempar secara hidden untuk banten yang dicari agar ditangkap di awal etalase -->
											<input type="hidden" name="banten_dicari" value="<?= $banten_dicari; ?>">
											<?php else: ?>
												<form method="post" action="index.php?page=Etalase&offset=<?= $i; ?>">
												<?php endif ?>
												<li class="page-item">
													<button class="page-link page-number" type="submit"><?= $i+1; ?></button>
												</li>
											</form>
										<?php endfor; ?>
									</div>
									<!-- Tombol Next -->
									<div class="col-2 d-flex justify-content-end">
										<li class="page-item">
											<?php if (isset($_POST['banten_dicari'])): ?>
												<form method="post" action="index.php?page=Etalase&offset=<?= $pageAfter; ?>"><!-- Lempar secara hidden untuk banten yang dicari agar ditangkap di awal etalase -->
													<input type="hidden" name="banten_dicari" value="<?= $banten_dicari; ?>">
													<?php else: ?>
														<form method="post" action="index.php?page=Etalase&offset=<?= $pageAfter; ?>">
														<?php endif ?>
														<button class="page-link" type="submit">
															<span aria-hidden="true" class="btn-next">&raquo;</span>
														</button>
													</form>
												</li>
											</div>
											<!-- Akhir tombol next -->
										</div>
									</nav>
								<?php endif ?>
								<!-- Akhir Pagination -->
							<?php endif; ?>
							<!-- Akhir pengkondisian untuk ada banten yang ditampilkan -->
							<!-- Pengkondisian jika tidak ada banten yang ditampilkan -->
							<?php if ($banyakBantenToko==0 && isset($_POST['banten_dicari']) ): ?>
								<div class="row justify-content-center">
									<div class="col">
										<div class="alert alert-danger" role="alert">
											<strong>Banten tidak ada</strong> Banten yang Anda cari tidak ada di etalase. Anda bisa menambahkan banten tersebut dan lihat disini!
										</div>
									</div>
								</div>
								<?php elseif ($banyakBantenToko==0 && !isset($_POST['banten_dicari'])) : ?>
									<div class="row justify-content-center">
										<div class="col">
											<div class="alert alert-primary alert-dismissible fade show" role="alert">
												<strong>Etalase Kosong</strong> Anda belum memiliki banten apapun yang bisa ditampilkan saat ini. <br> Segera tambahkan banten dan lihat disini!
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										</div>
									</div>
									<div class="row justify-content-center">
										<div class="col">
											<div class="alert alert-warning alert-dismissible fade show" role="alert">
												Jika link tambah banten tidak muncul <a href="index.php?page=Wilayah Pengiriman" class="alert-link">lengkapi tarif pengiriman</a> terlebih dahulu!
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										</div>
									</div>
								<?php endif ?>
								<!-- Akhir pengkondisian jika tidak ada banten yang ditampilkan -->
							</div>
						</div>
						<!-- Akhir Etalase Banten div berada di index -->
						<!-- Modal Tambah Informasi Banten dan Hapus Banten Bersangkutan -->
						<form method="post" action="index.php?page=Etalase" enctype="multipart/form-data">
							<div class="modal fade" id="modalInformasiBanten" tabindex="-1" role="dialog" aria-labelledby="modalInformasiBantenLabel" aria-hidden="true" data-backdrop="static">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalInformasiBantenLabel">
												Lengkapi Informasi Barang
											</h5>
											<button type="button" class="close close-etalase" data-dismiss="modal"  aria-label="Close" id="btnCloseModalInformasiBanten">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<img src="" class=" img-thumbnail-modal d-block mx-auto " alt="Foto Banten" id="foto_bantenSelected">
											<!-- Input id_banten yang dipilih secara hidden melalui jquery -->
											<input type="hidden" name="id_bantenSelected" value="" id="id_bantenSelected">
											<!-- Input foto banten lama untuk mengecek nanti apakah user mengupdate foto banten atau tidak -->
											<input type="hidden" name="foto_bantenLama" id="foto_bantenLama" value="">
											<!-- konten edit informasi toko -->
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group ">
														<label for="nama_bantenSelected" class="form-label">Nama Barang</label>
														<input type="text" class="form-control modal-input" id="nama_bantenSelected" value="" name="nama_bantenSelected" required="true" >
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group ">
														<label for="id_kategoriSelected" class="form-label">Kategori</label>
														<select  id="id_kategoriSelected" class="form-control modal-input" name="id_kategoriSelected" required="true">
															<option value="">- Kategori -</option>
															<?php $getAllDataKategoriBanten = $objKategoriBanten->getAllDataKategoriBanten(); ?>
															<?php while ( $kb = $getAllDataKategoriBanten->fetch_assoc()):?>
																<option value="<?= $kb['id_kategori']; ?>">
																	<?= $kb['nama_kategori']; ?>
																</option>
															<?php endwhile; ?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="deskripsi_bantenSelected" class="form-label"> Deskripsi</label>
														<textarea type="text" class="form-control modal-input" id="deskripsi_bantenSelected" value="" name="deskripsi_bantenSelected" required="true" rows="5" aria-describedby="deskripsi_bantenSelected" maxlength="300" ></textarea>
														<small id="deskripsi_bantenSelected" class="form-text text-muted small-modal-etalase">Beri keterangan maksimal 400 karakter</small>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="kelengkapan_bantenSelected" class="form-label">Kelengkapan</label>
														<textarea type="text" class="form-control modal-input" id="kelengkapan_bantenSelected" value="" name="kelengkapan_bantenSelected" required="true" rows="5" maxlength="400" aria-describedby="kelengkapan_bantenSelected" ></textarea>
														<small id="kelengkapan_bantenSelected" class="form-text text-muted small-modal-etalase">Beri keterangan maksimal 400 karakter</small>
													</div>
												</div>
											</div>
											<!-- Konten yang khusus ditampilkan ketika button tambah banten ditekan, selain itu maka hide ini -->
											<div id="modal-tambah-etalase">
												<!-- Harga -->
												<div class="row">
													<div class="col-lg-8">
														<label for="harga_banten" class="form-label">Harga Barang</label>
														<input type="number" class="form-control modal-input" id="harga_banten" value="" name="harga_banten" >
													</div>
													<div class="col-lg-4">
														<label for="diskon_banten" class="form-label">Diskon Barang</label>
														<input type="number" class="form-control modal-input" id="diskon_banten" value="" name="diskon_banten"  aria-describedby="diskon_bantenDescribe">
														<small id="diskon_bantenDescribe" class="form-text text-muted small-modal-etalase">Masukkan hanya angka saja!</small>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-8">
														<!-- Tingkatan banten -->
														<div class="form-group">
															<label for="id_tingkatan" class="form-label">Tingkatan</label>
															<select id="id_tingkatan" class="form-control modal-input etalase-target-select" name="id_tingkatan" >
																<option value="">- Tingkatan -</option>
																<?php while ($tb = $runQueryGetAllDataTingkatanBanten->fetch_assoc()):?>
																	<option value="<?= $tb['id_tingkatan']; ?>"><?= $tb['nama_tingkatan']; ?></option>
																<?php endwhile; ?>
															</select>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group">
															<!-- Stok -->
															<label for="stok_banten" class="form-label">Stok Barang</label>
															<input type="number" class="form-control modal-input" id="stok_banten" value="" name="stok_banten" >
														</div>
													</div>
												</div>
											</div>
											<!-- AKhir konten hapus banten -->
											<!-- Upload foto hanya muncul ketika banten diedit -->
											<div id="modal-edit-etalase">
												<label for="foto_bantenBaru" class="form-label">Upload Foto (JPG 2MB)</label>
												<!-- Upload foto -->
												<div class="form-group">
													<div class="custom-file mt-2">
														<input type="file" class="custom-file-input " name="foto_bantenBaru" id="foto_bantenBaru" value="" >
														<label for="foto_bantenBaru" class="custom-file-label modal-input">Foto barang</label>
													</div>
												</div>
											</div>
											<!-- akhir upload foto -->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary mr-auto tombol" data-dismiss="modal">Kembali</button>
											<div id="alreadyTingkatanBanten">
												<div class="alert alert-danger" role="alert">
													Tingkatan banten sudah ada!
												</div>
											</div>
											<button type="submit" class="btn btn-primary tombol" name="btnAksiEtalase" value="">Tambah</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- Akhir Modal Tambah Informasi Banten dan hapus banten bersangkutan -->

						<?php
						if (isset($_POST['btnAksiEtalase'])) {
							$attrDetail = array();
							$attrDetail['id_banten'] = $_POST['id_bantenSelected'];
							if ($_POST['btnAksiEtalase']=="hapus") {
								$id_banten = $_POST['id_bantenSelected'];
								list($isAnyKesalahan,$pesanKesalahan) = $objBanten->deleteSpecificBanten($id_banten);
								if ($pesanKesalahan=="" && $isAnyKesalahan==false) {
									$objFlash->showSimpleFlash("BERHASIL DIHAPUS","success","Data banten berhasil dihapus!","index.php?page=Etalase",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
								}else{
									$objFlash->showSimpleFlash("GAGAL DIHAPUS","warning",$pesanKesalahan,"index.php?page=Etalase",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
								}
							}else if ($_POST['btnAksiEtalase']=="tambah") {
							//tangkap semua variabel yang dikirim lewat form
								$attrDetail['id_tingkatan'] = $_POST['id_tingkatan'];
								$attrDetail['stok_detail'] = $_POST['stok_banten'];
								$attrDetail['diskon_detail']  = $_POST['diskon_banten'];
								$attrDetail['hargajual_detail'] = $_POST['harga_banten'];
								$runQueryInsertNewDetailBanten = $objDetailBanten->insertNewDetailBanten($attrDetail);
								if ($runQueryInsertNewDetailBanten==true) {
			//berhasil input data baru
									$objFlash->showSimpleFlash("BERHASIL DITAMBAHKAN","success","Informasi berhasil ditambahkan!","index.php?page=Etalase",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
								}else{
			//gagal input data baru
									$objFlash->showSimpleFlash("GAGAL DITAMBAHKAN","warning","Terjadi kesalahan saat menambahkan informasi!","index.php?page=Etalase",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
								}
							}else if ($_POST['btnAksiEtalase']=="edit") {
				//tangkap semua variabel
								$attrDetail['id_kategori'] = $_POST['id_kategoriSelected'];
								$attrDetail['nama_banten'] = $_POST['nama_bantenSelected'];
								$attrDetail['deskripsi_banten'] = $_POST['deskripsi_bantenSelected'];
								$attrDetail['kelengkapan_banten'] = $_POST['kelengkapan_bantenSelected'];
								$attrDetail['foto_bantenLama'] = $_POST['foto_bantenLama'];
								$attrDetail['foto_bantenBaru'] = $_FILES['foto_bantenBaru'];
				//query
								list($pesanKesalahan,$uploadError,$runQueryUpdateDataBantenByIdBanten) = $objBanten->updateDataBantenByIdBanten($attrDetail);
								if (empty($pesanKesalahan) && $uploadError==false && $runQueryUpdateDataBantenByIdBanten == true) {
					//berhasil tidak ada error
									$objFlash->showSimpleFlash("BERHASIL DIPERBARUI","success","Informasi berhasil diperbarui!","index.php?page=Etalase",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");

								}else{
					//ada pesan kesalahan
									$fullErrMsg = $objUtil->arrangeErrorMessage($pesanKesalahan);
									$objFlash->showSimpleFlash("GAGAL DIPERBARUI","warning","$fullErrMsg","index.php?page=Etalase",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Kembali");
								}
							}
						}
						?>