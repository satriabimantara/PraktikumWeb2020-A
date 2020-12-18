<?php  
require_once 'headerdashboard.php';
$getAllDataDetailBanten = $objDetailBanten->getAllDataDetailBanten();
$getAllDataKategoriBanten = $objKategoriBanten->getAllDataKategoriBanten();
$data_kategoribanten = array();
while ($kategoribanten = $getAllDataKategoriBanten->fetch_assoc()){
	array_push($data_kategoribanten, $kategoribanten);
}
?>
<!-- Service Container -->
<div class="container">
	<!-- Row 1 (Kategori Panel)  -->
	<div class="row justify-content-center">
		<div class="col-12 kategori-panel">
			<div class="container-fluid">
				<!-- Carousel -->
				<div id="carouselKategoriBanten" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<!-- Semua Kategori -->
						<div class="carousel-item active">
							<div class="row workingspace mb-5">
								<div class="col-lg-6">
									<img src="../../assets/imgstyle/semuakategori.jpg" alt="Kategori Banten" class=" ">
								</div>       
								<div class="col-lg-6">
									<!-- Headline -->
									<h3><span>Semua Kategori</span></h3>
									<!-- Paragraf -->
									<p>
										Panca Yadnya terdiri dari lima yaitu Dewa Yadnya, Rsi Yadnya, Pitra Yadnya, Manusa Yadnya, dan Bhuta Yadnya. Pelaksanaannya harus dilandasi dengan rasa tulus dan ikhlas.
									</p>
									<!-- Tombol -->
									<a  type="button" class="kategori-choice btn btn-primary tombol" id="Semua Kategori">
										Lihat
									</a>
								</div> 
							</div>
						</div>
						<!-- Akhir Semua Kategori -->
						<!-- Perulangan Setiap Kategori -->
						<?php foreach ($data_kategoribanten as $kategoribanten): ?>
							<div class="carousel-item">
								<div class="row workingspace mb-5">
									<div class="col-lg-6">
										<img src="../../assets/imgstyle/<?= $kategoribanten['gambar_kategori']; ?>" alt="Gambar Kategori Banten" class="">
									</div>       
									<div class="col-lg-6">
										<!-- Headline -->
										<h3>Kategori <span><?= $kategoribanten['nama_kategori']; ?></span></h3>
										<!-- Paragraf -->
										<p>
											<?= $kategoribanten['deskripsi_kategori']; ?>
										</p>
										<!-- Tombol -->
										<a role="button" class="kategori-choice btn btn-primary tombol" id="<?= $kategoribanten['id_kategori']; ?>">
											Lihat
										</a>
									</div> 
								</div>
							</div>
						<?php endforeach ?>
						<!-- Akhir perulangan setiap kategori -->
					</div>
					<a class="carousel-control-prev " href="#carouselKategoriBanten" role="button" data-slide="prev" style="color: black; ">
						<i class="fa fa-chevron-circle-left fa-2x carousel-control-prev-icon" aria-hidden="true"></i>
					</a>
					<a class="carousel-control-next" href="#carouselKategoriBanten" role="button" data-slide="next" style="color: black; padding-left: 4em; ">
						<i class="fa fa-chevron-circle-right fa-2x carousel-control-next-icon" aria-hidden="true"></i>
					</a>
				</div>
				<!-- Akhir Carousel -->
			</div>
		</div>
	</div>
	<!-- Akhir row 1 (Kategori Panel) -->
	<!-- Row 3 (Banten panel) -->
	<div class="row justify-content-center ">
		<div class="col-12 banten-panel">
			<!-- Baris pertama -->
			<div class="row" id="content-daftar-banten">
				<!-- Banten ke-1,2,3,.. perulangan -->
				<!-- konten di load dari jquery -->
				<!-- Akhir banten ke-1,2,3,... -->
			</div>
			<!-- Akhir baris pertama -->
			<!-- Button muat lebih banyak -->
			<div class="row">
				<div class="col-lg">
					<button class="btn item-center tombol btn-success mt-lg-3" type="button" name="btnToTopPage" value="0" id="btnToTopPage">
						<i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Kembali ke atas
					</button>
				</div>
			</div>
			<!-- Akhir button muat lebih banyak -->
		</div>
	</div>
	<!-- Akhir Row 3 (Banten panel) -->
<!-- Akhir Service Container berada di index.php -->