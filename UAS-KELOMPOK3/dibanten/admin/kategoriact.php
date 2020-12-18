<?php
include('includes/config.php');
$vehicletitle	= $_POST['vehicletitle'];
$vehicalorcview	= $_POST['vehicalorcview'];
$sql 	= "INSERT INTO kategoribanten (nama_kategori,deskripsi_kategori) VALUES ('$vehicletitle','$vehicalorcview')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'kategori.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahkategori.php'; 
		</script>";

}
?>