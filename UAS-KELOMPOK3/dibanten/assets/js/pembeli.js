// Jquery Sintaks Ready Document
$(document).ready(function(){
	//Global variabel in home
	var startIndexBanten = 0;
	var working = false;
	var endPage = false;
	var panelKategoriClick = false;
	var kategoriSelected = null;
	var banten_dicari = null;
	function loadContentBantenFromAjax(kategoriSelected,banten_dicari){
		var params_ajax = {
			type: 'GET',
			url: "http://localhost/dibanten/pembeli/content/modals.php?start="+startIndexBanten,
			processData:false,
			data: '',
			datatype:"json",
			success: function(data){
				data = JSON.parse(data);
				if (data.length>0) {
					for (var i = 0; i< data.length ; i++) {
						$.ajax({
							method: 'POST',
							url: "http://localhost/dibanten/pembeli/content/contentbanten.php",
							data: data[i],
							datatype:"json",
							success:function(data2){
								$('#content-daftar-banten').append(data2);
							},
							error:function(data2){
								console.log('Kesalahan saat retrieve data from ajax');
							}
						});
					}
					startIndexBanten+=4;
				}else{
					if (endPage==false) {
						endPage=true;
						$('#content-daftar-banten').append(`
							<div class="container mt-lg-5 ">
							<div class="row">
							<div class="col">
							<div class="alert alert-danger" role="alert">
							<h2 class="alert-heading">Akhir Halaman!</h2>
							<p style="font-size: 20px; ">Anda sudah mencapai akhir halaman. Anda sudah menampilkan seluruh daftar banten yang tersedia. Tidak ada daftar banten yang bisa ditampilkan lagi. </p>
							<hr>
							<p class="mb-0" style="font-size: 20px;">Temukan kebutuhan banten dan sarana upakara disini!</p>
							</div>
							</div>
							</div>
							</div>
							`);
					}
				}
				setTimeout(function(){
					working = false;
				},1000);
			},
			error:function(data){
				console.log('Error : Retrieve data from ajax error');
			}
		}
		if (kategoriSelected!=null && banten_dicari!=null) {
			params_ajax.url = "http://localhost/dibanten/pembeli/content/modals.php?start="+startIndexBanten+"&kategori="+kategoriSelected+"&search="+banten_dicari;
		}else if (kategoriSelected!=null && banten_dicari==null) {
			params_ajax.url = "http://localhost/dibanten/pembeli/content/modals.php?start="+startIndexBanten+"&kategori="+kategoriSelected;
		}else if (kategoriSelected==null && banten_dicari!=null) {
			params_ajax.url = "http://localhost/dibanten/pembeli/content/modals.php?start="+startIndexBanten+"&search="+banten_dicari;
		}else if (kategoriSelected==null && banten_dicari==null) {
			params_ajax.url = "http://localhost/dibanten/pembeli/content/modals.php?start="+startIndexBanten;
		}
		$.ajax(params_ajax);
	}
	loadContentBantenFromAjax(kategoriSelected,banten_dicari);

	// Home index
	$(window).scroll(function(){
		if ($(this).scrollTop() + 1 >= $("body").height() - $(window).height()) {
			if (working==false) {
				working = true;
				loadContentBantenFromAjax(kategoriSelected,banten_dicari);
			}
		}
	})
	// Menangkap banten yang dicari oleh user
	$('#banten_dicari').keydown(function(e){
		if(e.keyCode === 13){
			if ($(this).val() !== "") {
				banten_dicari = $(this).val();
			}
		}  
	});
	$("#btnCariBanten").on("click",function(){
		banten_dicari = $(this).val();
	});
	$('#btnToTopPage').on('click',function(){
		//Membuat scroll bar ke awal page
		$("html, body").animate({ scrollTop: 349 }, "slow");
	});
	
	$('.kategori-choice').on('click',function(){
		$("html, body").animate({ scrollTop: 1000 }, "slow");
		kategoriSelected = $(this).attr('id');
		startIndexBanten = 0;
		endPage = false;
		$('#content-daftar-banten').html('');
		if (kategoriSelected == "Semua Kategori") {
			kategoriSelected = null;
			loadContentBantenFromAjax(kategoriSelected,banten_dicari);
		}else{
			//load konten pertama kali
			loadContentBantenFromAjax(kategoriSelected,banten_dicari);
		}
	});

	// Keranjang
	function convertStringtoNumber(string){
		return parseInt(string,10);
	}
	$('.catatan-pemesanan').keyup(function(){
		//ambil id detail catatan pemesanan banten yang bersangkutan
		let spesificInputCatatanPemesanan = "#"+$(this).attr('id');
		//set input catatan pemesanan toko dengan karakter yang diketiikan user
		$(spesificInputCatatanPemesanan).val($(this).val());
		let catatan_pemesanan = $(spesificInputCatatanPemesanan).val();
		//ambil id_detail banten
		let id_detail = $(this).data('id_detail');
		let id_toko = $(this).data('id_toko');
		let inputCatatanPemesanan = 'true'; //menandai bahwa ada catatan pemesanan untuk iddetail yang bersangkutan
		$.ajax({
			type: 'post',
			url: 'http://localhost/dibanten/pembeli/content/jquerySession.php',
			data: {id_detail : id_detail,id_toko : id_toko,catatan_pemesanan:catatan_pemesanan,inputCatatanPemesanan:inputCatatanPemesanan},
			success: function(data){
				
			}
		});
	});
	$('.btnTambahBantenKeranjang').click(function(e){
		//tangkap id_detail banten
		var id_detail = $(this).data('id_detail');
		//tangkap id_toko
		var id_toko = $(this).data('id_toko');
		var spesificInput = "#"+id_detail;
		var stringInputJumlahBanten = $(spesificInput).val();
		var intInputJumlahBanten = convertStringtoNumber(stringInputJumlahBanten);
		var max_stock = $(spesificInput).attr("max");
		var jumlah_dibeli = intInputJumlahBanten;
		if (jumlah_dibeli<max_stock) {
			jumlah_dibeli = jumlah_dibeli+1;
			var btnAksi = "tambah";
			$(spesificInput).val(jumlah_dibeli);
			$.ajax({
				type: 'post',
				url: 'http://localhost/dibanten/pembeli/content/jquerySession.php',
				data: {id_detail : id_detail,id_toko : id_toko,jumlah_dibeli:jumlah_dibeli,btnAksi:btnAksi},
				// ketika sukses
				success: function(data){
					
				}
			});
		}else{
			//tampilkan alert maximum stock limit di keranjang
			var id_alert = '#alertMaximumStockLimit' + id_detail;
			$(id_alert).show(1000);
		}
	});
	$('.btnKurangBantenKeranjang').on('click',function(){
		//tangkap id_detail banten
		var id_detail = $(this).data('id_detail');
		//sembunyikan alert maximum stock
		var id_alert = '#alertMaximumStockLimit' + id_detail;
		$(id_alert).hide(1000);
		//tangkap id_toko
		var id_toko = $(this).data('id_toko');
		var spesificInput = "#"+id_detail;
		var stringInputJumlahBanten = $(spesificInput).val();
		var intInputJumlahBanten = convertStringtoNumber(stringInputJumlahBanten);
		//jika sudah 1 berarti tidak boleh dikurang lagi karena minimal ketika dia membeli harus 1
		if (intInputJumlahBanten!=1) {
			var jumlah_dibeli = intInputJumlahBanten-1;
			var btnAksi = "kurang";
			$(spesificInput).val(jumlah_dibeli);
			$.ajax({
				type: 'post',
				url: 'http://localhost/dibanten/pembeli/content/jquerySession.php',
				data: {id_detail : id_detail,id_toko : id_toko,jumlah_dibeli:jumlah_dibeli,btnAksi : btnAksi},
				// ketika sukses
				success: function(data){
					
				}
			});
		}
	});
	$('.btnHapusBantenKeranjang').on('click',function(){
		//tangkap id_detail banten
		var id_detail = $(this).data('id_detail');
		//tangkap id_toko
		var id_toko = $(this).data('id_toko');
		var btnAksi = "hapus";
		$.ajax({
			type: 'post',
			url: 'http://localhost/dibanten/pembeli/content/jquerySession.php',
			data: {id_detail : id_detail,id_toko : id_toko,btnAksi : btnAksi},
				// ketika sukses
				success: function(data){
					window.location = "http://localhost/dibanten/pembeli/content/index.php?page=Keranjang";
				}
			});
	});
	// profile
	$('#btn-change-password').on('click',function(){
		$('#titleModal').html("Ganti Password");
		$('#ifChangePasswordClick').css('display','block');
		$('.ifEditClick').css('display','none');
		$("#modalProfilePembeli button[name='btnAksiProfile']").val("Ganti Password");
		// hide alert message selama password lama tidak salah
		$('#ifPasswordFalse').css('display','none');
		$('#ifPasswordNotSame').css('display','none');
		$("#modalProfilePembeli button[name='btnAksiProfile']").attr('type','button');
		$("#modalProfilePembeli button[name='btnAksiProfile']").on('click',function(){
			var isPasswordFalse = $('#ifPasswordFalse').val();
			var password_baru = $('#password_baru').val();
			var	repeat_password_baru = $('#repeat_password_baru').val();
			// cek jika password baru atau repeat password baru null
			if ((password_baru != repeat_password_baru || password_baru == '' || repeat_password_baru == '') && $('#titleModal').val()=="Ganti Password") {
				$('#ifPasswordNotSame').css('display','block');
				$('#ifPasswordNotSame p').html("Masukkan password baru yang sama dua kali!");
				$('#ifPasswordNotSame').val(1);
			}else{
				$('#ifPasswordNotSame').css('display','none');
				$('#ifPasswordNotSame').val(0);
			}
			var isPasswordNotSame = $('#ifPasswordNotSame').val();
			if(isPasswordFalse!=1 && isPasswordNotSame!=1){
				//ubah type button ke submit
				$("#modalProfilePembeli button[name='btnAksiProfile']").attr('type','submit');
			}else{
				if(isPasswordFalse==1){
					$("#modalProfilePembeli button[name='btnAksiProfile']").attr('type','submit');
				}else{
					$("#modalProfilePembeli button[name='btnAksiProfile']").attr('type','button');
				}
			}
		});

	});
	$('#btn-edit-profile').on('click',function(){
		$('#titleModal').html("Edit Profile");
		$('#ifChangePasswordClick').css('display','none');
		$('.ifEditClick').css('display','block');
		$("#modalProfilePembeli button[name='btnAksiProfile']").val("Edit Profile");
		//remove semua required pada form untuk ganti password agar tidak error
		$('#password_lama').removeAttr('required');
		$('#password_baru').removeAttr('required');
		$('#repeat_password_baru').removeAttr('required');
		// hide alert message selama password lama tidak salah
		$('#ifPasswordFalse').css('display','none');
		$('#ifPasswordNotSame').css('display','none');
		$("#modalProfile button[name='btnAksiProfile']").attr('type','submit');
	});

	$('#password_lama').keyup(function(){
		$(this).val($(this).val());
		var id_pembeliProfile = $("#modalProfilePembeli input[name='id_pembeli']").val();
		var password_lamaChecked = $('#password_lama').val();
		//panggil ajax untuk mengecek password lama yang diinputkan dari database
		if (password_lamaChecked!='') {
			$.ajax({
				url: 'http://localhost/dibanten/pembeli/content/modals.php',
				data: {
					password_lamaChecked : password_lamaChecked,
					id_pembeliProfile:
					id_pembeliProfile
				},
				method: 'post',
				datatype : 'json',
				// ketika sukses
				success: function(data){
					if (data == 1) {
						$('#ifPasswordFalse ').css('display','none');
						$('#ifPasswordFalse').val(0);
					}else {
						$('#ifPasswordFalse ').css('display','block');
						$('#ifPasswordFalse p').html("Periksa kembali password lama Anda! Password salah");
						$('#ifPasswordFalse').val(1);
					}
				}
			});
		}else{
			$('#ifPasswordFalse').css('display','block');
			$('#ifPasswordFalse p').html("Masukkan password lama Anda yang sesuai!");
			$('#ifPasswordFalse').val(1);
		}
	});
	$('#password_baru').keyup(function(){
		$(this).val($(this).val());
	});
	$('#repeat_password_baru').keyup(function(){
		$(this).val($(this).val());
	});
	$('#show-password-lama').on('click',function(){
		$('#password_lama').attr('type','text');
	});
	$('#show-password-baru').on('click',function(){
		$('#password_baru').attr('type','text');
	});
	$('#show-password-baru-repeat').on('click',function(){
		$('#repeat_password_baru').attr('type','text');
	});

	$('#hide-password-lama').on('click',function(){
		$('#password_lama').attr('type','password');
	});
	$('#hide-password-baru').on('click',function(){
		$('#password_baru').attr('type','password');
	});
	$('#hide-password-baru-repeat').on('click',function(){
		$('#repeat_password_baru').attr('type','password');
	});
	//checkout
	$('.btn-select-ongkir').on('click',function(){
		$('.first-select').css('display','none');
	});

	$('button[name="btnCheckout"]').on('click',function(){
		let id_tokoSelected = $(this).data('idtoko');
		$(this).val(id_tokoSelected);
	})
	//nota
	$('a[name="btnPembayaran"]').on('click',function(){
		let id_pembelian = $(this).data('idpembelian');
		let nama_bank = $(this).data("bank");
		let totalpembayaran = $(this).data('totalpembayaran');
		//set konten alert
		$("#alertKonfirmasiPembayaran").html(`Total tagihan Anda : <strong>Rp.`+totalpembayaran+
			`</strong>`);
		//set input hidden value untuk id_pembelian yang akan dibayarkan
		$('#idpembelian_dibayar').val(id_pembelian);
	});
	$(".btn-pesananditerima").on("click",function(){
		let id_pembelian = $(this).data("idpembelian");
		let btn_pesananditerima = true;
		let id_toko = 0;
		var src_fototoko = "../../assets/imgtoko/";
		//kosongkan modal body
		$("#penilaian-bannertoko").html('');
		$("#penilaian-ratingtoko").html('');
		$("#penilaian-banten").html('');
		// Load data pembelian menggunakan ajax
		$.ajax({
			url: 'http://localhost/dibanten/pembeli/content/modals.php',
			data: {
				id_pembelian : id_pembelian,
				btn_pesananditerima:
				btn_pesananditerima
			},
			method: 'post',
			datatype : 'json',
			success: function(data){
				var all_pembelian = JSON.parse(data);
				var key;
				for(key in all_pembelian){
					pembelian = all_pembelian[key];
					id_toko = pembelian.id_toko;
					var id_banten = pembelian.id_banten;
					var nama_banten = pembelian.nama_banten;
					var nama_toko = pembelian.nama_toko;
					var foto_toko = pembelian.foto_toko;
					var id_detailbanten = pembelian.id_detail;
					if (pembelian.catatanpemesanan_dp=="") {
						pembelian.catatanpemesanan_dp = "Tidak ada catatan";
					}
					$("#penilaian-banten").append(`
						<div class="row mb-3 mx-auto">
						<div class="col">
						<div class="card h-100" >
						<div class="card-body">
						<h5 class="card-title">Banten Pengulap</h5>
						<p class="card-text"><strong>Kelengkapan</strong> : ${pembelian.kelengkapan_banten}</p>

						<p class="card-text"><strong>Catatan</strong> : ${pembelian.catatanpemesanan_dp}</p>
						<p class="card-text"><strong>Resi </strong>: ${pembelian.resipengiriman_pembelian}</p>
						<p class="card-text"><strong>Tanggal Beli </strong>: ${pembelian.tanggalbeli_pembelian}</p>
						<p class="card-text"><strong>Harga </strong>: Rp. ${pembelian.hargadiskon_dp}</p>
						</div>
						</div>
						</div>
						</div>
						`);
					console.log(pembelian);
				}
				src_fototoko = src_fototoko + foto_toko;
				$("#penilaian-bannertoko").append(`
					<input type="hidden" name="id_toko" value="${id_toko}" id="id_toko">
					<img src="${src_fototoko}" alt="" class="img-responsive" width = '500'>
					<h5 class="mt-4 mx-auto">${nama_toko}</h5>
					`);
				$("#penilaian-ratingtoko").append(`
					<input type="hidden" name="id_pembelian" value="${id_pembelian}" id="id_pembelian">
					<div class="form-row mx-auto">
					<div class="col-10">
					<label for="input_ratingtoko">Rating Toko</label>
					<input type="range" class="custom-range " id="input_ratingtoko" min="0" max="5" step="0.1" width="100" name="input_ratingtoko" value="">
					</div>
					<div class="col">
					<div class="alert alert-light" role="alert">
					<h3 id="value_ratingtoko">2.5</h3>
					</div>
					</div>
					</div>
					`);
				$("#input_ratingtoko").on('change',function(){
					$("#value_ratingtoko").html($(this).val());
				});
			},
			error: function(data){
				alert("Error Ajax Request!");
			}
		});
	});
	
	//riwayat belanja
	$('a[name="btnLihatPembayaran"]').on('click',function(){
		//ambil id_pembelian struk
		let id_pembelian = $(this).data('idpembelian');
		//munculkankonten lihat pembayaran
		let nama_div = "#collapseLihatPembayaran"+id_pembelian;
		$(nama_div).toggle(1200);
	});

});