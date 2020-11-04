<?php
include '../templates/headerlogin.php';
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
                                    <label for="namadepan_pembeli" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control input-login" id="namadepan_pembeli" name="namadepan_pembeli" value="" required="true">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namabelakang_pembeli" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control input-login" id="namabelakang_pembeli" name="namabelakang_pembeli" value="" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email_pembeli" class="form-label">Email</label>
                                <input type="email" class="form-control input-login" id="email_pembeli" name="email_pembeli" value="" required="true">
                            </div>
                            <div class="form-group">
                                <label for="hp_pembeli" class="form-label">Handphone</label>
                                <input type="number" class="form-control input-login" id="hp_pembeli" name="hp_pembeli" value="" required="true"> 
                            </div>
                            <div class="form-group">
                                <label for="alamat_pembeli" class="form-label">Alamat</label>
                                <input type="text" class="form-control input-login" id="alamat_pembeli" name="alamat_pembeli" value="" required="true">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="provinsi_pembeli" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control input-login" id="provinsi_pembeli" name="provinsi_pembeli" value="" required="true">
                                </div>
                                <div class="form-group col-4">
                                    <label for="kota_pembeli" class="form-label">Kota</label>
                                    <input type="text" class="form-control input-login" id="kota_pembeli" name="kota_pembeli" value="" required="true">
                                </div>
                                <div class="form-group col-4">
                                    <label for="kodepos_pembeli" class="form-label">Kodepos</label>
                                    <input type="number" class="form-control input-login" id="kodepos_pembeli" name="kodepos_pembeli" value="" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username_pembeli" class="form-label">Username</label>
                                <input type="text" class="form-control input-login" id="username_pembeli" name="username_pembeli" value="" required="true">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="password_pembeli" class="form-label">New Password</label>
                                    <input type="password" class="form-control input-login" id="password_pembeli" name="password_pembeli" value="" required="true">
                                </div>
                                <div class="form-group col-6">
                                    <label for="repeat_password_pembeli" class="form-label">Repeat Password</label>
                                    <input type="password" class="form-control input-login" id="repeat_password_pembeli" name="repeat_password_pembeli" value=""required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir row elemen -->
                    <!-- Row for button -->
                    <div class="row">
                        <div class="col">
                            <button  type="submit" class="btn btn-success btn-block mt-3" name="btnRegisterNewPembeli" value="DITEKAN"  id="btnRegisterNewPembeli">
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
include '../templates/footerlogin.php';
?>