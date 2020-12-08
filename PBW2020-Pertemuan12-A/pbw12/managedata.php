<?php
//validasi user login
if (!isset($_SESSION['user'])) {
   //arahkan untuk login
   echo '<script>alert("Silahkan login terlebih dahulu!");</script>';
   header( "refresh:0.5;url=login.php" );
   exit();
}
require_once 'config/init.php';
if (isset($_GET)) {
   $id = $_GET['id'];
   $sql_query = "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'";
   $result = mysqli_query($conn,$sql_query);
   while ($row = mysqli_fetch_assoc($result)) {
      $mahasiswa =  $row;
   }
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>CRUD PHP</title>
   <!-- Link File Bootstrap -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <!-- Link File Style -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- Link Font Awesom -->
   <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
</head>
<body>
   <div class="container mt-5">
      <div class="row">
         <div class="col">
            <div class="card" id="konten-data">
               <div class="card-header d-flex justify-content-between">
                  <h3>Edit Data Mahasiswa</h3>
               </div>
               <div class="card-body">
                  <form action="update.php" method="post">
                     <input type="hidden" value="<?= $id; ?>" name="id_mahasiswa">
                     <div class="form-group">
                        <label for="update_nim_mahasiswa">Nomor Induk Mahasiswa</label>
                        <input type="text" class="form-control" id="update_nim_mahasiswa" value="<?= $mahasiswa['nim_mahasiswa']; ?>" name="update_nim_mahasiswa" required="true">
                     </div>
                     <div class="form-group">
                        <label for="update_nama_mahasiswa">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="update_nama_mahasiswa"  value="<?= $mahasiswa['nama_mahasiswa']; ?>" name="update_nama_mahasiswa" required="true">
                     </div>
                     <div class="form-group">
                        <label for="update_alamat_mahasiswa">Alamat Mahasiswa</label>
                        <textarea class="form-control" id="update_alamat_mahasiswa" name="update_alamat_mahasiswa" rows="3" required="true"><?= $mahasiswa['alamat_mahasiswa']; ?></textarea>
                     </div>
                     <button type="submit" class="btn btn-success" name="btnUpdateData" value="">Update Data</button>
                  </form>
               </div>
            </div>
         </div>
      </div>   
   </div>

   <!-- jquery -->
   <script type="text/javascript" src="assets/js/jquery.js"></script>
   <!-- Popper -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <!-- Bootstrap -->
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- script -->
   <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>