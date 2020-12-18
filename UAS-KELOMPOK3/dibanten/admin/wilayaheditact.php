<?php
include('includes/config.php');
$vehicletitle=$_POST['vehicletitle'];
$id 	= $_POST['id'];
$sql 	= "UPDATE wilayah SET kota_wilayah='$vehicletitle' WHERE id_wilayah='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'wilayah.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'wilayahedit.php?id=$id'; 
		</script>";

}
?>