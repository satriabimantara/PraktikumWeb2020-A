<?php
require_once 'config/init.php';
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql_query = "DELETE FROM mahasiswa WHERE id_mahasiswa='$id'";
   if (mysqli_query($conn,$sql_query)) {
      $_SESSION['msg'] = "<strong>[BERHASIL]</strong> Data Mahasiswa berhasil dihapus!";
      header( "refresh:0.5;url=index.php" );
   }else{
       $_SESSION['msg'] = "<strong>[ERROR]</strong> Data Mahasiswa gagal dihapus!";
      header( "refresh:0.5;url=index.php" );
   }
}

?>