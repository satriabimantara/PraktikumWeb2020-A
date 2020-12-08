<?php
require_once 'config/init.php';
if (isset($_POST['btnUpdateData'])) {
   $id = $_POST['id_mahasiswa'];
   $nim_mahasiswa = $_POST['update_nim_mahasiswa'];
   $nama_mahasiswa = $_POST['update_nama_mahasiswa'];
   $alamat_mahasiswa = $_POST['update_alamat_mahasiswa'];
   $sql_query = "UPDATE mahasiswa SET nama_mahasiswa = '$nama_mahasiswa',nim_mahasiswa = '$nim_mahasiswa',alamat_mahasiswa = '$alamat_mahasiswa' WHERE id_mahasiswa = '$id'";
    if (mysqli_query($conn,$sql_query)) {
      $_SESSION['msg'] = "<strong>[BERHASIL]</strong> Update Data Mahasiswa berhasil dilakukan!";
      header( "refresh:0.5;url=index.php" );
   }else{
       $_SESSION['msg'] = "<strong>[ERROR]</strong> Update Data Mahasiswa gagal dilakukan!";
      header( "refresh:0.5;url=index.php" );
   }
}

?>