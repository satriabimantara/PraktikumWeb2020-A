<?php
include('includes/config.php');
$vehicletitle	= $_POST['vehicletitle'];
$sql 	= "INSERT INTO bank (nama_bank) VALUES ('$vehicletitle')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'bank.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahbank.php'; 
		</script>";

}
?>