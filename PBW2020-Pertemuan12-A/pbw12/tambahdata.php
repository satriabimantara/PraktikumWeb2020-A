<?php
require_once 'config/init.php';
// Menangkap data mahasiswa dari index.php
if (isset($_POST['btnTambahData'])) {
   $nim_mahasiswa = $_POST['input_nim_mahasiswa'];
   $nama_mahasiswa = $_POST['input_nama_mahasiswa'];
   $alamat_mahasiswa = $_POST['input_alamat_mahasiswa'];
   $sql_query = "INSERT INTO mahasiswa (nim_mahasiswa,nama_mahasiswa,alamat_mahasiswa) VALUES ('$nim_mahasiswa','$nama_mahasiswa','$alamat_mahasiswa')";
   if (mysqli_query($conn,$sql_query)) {
      $_SESSION['msg'] = "<strong>[BERHASIL]</strong> Tambah Data Mahasiswa berhasil dilakukan!";
      header( "refresh:0.5;url=index.php" );
   }else{
       $_SESSION['msg'] = "<strong>[ERROR]</strong> Tambah Data Mahasiswa gagal dilakukan!";
      header( "refresh:0.5;url=index.php" );
   }
}

?>