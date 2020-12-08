<?php
require_once 'config/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN USER</title>
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
				<?php if (isset($_SESSION['msg'])): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $_SESSION['msg']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php unset($_SESSION['msg']); ?>
				<?php endif ?>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card" id="form-login">
					<div class="card-header ">
						<h3>Form Login</h3>
					</div>
					<div class="card-body">
						<form action="login.php" method="post">
							<div class="form-group">
								<label for="username_user">Username</label>
								<input type="text" class="form-control" id="username_user"  name="username_user" required="true" aria-describedby="username_help">
								<small id="username_help" class="form-text text-muted">Username : satria [admin], bimbim [pegawai]</small>
							</div>
							<div class="form-group">
								<label for="password_user">Password</label>
								<input type="password" class="form-control" id="password_user"  name="password_user" required="true" aria-describedby="password_help">
								<small id="password_help" class="form-text text-muted">Password : 123</small>
							</div>
							<button type="submit" class="btn btn-success tombol" name="btnLogin" value="">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (isset($_POST['btnLogin'])) {
		$username_user = $_POST['username_user'];
		$password_user = $_POST['password_user'];
		$sql_query = "SELECT * FROM user WHERE username_user = '$username_user' AND password_user='$password_user'";
		$result = mysqli_query($conn,$sql_query);
		if (mysqli_num_rows($result)==0) {
			$_SESSION['msg'] = "<strong>[ERROR]</strong> Tidak ada data user yang cocok dengan username atau email yang dimasukkan!";
			header( "refresh:0.5;url=login.php" );
		}else{
			$_SESSION['user'] = mysqli_fetch_assoc($result);
			echo '<script>alert("Berhasil Login!");</script>';
			header( "refresh:0.5;url=index.php" );
		}

	}
	?>
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