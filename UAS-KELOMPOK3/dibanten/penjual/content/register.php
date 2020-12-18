<?php
include '../templates/headerlogin.php';
// Query get info bank
$runQuery = $objBank->getAllDataBank();
?>
<div class="container bg-card-login">
    <!-- Start Row -->
    <div class="row">
        <!-- Start First Column -->
        <div class="col-md-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Register
            </h1>
            <div class="container">
                <form action="register.php" method="post">
                    <!-- Row for elemen -->
                    <div class="row">
                        <div class="col">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputNamaDepan" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control input-login" id="inputNamaDepan" name="inputNamaDepan" value="" required="true">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNamaDepan" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control input-login" id="inputNamaBelakang" name="inputNamaBelakang" value="" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control input-login" id="inputEmail" name="inputEmail" value="" required="true">
                            </div>
                            <div class="form-group">
                                <label for="inputHandphone" class="form-label">Handphone</label>
                                <input type="number" class="form-control input-login" id="inputHandphone" name="inputHandphone" value="" required="true"> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-8">
                                    <label for="inputNomorRekening" class="form-label">Nomor Rekening</label>
                                    <input type="number" class="form-control input-login" id="inputNomorRekening" name="inputNomorRekening" value="" required="true">
                                </div>
                                <div class="form-group col-4">
                                    <label for="inputBank" class="form-label">Bank</label>
                                    <select id="inputBank" class="form-control input-login" name="inputBank" required="true">
                                        <option value="">- Bank -</option>
                                        <?php while ( $bank = $runQuery->fetch_assoc()) :?>
                                            <option value="<?= $bank['id_bank']."-".$bank['nama_bank']; ?>"><?= $bank['nama_bank']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUsername" class="form-label">Username</label>
                                <input type="text" class="form-control input-login" id="inputUsername" name="inputUsername" value="" required="true">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="inputNewPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control input-login" id="inputNewPassword" name="inputNewPassword" value="" required="true">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputRepeatPassword" class="form-label">Repeat Password</label>
                                    <input type="password" class="form-control input-login" id="inputRepeatPassword" name="inputRepeatPassword" value=""required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir row elemen -->
                    <!-- Row for button -->
                    <div class="row">
                        <div class="col">
                            <button  type="submit" class="btn btn-success btn-block mt-3" name="btnRegisterNewPenjual" value="DITEKAN"  id="btnRegisterNewPenjual">
                                Register
                            </button>
                            <p class="text-center  mt-3">
                                <a href="login.php" class="text-createaccount">
                                    Already have account? Login!
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- Akhir row button -->
                </form>
            </div>
        </div>
        <!-- End First Columns -->
        <!-- Start Second COlumn -->
        <div class="col-md-6 pict-card in-card">
            <img src="../../assets/imgstyle/register.jpg" alt="" class="img-portrait">
        </div>
        <!-- End Second Column -->
    </div>
    <!-- End Row -->
</div>


<?php
if (isset($_POST['btnRegisterNewPenjual'])) {
    $password_penjual = $_POST['inputNewPassword'];
    $repeatPassword = $_POST['inputRepeatPassword'];
    if ($password_penjual !== $repeatPassword) {
        //alert password tidak sama
        $objFlash->showSimpleFlash("PASSWORD TIDAK SAMA","warning","Silahkan periksa password dan ulangi dengan benar!","register.php?page=Registrasi Penjual",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Periksa");
    }else{
        $namadepan_penjual = $_POST['inputNamaDepan'];
        $namabelakang_penjual = $_POST['inputNamaBelakang'];
        $email_penjual = $_POST['inputEmail'];
        $hp_penjual = $_POST['inputHandphone'];
        $password_penjual = password_hash($password_penjual, PASSWORD_DEFAULT); //hashing
        $username_penjual = $_POST['inputUsername'];
        $rekening_penjual = $_POST['inputNomorRekening'];
        $inputBank = $_POST['inputBank'];
        list($id_bank,$nama_bank) = explode("-", $inputBank);
        list($pesanKesalahan,$runQuery) = $objPenjual->registerNewPenjual($namadepan_penjual,$namabelakang_penjual,$email_penjual,$hp_penjual,$username_penjual,$password_penjual,$id_bank,$rekening_penjual);
        if ($runQuery==true && $pesanKesalahan==null) {
            //alert berhasil
            $objFlash->showSimpleFlash("REGISTRASI BERHASIl","success","Kamu sudah terdaftar sebagai penjual. Silahkan login!","login.php",$confirmButtonColor="#22bb33",$cancelButtonColor = "#d33","Login");
        }else{
            if ($pesanKesalahan===null) {
             //ngetimpa pesan kesalahan yang sebelumnya yang menandakan query error
                $pesanKesalahan = "Terjadi kesalahan saat Anda mendaftar!";
            }
            //alert gagal
            $objFlash->showSimpleFlash("REGISTRASI GAGAL","warning",$pesanKesalahan,"register.php?page=Registrasi Penjual",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Login");
        }
    }
}
?>

<?php
include '../templates/footerlogin.php';
?>