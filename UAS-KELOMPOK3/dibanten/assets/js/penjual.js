// Struktur Dasar Jquery

$(document).ready(function(){
	// 1. Ketika button modal edit tarif ongkir ditekan
	$('.tampilModalUbah').on('click',function(){
		$('#judulModal').html('Edit Tarif Pengiriman');
		$('#modalWilayahPengiriman button[type=submit]').html('Edit');
		$('#modalWilayahPengiriman button[type=submit]').removeClass('btn-primary');
		$('#modalWilayahPengiriman button[type=submit]').removeClass('btn-danger');
		$('#modalWilayahPengiriman button[type=submit]').addClass('btn-warning');
		var aksi = "edit";
		$("#modalWilayahPengiriman button[name='btnAksi']").val(aksi);
		// Tangkap isi data-id dari tag button edit yang sudah dibuat di html bagian edit ongkir
		var id_ongkirSelected = $(this).data('id');
		/*
			METODE MENGAMBIL DATA LIVE SEARCH DENGAN AJAX
		-------
			var xhr = new XMLHttpRequest();
			//cek kesiapan ajax
			xhr.onreadystatechange = function(){
				if (xhr.readyState ==4 && xhr.status==200) {
					content.innerHTML = xhr.responseText;
				}
			}
			//eksekusi ajax
			// xhr.open('GET','http://localhost/dibanten/penjual/content/index.php?page=Modals'+ id_ongkirSelected,true);
			// kirim request
			xhr.send();

			*/

			$.ajax({
				url: 'http://localhost/dibanten/penjual/content/modals.php',
				data: {id_ongkirSelected : id_ongkirSelected},
				method: 'post',
				datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var ongkir = jQuery.parseJSON(data);
				$('#provinsi_wilayah').val(ongkir.provinsi_wilayah);
				$('#id_wilayah').val(ongkir.id_wilayah);
				$('#id_wilayahLama').val(ongkir.id_wilayah);
				$('#harga_ongkir').val(ongkir.harga_ongkir);
				$('#id_wilayah').removeAttr('disabled');
				$('#harga_ongkir').removeAttr('readonly');
			}

		});
		// setting value input id-ongkir hidden
		$('#id_ongkir').val(id_ongkirSelected);
	});
	// 2. Ketika button modal tambah ongkir ditekan
	$('.tampilModalTambah').on('click',function(){
		$('#judulModal').html('Tambah Tarif Pengiriman');
		$('#modalWilayahPengiriman button[type=submit]').html('Tambah');
		$('#modalWilayahPengiriman button[type=submit]').removeClass('btn-warning');
		$('#modalWilayahPengiriman button[type=submit]').removeClass('btn-danger');
		$('#modalWilayahPengiriman button[type=submit]').addClass('btn-primary');
		var aksi = "tambah";
		$("#modalWilayahPengiriman button[name='btnAksi']").val(aksi);
		// reset kembali value nya ke awal karena jika user menekan tombol edit maka valuenya berubah karna ajax
		$('#provinsi_wilayah').val("Bali");
		$('#id_wilayah').val(null);
		$('#harga_ongkir').val(null);
		$('#id_wilayahLama').val(null);
		$('#id_ongkir').val(null);
		$('#id_wilayah').removeAttr('disabled');
		$('#harga_ongkir').removeAttr('readonly');

	});
	// 3. Ketika button modal hapus ongkir ditekan
	$('.tampilModalHapus').on('click',function(){
		$('#judulModal').html('Hapus Tarif Pengiriman');
		$('#modalWilayahPengiriman button[type=submit]').html('Hapus');
		$('#modalWilayahPengiriman button[type=submit]').removeClass('btn-warning');
		$('#modalWilayahPengiriman button[type=submit]').removeClass('btn-primary');
		$('#modalWilayahPengiriman button[type=submit]').addClass('btn-danger');
		var aksi = "hapus";
		$("#modalWilayahPengiriman button[name='btnAksi']").val(aksi);
		var id_ongkirSelected = $(this).data('id');
		$.ajax({
			url: 'http://localhost/dibanten/penjual/content/modals.php',
			data: {
				id_ongkirSelected : id_ongkirSelected
			},
			method: 'post',
			datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var ongkir = jQuery.parseJSON(data);
				$('#provinsi_wilayah').val(ongkir.provinsi_wilayah);
				$('#id_wilayah').val(ongkir.id_wilayah);
				$('#id_wilayahLama').val(ongkir.id_wilayah);
				$('#harga_ongkir').val(ongkir.harga_ongkir);
				$('#id_wilayah').attr('disabled','true');
				$('#harga_ongkir').attr('readonly','true');
			}

		});
		// setting value input id-ongkir hidden
		$('#id_ongkir').val(id_ongkirSelected);
	});
	//4. Profile
	$('#btn-change-password').on('click',function(){
		$('#titleModal').html("Ganti Password");
		$('#ifChangePasswordClick').css("display","block");
		$('.ifEditClick').css("display","none");
		$("#modalProfile button[name='btnAksiProfile']").val("Ganti Password");
		// hide alert message selama password lama tidak salah
		$('.ifPasswordFalse').css('display','none');
		$('.ifPasswordNotSame').css('display','none');
		$("#modalProfile button[name='btnAksiProfile']").attr('type','button');
		$("#modalProfile button[name='btnAksiProfile']").on('click',function(){
			var isPasswordFalse = $('.ifPasswordFalse').val();
			var password_baru = $('#password_baru').val();
			var	repeat_password_baru = $('#repeat_password_baru').val();
			// cek jika password baru atau repeat password baru null
			if ((password_baru != repeat_password_baru || password_baru == '' || repeat_password_baru == '') && $('#titleModal').val()=="Ganti Password") {
				$('.ifPasswordNotSame').css('display','block');
				$('.ifPasswordNotSame p').html("Masukkan password baru yang sama dua kali!");
				$('.ifPasswordNotSame').val(1);
			}else{
				$('.ifPasswordNotSame').css('display','none');
				$('.ifPasswordNotSame').val(0);
			}
			var isPasswordNotSame = $('.ifPasswordNotSame').val();
			if(isPasswordFalse!=1 && isPasswordNotSame!=1){
				//ubah type button ke submit
				$("#modalProfile button[name='btnAksiProfile']").attr('type','submit');
			}else{
				if(isPasswordFalse==1){
					$("#modalProfile button[name='btnAksiProfile']").attr('type','submit');
				}else{
					$("#modalProfile button[name='btnAksiProfile']").attr('type','button');
				}
			}
		});
	});
	$('#btn-edit-profile').on('click',function(){
		$('#titleModal').html("Edit Profile");
		$('.ifEditClick').css("display","block");
		$('#ifChangePasswordClick').css("display","none");
		$("#modalProfile button[name='btnAksiProfile']").val("Edit Profile");
		$("#modalProfile button[name='btnAksiProfile']").attr('type','submit');
		$('.ifPasswordNotSame').css('display','none');
		$('.ifPasswordFalse').css('display','none');
		//remove semua required pada form untuk ganti password agar tidak error
		if ($('.ifPasswordNotSame').val()==1) {
			$('.ifPasswordNotSame').css('display','none');
				$('.ifPasswordNotSame').val(0);
				console.log("Benar");
		}
		$('#password_lama').removeAttr('required');
		$('#password_baru').removeAttr('required');
		$('#repeat_password_baru').removeAttr('required');
	});
	// Event untuk mengisi nilai ketika input password mulai diketikkan
	$('#password_lama').keyup(function(){
		$(this).val($(this).val());
		var id_penjualProfile = $("#modalProfile input[name='id_penjual']").val();
		var password_lamaChecked = $('#password_lama').val();
		//panggil ajax untuk mengecek password lama yang diinputkan dari database
		if (password_lamaChecked!='') {
			$.ajax({
				url: 'http://localhost/dibanten/penjual/content/modals.php',
				data: {
					password_lamaChecked : password_lamaChecked,
					id_penjualProfile:
					id_penjualProfile
				},
				method: 'post',
				datatype : 'json',
				// ketika sukses
				success: function(data){
					if (data == 1) {
						$('.ifPasswordFalse ').css('display','none');
						$('.ifPasswordFalse').val(0);
					}else {
						$('.ifPasswordFalse ').css('display','block');
						$('.ifPasswordFalse p').html("Periksa kembali password lama Anda! Password salah");
						$('.ifPasswordFalse').val(1);
					}
				}
			});
		}else{
			$('.ifPasswordFalse').css('display','block');
			$('.ifPasswordFalse p').html("Masukkan password lama Anda yang sesuai!");
			$('.ifPasswordFalse').val(1);
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
	//5. Etalase banten 
	$('.close-etalase').on('click',function(){
		$('.etalase-target-select').val('');
	});
	$(".etalase-target-select").change(function(){
		var	id_bantenChoosed = $("#id_bantenSelected").val();
		var id_tingkatanChoosed = $(this).val();
		// cek jika id_tingkatan tidak null maka jalankan ajax
		if (id_tingkatanChoosed == '') {
			//tampilkan button tambah infomrasi dan hide alert divnya
			$('#alreadyTingkatanBanten').css('display','none');
			// hide button tambah
			$("#modalInformasiBanten button[name='btnAksiEtalase']").css('display','block');
		}else{
			// jalankan ajax
			$.ajax({
				url: 'http://localhost/dibanten/penjual/content/modals.php',
				data: {
					id_tingkatanChoosed : id_tingkatanChoosed,
					id_bantenChoosed : id_bantenChoosed
				},
				method: 'post',
				datatype : 'json',
				// ketika sukses
				success: function(data){
					//parsing json biar bisa dipake kyk r.id_wilayah
					if (data!=0) {
						//tampilkan alert div
						$('#alreadyTingkatanBanten').css('display','block');
						// hide button tambah
						$("#modalInformasiBanten button[name='btnAksiEtalase']").css('display','none');
					}else{
						$("#modalInformasiBanten button[name='btnAksiEtalase']").css('display','block');
						$('#alreadyTingkatanBanten').css('display','none');
					}
				}
			});
		}
	})
	$('.tampilModalHapusInformasiBanten').on('click',function(){
		$('#alreadyTingkatanBanten').css('display','none');
		$("#modalInformasiBanten button[name='btnAksiEtalase']").css('display','block');
		$('#modalInformasiBantenLabel').html('Hapus Banten');
		$('#modalInformasiBanten .modal-footer button[type=submit]').removeClass('btn-primary');
		$('#modalInformasiBanten .modal-footer button[type=submit]').removeClass('btn-warning');
		$('#modalInformasiBanten .modal-footer button[type=submit]').addClass('btn-danger');
		$('#modalInformasiBanten .modal-footer button[type=submit]').html('Hapus');
		var aksi = "hapus";
		$("#modalInformasiBanten button[name='btnAksiEtalase']").val(aksi);
		var id_bantenSelected = $(this).data('id');
		$.ajax({
			url: 'http://localhost/dibanten/penjual/content/modals.php',
			data: {
				id_bantenSelected : id_bantenSelected
			},
			method: 'post',
			datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var banten = jQuery.parseJSON(data);
				var location_foto = "../../assets/imgbanten/";
				var nama_foto = banten.foto_banten;
				var src = location_foto.concat(nama_foto);
				$("#foto_bantenSelected").attr("src",src);
				$('#id_bantenSelected').val(id_bantenSelected);
				$('#nama_bantenSelected').val(banten.nama_banten);
				$('#id_kategoriSelected').val(banten.id_kategori);
				$('#deskripsi_bantenSelected').val(banten.deskripsi_banten);
				$('#kelengkapan_bantenSelected').val(banten.kelengkapan_banten);
			}
		});
		$('.small-modal-etalase').css('display','none');
		$("#modalInformasiBanten button[name='btnAksiEtalase']").val(aksi);
		$('#modal-tambah-etalase').css('display','none');
		$('#modal-edit-etalase').css('display','none');
		//tambahkan readonly
		$('#nama_bantenSelected').attr("readonly","true");
		$('#deskripsi_bantenSelected').attr("readonly","true");
		$('#kelengkapan_bantenSelected').attr("readonly","true");
		// hilangkan required 
		$('#harga_banten').removeAttr('required');
		$('#diskon_banten').removeAttr('required');
		$('#id_tingkatan').removeAttr('required');
		$('#stok_banten').removeAttr('required');
		//disable kategori banten
		$("#id_kategoriSelected").attr("disabled",'true');
	});

	$('.tampilModalTambahInformasiBanten').on('click',function(){
		$('#alreadyTingkatanBanten').css('display','none');
		$("#modalInformasiBanten button[name='btnAksiEtalase']").css('display','block');
		$('#modalInformasiBantenLabel').html('Tambah Informasi Banten');
		$('#modalInformasiBanten .modal-footer button[type=submit]').removeClass('btn-danger');
		$('#modalInformasiBanten .modal-footer button[type=submit]').removeClass('btn-warning');
		$('#modalInformasiBanten .modal-footer button[type=submit]').addClass('btn-primary');
		$('#modalInformasiBanten .modal-footer button[type=submit]').html('Lengkapi');
		var aksi = "tambah";
		$("#modalInformasiBanten button[name='btnAksiEtalase']").val(aksi);
		var id_bantenSelected = $(this).data('id');
		$.ajax({
			url: 'http://localhost/dibanten/penjual/content/modals.php',
			data: {
				id_bantenSelected : id_bantenSelected
			},
			method: 'post',
			datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var banten = jQuery.parseJSON(data);
				var location_foto = "../../assets/imgbanten/";
				var nama_foto = banten.foto_banten;
				var src = location_foto.concat(nama_foto);
				$("#foto_bantenSelected").attr("src",src);
				$('#id_bantenSelected').val(id_bantenSelected);
				$('#nama_bantenSelected').val(banten.nama_banten);
				$('#id_kategoriSelected').val(banten.id_kategori);
				$('#deskripsi_bantenSelected').val(banten.deskripsi_banten);
				$('#kelengkapan_bantenSelected').val(banten.kelengkapan_banten);
			}
		});
		$('.small-modal-etalase').css('display','none');
		$('#diskon_bantenDescribe').css('display','block');
		$('#modal-tambah-etalase').css('display','block');
		$('#modal-edit-etalase').css('display','none');
		//tambahkan readonly
		$('#nama_bantenSelected').attr("readonly","true");
		$('#deskripsi_bantenSelected').attr("readonly","true");
		$('#kelengkapan_bantenSelected').attr("readonly","true");
		// tambahkan required 
		$('#harga_banten').attr('required',"true");
		$('#diskon_banten').attr('required',"true");
		$('#id_tingkatan').attr('required',"true");
		$('#stok_banten').attr('required',"true");
		//disable kategori banten
		$("#id_kategoriSelected").attr("disabled",'true');
	});

	$('.tampilModalEditInformasiBanten').on('click',function(){
		$('#alreadyTingkatanBanten').css('display','none');
		$("#modalInformasiBanten button[name='btnAksiEtalase']").css('display','block');
		$('#modalInformasiBantenLabel').html('Edit Informasi Banten');
		$('#modalInformasiBanten .modal-footer button[type=submit]').removeClass('btn-danger');
		$('#modalInformasiBanten .modal-footer button[type=submit]').removeClass('btn-primary');
		$('#modalInformasiBanten .modal-footer button[type=submit]').addClass('btn-warning');
		$('#modalInformasiBanten .modal-footer button[type=submit]').html('Edit');
		var aksi = "edit";
		$("#modalInformasiBanten button[name='btnAksiEtalase']").val(aksi);
		var id_bantenSelected = $(this).data('id');
		$.ajax({
			url: 'http://localhost/dibanten/penjual/content/modals.php',
			data: {
				id_bantenSelected : id_bantenSelected
			},
			method: 'post',
			datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var banten = jQuery.parseJSON(data);
				var location_foto = "../../assets/imgbanten/";
				var nama_foto = banten.foto_banten;
				var src = location_foto.concat(nama_foto);
				$("#foto_bantenSelected").attr("src",src);
				$('#id_bantenSelected').val(id_bantenSelected);
				$('#nama_bantenSelected').val(banten.nama_banten);
				$('#id_kategoriSelected').val(banten.id_kategori);
				$('#deskripsi_bantenSelected').val(banten.deskripsi_banten);
				$('#kelengkapan_bantenSelected').val(banten.kelengkapan_banten);
				$('#foto_bantenLama').val(banten.foto_banten);
			}
		});
		$('.small-modal-etalase').css('display','block');
		$('#diskon_bantenDescribe').css('display','block');
		$('#modal-tambah-etalase').css('display','none');
		$('#modal-edit-etalase').css('display','block');
		// hilangkan required 
		$('#harga_banten').removeAttr('required');
		$('#diskon_banten').removeAttr('required');
		$('#id_tingkatan').removeAttr('required');
		$('#stok_banten').removeAttr('required');
		//remove readonly
		$('#nama_bantenSelected').removeAttr("readonly");
		$('#deskripsi_bantenSelected').removeAttr("readonly");
		$('#kelengkapan_bantenSelected').removeAttr("readonly");
		//disable kategori banten
		$("#id_kategoriSelected").removeAttr('disabled');

	});

	//6. Detail banten 
	$('.tampilModalEditDetailInformasiBanten').on('click',function(){
		$('#modalDetailBantenLabel').html('Edit Barang');
		$('#modalDetailBanten .modal-footer button[type=submit]').removeClass('btn-danger');
		$('#modalDetailBanten .modal-footer button[type=submit]').addClass('btn-warning');
		$('#modalDetailBanten .modal-footer button[type=submit]').html('Edit');
		var aksi = "edit";
		$("#modalDetailBanten button[name='btnAksiDetail']").val(aksi);
		var id_detailSelected = $(this).data('id');
		$.ajax({
			url: 'http://localhost/dibanten/penjual/content/modals.php',
			data: {
				id_detailSelected : id_detailSelected
			},
			method: 'post',
			datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var detail = jQuery.parseJSON(data);
				var location_foto = "../../assets/imgbanten/";
				var nama_foto = detail.foto_banten;
				var src = location_foto.concat(nama_foto);
				$("#foto_bantenDetail").attr("src",src);
				$("#id_detailSelected").val(id_detailSelected);
				$("#nama_bantenDetail").val(detail.nama_banten);
				$("#nama_tingkatanDetail").val(detail.nama_tingkatan);
				$("#stok_detail").val(detail.stok_detail);
				$("#diskon_detail").val(detail.diskon_detail);
				$("#hargajual_detail").val(detail.hargajual_detail);
			}
		});
		$("#nama_bantenDetail").attr("readonly","true");
		$("#nama_tingkatanDetail").attr("readonly","true");
		$("#stok_detail").removeAttr("readonly");
		$("#diskon_detail").removeAttr("readonly");
		$("#hargajual_detail").removeAttr("readonly");
	});

	$('.tampilModalHapusDetailInformasiBanten').on('click',function(){
		$('#modalDetailBantenLabel').html('Hapus Barang');
		$('#modalDetailBanten .modal-footer button[type=submit]').removeClass('btn-warning');
		$('#modalDetailBanten .modal-footer button[type=submit]').addClass('btn-danger');
		$('#modalDetailBanten .modal-footer button[type=submit]').html('Hapus');
		var aksi = "hapus";
		$("#modalDetailBanten button[name='btnAksiDetail']").val(aksi);
		var id_detailSelected = $(this).data('id');
		$.ajax({
			url: 'http://localhost/dibanten/penjual/content/modals.php',
			data: {
				id_detailSelected : id_detailSelected
			},
			method: 'post',
			datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var detail = jQuery.parseJSON(data);
				var location_foto = "../../assets/imgbanten/";
				var nama_foto = detail.foto_banten;
				var src = location_foto.concat(nama_foto);
				$("#foto_bantenDetail").attr("src",src);
				$("#id_detailSelected").val(id_detailSelected);
				$("#nama_bantenDetail").val(detail.nama_banten);
				$("#nama_tingkatanDetail").val(detail.nama_tingkatan);
				$("#stok_detail").val(detail.stok_detail);
				$("#diskon_detail").val(detail.diskon_detail);
				$("#hargajual_detail").val(detail.hargajual_detail);
			}
		});
		$("#nama_bantenDetail").attr("readonly","true");
		$("#nama_tingkatanDetail").attr("readonly","true");
		$("#stok_detail").attr("readonly","true");
		$("#diskon_detail").attr("readonly","true");
		$("#hargajual_detail").attr("readonly","true");
	});
	//Index / Home
	$('a[name="btnNotifikasiPesanan"]').on('click',function(){
		//scrolling ke bawah ke pesanan yang masuk
		$("html, body").animate({ scrollTop: 1065 }, "slow");
	});
	
	$('button[name="btnToTopPage"]').on('click',function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
	});
	function modalPropertiesPesanan(prop){
		//hide modal body 
		for(var i = 0 ;i <prop.hide_modalbody.selector.length;i++){
			let selector = prop.hide_modalbody.selector[i];
			$(selector).css("display","none");
		}
		//show modal body
		for(var i = 0 ;i <prop.show_modalbody.selector.length;i++){
			let selector = prop.show_modalbody.selector[i];
			$(selector).css("display","block");
		}
		//ganti modal properties
		$(prop.modal.title.selector).html(prop.modal.title.html);
		$(prop.modal.footer.selector).html(prop.modal.footer.html);
		$(prop.modal.footer.selector).val(prop.modal.footer.value);
		//remove class and add class using for loop
		for(var i = 0 ;i <prop.removeClass.selector.length;i++){
			let selector = prop.removeClass.selector[i];
			let value = prop.removeClass.value[i];
			$(selector).removeClass(value);
		}
		for(var i = 0 ;i <prop.addClass.selector.length;i++){
			let selector = prop.addClass.selector[i];
			let value = prop.addClass.value[i];
			$(selector).addClass(value);
		}
		//removeRequired input if true
		for(var i = 0 ;i <prop.removeRequired.selector.length;i++){
			let selector = prop.removeRequired.selector[i];
			let value = prop.removeRequired.value[i];
			if (value==true) {
				$(selector).removeAttr("required");
			}
		}
	}

	$('a[name = "btnEditPembelianPembeli"]').on('click',function(){
		$("#idpembelian_dibayar").val($(this).data('idpembelian'));
		let modal_prop = {
			hide_modalbody :{
				selector : ["#modal-body-konfirmasipembayaranpenjual","#modal-body-konfirmasipesanan","#modal-body-tolakpesanan"]
			},
			show_modalbody : {
				selector : ["#modal-body-editpembelian"]
			},
			removeClass : {
				selector : ['.modal-footer button[type="submit"]'],
				value : ["btn-success"]
			},
			addClass : {
				selector : ['.modal-footer button[type="submit"]'],
				value : ["btn-warning"]
			},
			modal : {
				title : {
					selector : "#modalLihatPembayaranPembeliLabel",
					html : "Update Pesanan"
				},
				footer : {
					selector : '.modal-footer button[type="submit"]',
					html : '<i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Update',
					value : "edit_pesanan"
				}
			},
			removeRequired : {
				selector : ["#catatanpenolakan_pembelian","#resipengiriman_pembelian"],
				value : [true,true]
			}
		}
		modalPropertiesPesanan(modal_prop);
	});
	$('a[name = "btnTolakPesanan"]').on('click',function(){
		$("#idpembelian_dibayar").val($(this).data('idpembelian'));
		let modal_prop = {
			hide_modalbody :{
				selector : ["#modal-body-konfirmasipembayaranpenjual","#modal-body-konfirmasipesanan","#modal-body-editpembelian"]
			},
			show_modalbody : {
				selector : ["#modal-body-tolakpesanan"]
			},
			removeClass : {
				selector : ['.modal-footer button[type="submit"]','.modal-footer button[type="submit"]'],
				value : ["btn-success","btn-warning"]
			},
			addClass : {
				selector : ['.modal-footer button[type="submit"]'],
				value : ["btn-danger"]
			},
			modal : {
				title : {
					selector : "#modalLihatPembayaranPembeliLabel",
					html : "Tolak Pesanan"
				},
				footer : {
					selector : '.modal-footer button[type="submit"]',
					html : '<i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Tolak',
					value : "tolak_pesanan"
				}
			},
			removeRequired : {
				selector : ["#nama_status","#resipengiriman_pembelian"],
				value : [true,true]
			}
		}
		modalPropertiesPesanan(modal_prop);
	});
	$('a[name = "btnKonfirmasiPesananPembeli"]').on('click',function(){
		$("#idpembelian_dibayar").val($(this).data('idpembelian'));
		let modal_prop = {
			hide_modalbody :{
				selector : ["#modal-body-konfirmasipembayaranpenjual","#modal-body-editpembelian","#modal-body-tolakpesanan"]
			},
			show_modalbody : {
				selector : ["#modal-body-konfirmasipesanan"]
			},
			removeClass : {
				selector : ['.modal-footer button[type="submit"]'],
				value : ["btn-warning"]
			},
			addClass : {
				selector : ['.modal-footer button[type="submit"]'],
				value : ["btn-success"]
			},
			modal : {
				title : {
					selector : "#modalLihatPembayaranPembeliLabel",
					html : "Konfirmasi Pesanan"
				},
				footer : {
					selector : '.modal-footer button[type="submit"]',
					html : '<i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Konfirmasi Pesanan',
					value : "konfirmasi_pesanan"
				}
			},
			removeRequired : {
				selector : ["#catatanpenolakan_pembelian","#nama_status","#resipengiriman_pembelian"],
				value : [true,true,true]
			}
		}
		modalPropertiesPesanan(modal_prop);
	});

	$('a[name = "btnKonfirmasiPembayaranPembeli"]').on('click',function(){
		//ambil id_pembeliannya
		$("#idpembelian_dibayar").val($(this).data('idpembelian'));
		let modal_prop = {
			hide_modalbody :{
				selector : ["#modal-body-konfirmasipesanan","#modal-body-editpembelian","#modal-body-tolakpesanan"]
			},
			show_modalbody : {
				selector : ["#modal-body-konfirmasipembayaranpenjual"]
			},
			removeClass : {
				selector : ['.modal-footer button[type="submit"]'],
				value : ["btn-warning"]
			},
			addClass : {
				selector : ['.modal-footer button[type="submit"]'],
				value : ["btn-success"]
			},
			modal : {
				title : {
					selector : "#modalLihatPembayaranPembeliLabel",
					html : "Konfirmasi Pembayaran"
				},
				footer : {
					selector : '.modal-footer button[type="submit"]',
					html : '<i class="fa fa-check" aria-hidden="true"></i>&nbsp; Konfirmasi Pembayaran',
					value : "konfirmasi_pembayaran"
				}
			},
			removeRequired : {
				selector : ["#catatanpenolakan_pembelian","#resipengiriman_pembelian","#nama_status"],
				value : [true,true,true]
			}
		}
		modalPropertiesPesanan(modal_prop);
		var id_pembelian = $(this).data('idpembelian');
		var btnKonfirmasiPembayaranPembeli = true;
		//lakukan query ajax untuk mendapatkan data pembayaran
		$.ajax({
			url: 'http://localhost/dibanten/penjual/content/modals.php',
			data: {
				id_pembelian : id_pembelian,
				btnKonfirmasiPembayaranPembeli:btnKonfirmasiPembayaranPembeli
			},
			method: 'post',
			datatype : 'json',
			// ketika sukses
			success: function(data){
				//parsing json biar bisa dipake kyk r.id_wilayah
				var pembayaran = jQuery.parseJSON(data);
				pembayaran = pembayaran[0];
				var location_foto = "../../assets/imgbuktipembayaran/";
				var buktitransfer_pembayaran = pembayaran.buktitransfer_pembayaran;
				var src = location_foto.concat(buktitransfer_pembayaran);
				$("#buktitransfer_pembayaran").attr("src",src);
				$("a[name='btnUnduhBuktiTransfer']").attr("href",src);
				$("a[name='btnUnduhBuktiTransfer']").attr("download","Bukti Transfer Pembayaran");
				$("#namapembayar_pembayaran").val(pembayaran.namapembayar_pembayaran);
				$("#bank_pembayaran").val(pembayaran.bank_pembayaran);
				$("#nomorrekening_pembayaran").val(pembayaran.nomorrekening_pembayaran);
				$("#tanggalkonfirmasi_pembayaran").val(pembayaran.tanggalkonfirmasi_pembelian);
				$("#totalharga_pembayaran").val("Rp. "+ new Intl.NumberFormat().format(pembayaran.totalharga_pembelian));
			}
		});
	});
	$("#nama_status").on("change",function(){
		let nama_status = $("#nama_status option:selected").text();
		if (nama_status == "Barang Dikirim") {
			$("#input_nomorresi").collapse("show");
			$("#resipengiriman_pembelian").attr("required", true);
		} else{
			$("#input_nomorresi").collapse("hide");
			$("#resipengiriman_pembelian").removeAttr("required");
		}
	});

})

