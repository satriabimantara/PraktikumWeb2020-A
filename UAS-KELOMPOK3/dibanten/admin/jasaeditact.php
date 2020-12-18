<?php
include('includes/config.php');
$vehicletitle=$_POST['vehicletitle'];
$id 	= $_POST['id'];
$sql 	= "UPDATE jasa SET nama_jasa='$vehicletitle' WHERE id_jasa='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'jasa.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'jasaedit.php?id=$id'; 
		</script>";

}
?>