<?php
include('includes/config.php');
$vehicletitle	= $_POST['vehicletitle'];
$sql 	= "INSERT INTO jasa (nama_jasa) VALUES ('$vehicletitle')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'jasa.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahjasa.php'; 
		</script>";

}
?>