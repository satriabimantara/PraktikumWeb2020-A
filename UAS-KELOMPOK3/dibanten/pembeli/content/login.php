<?php
include '../templates/headerlogin.php';
?>
<div class="container bg-card-login">
    <!-- Start Row -->
    <div class="row">
        <!-- Start First COlumn -->
        <div class="col-md-6 pict-card in-card">
            <img src="../../assets/imgstyle/loginpict3.jpg" alt="" class="img img-fluid">
        </div>
        <!-- End First Column -->
        <!-- Start Second Column -->
        <div class="col-md-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Signin
            </h1>
            <div class="container">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username_pembeli" class="form-label">Username</label>
                        <input type="text" class="form-control input-login" id="username_pembeli" aria-describedby="emailHelp" required="true" name="username_pembeli" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label for="password_pembeli" class="form-label">Password</label>
                        <input type="password" class="form-control input-login" id="password_pembeli" required="true" name="password_pembeli">
                    </div>
                    <button class="btn btn-success btn-block mt-5" name="btnLoginPembeli" value="" type="submit">
                        Login
                    </button>
                </form>
                <p class="text-center  mt-5">
                    <a href="forgotpass.php?page=Forgot Password" class="text-forgot-login">
                        Forgot <span class="text-forgot-login">Username/Password?</span>
                    </a>
                </p>
                <p class="text-center  mt-5">
                    <a href="register.php?page=Registrasi Pembeli" class="text-createaccount">
                        Create your account!
                    </a>
                </p>
            </div>
        </div>
        <!-- End Second Columns -->
    </div>
    <!-- End Row -->
</div>

<?php
if (isset($_POST['btnLoginPembeli'])) {
    $username_pembeli = $_POST['username_pembeli'];
    $password_pembeli = $_POST['password_pembeli'];
    list($pesan,$data) = $objPembeli->loginVerifyPembeli($username_pembeli,$password_pembeli);
    if ($pesan==1) {
        $_SESSION['pembeli'] = $data;
            //boleh login
        $objFlash->showSimpleFlash("LOGIN SUKSES","success","Anda berhasil login!","index.php",$confirmButtonColor="#4BB543",$cancelButtonColor = "#d33","Login");
    }else{
        //tampilkan pesan kesalahan
       $objFlash->showSimpleFlash("LOGIN GAGAL","warning",$pesan,"login.php",$confirmButtonColor="#d33",$cancelButtonColor = "#d33","Login");
   }
}
?>

<?php
include '../templates/footerlogin.php';
?>