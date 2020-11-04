<?php
include '../templates/headerlogin.php';
?>

<div class="container bg-card-login">
    <!-- Start Row -->
    <div class="row">
        <!-- Start First Column -->
        <div class="col-md-6 in-card mt-lg-5">
            <h1 class="display-4 login-title text-center mb-5">
                Forgot Password?
            </h1>
            <div class="container">
                <!-- Row for elemen -->
                <div class="row">
                    <div class="col">
                        <p class="text-center text-forgot">
                            We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
                        </p>
                    </div>
                </div>
                <!-- Row for button -->
                <div class="row">
                    <div class="col">
                        <input type="email" class="form-control input-login text-center form-label mb-lg-5" id="inputResetEmail" placeholder="Your Email Address">
                        <button class="btn btn-success btn-block mt-3">
                            Reset Password
                        </button>
                        <p class="text-center  mt-3">
                            <a href="login.php" class="text-createaccount">
                                Already have account? Login!
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End First Columns -->
        <!-- Start Second COlumn -->
        <div class="col-md-6 pict-card in-card">
            <img src="../../assets/imgstyle/forgotpass.jpg" alt="" class="img img-fluid">
        </div>
        <!-- End Second Column -->

    </div>
    <!-- End Row -->
</div>



<?php
include '../templates/footerlogin.php';
?>