<?php
session_start();

// include file
include('api/db_config.php');
include('include/cek_role.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // email and password sent from form
    $email    = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $sql    = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Cek jika hasil query menghasilkan 1
    if (mysqli_num_rows($result)) {
        $_SESSION['role']  = $row['role'];
        $_SESSION['email'] = $email;
        $_SESSION['login'] = true;

        header('location: login.php');
    } else {
        echo "<script>alert('Email or Password is incorrect!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>ONE - Login</title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>

	</head>
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>

		<div class="wrapper-page">
			<div class="card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Sign In to <br><strong class="text-custom">MOM N JO <i class="md md-account-circle"></i>NE</strong></h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal m-t-20" action="" method="post">

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required="" placeholder="Email" name="email" type="email" value ="">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required="" placeholder="Password" name="password" type="password" value="">
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
							<!-- -->
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" value = "login" name = "login">
									Log In
								</button>
							</div>
						</div>

						<div class="form-group m-t-20 m-b-0">
							<div class="col-sm-12">
								<a href="page-recoverpw.php" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
							</div>
						</div>

					</form>

				</div>
			</div>

		</div>

		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	</body>
</html>