<?php
include '../templates/headermain.php';
unset($_SESSION['penjual']);
if ($_SESSION['jumlah_userlogin']==4) {
   $_SESSION['jumlah_userlogin']-=2;
}elseif ($_SESSION['jumlah_userlogin']>0) {
   $_SESSION['jumlah_userlogin']--;
}
$objFlash->showSimpleFlash("LOGOUT","success","Anda telah logout!","login.php",$confirmButtonColor="#4BB543",$cancelButtonColor = "#d33","Keluar");
exit;
include '../templates/footermain.php';
?>

