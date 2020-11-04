<?php
include '../templates/headerlogin.php';
?>

<div class="container bg-card-login">
    <!-- Start Row -->
    <div class="row">
        <!-- Start First COlumn -->
        <div class="col-md-6 pict-card in-card">
            <img src="../../assets/imgstyle/loginpict.jpg" alt="" class="img img-fluid">
        </div>
        <!-- End First Column -->
        <!-- Start Second Column -->
        <div class="col-md-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Signin
            </h1>
            <div class="container">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" class="form-control input-login" id="inputUsername" value="" name="inputUsername" required="true" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control input-login" id="inputPassword" value="" name="inputPassword" required="true">
                    </div>
                    <button class="btn btn-success btn-block-login mt-5" value="" type="submit" name="btnLogin">
                        Login
                    </button>
                </form>
                <p class="text-center  mt-5">
                    <a href="forgotpass.php?page=Forgot Password" class="text-forgot-login">
                        Forgot <span class="text-forgot-login">Username/Password?</span>
                    </a>
                </p>
                <p class="text-center  mt-5">
                    <a href="register.php?page=Registrasi Penjual" class="text-createaccount">
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
include '../templates/footerlogin.php';
?>