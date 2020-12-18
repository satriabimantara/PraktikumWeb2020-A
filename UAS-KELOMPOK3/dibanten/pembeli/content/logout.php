<?php
include '../templates/headermain.php';
unset($_SESSION['pembeli']);
$pembeli = NULL;
$objFlash->showSimpleFlash("LOGOUT","success","Anda telah logout!","index.php",$confirmButtonColor="#4BB543",$cancelButtonColor = "#d33","Keluar");
exit;
include '../templates/footermain.php';
?>

