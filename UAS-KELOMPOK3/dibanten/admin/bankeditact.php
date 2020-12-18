<?php
include('includes/config.php');
$vehicletitle=$_POST['vehicletitle'];
$id 	= $_POST['id'];
$sql 	= "UPDATE bank SET nama_bank='$vehicletitle' WHERE id_bank='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'bank.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'bankedit.php?id=$id'; 
		</script>";

}
?>