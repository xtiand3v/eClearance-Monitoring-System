<?php session_start();
ob_start(); ?>
<?php if (isset($_SESSION['user'])) {
	header("location: index.php");
}  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../vendor/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Login - Clearance System</title>

	<link href="../vendor/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css">
</head>

<body style="background: url(../src/img/cover-bg.jpg);background-repeat: no-repeat;background-size: auto;background-position: top;background-size: cover">
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">


						<div class="card">
							<div class="card-body">
						<div class="text-center mt-4">
							<h1 class="h2">Signatories</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>
								<div class="m-sm-4">
									<form id="form-login" method="POST" action="includes/check-login.php">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" id="username" type="text" name="username" placeholder="Enter your username" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="**********" />
										</div>
										<div class="mb-3 text-center" id="alert">
										</div>
										<div class="text-center mt-3">
											<button type="button" id="sign-in" class="btn btn-lg btn-primary">Sign in</button>
										</div>
										<div class="text-center mt-3">
											<small>Login as <a class="text-underlined" href="../">Admin</a> | <a class="text-underlined" href="../student">Student</a></small>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="../vendor/js/app.js"></script>
	<script src="../vendor/js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.js"></script>
	<script>
		var urlParams;
		(window.onpopstate = function() {
			var match,
				pl = /\+/g, // Regex for replacing addition symbol with a space
				search = /([^&=]+)=?([^&]*)/g,
				decode = function(s) {
					return decodeURIComponent(s.replace(pl, " "));
				},
				query = window.location.search.substring(1);

			urlParams = {};
			while (match = search.exec(query))
				urlParams[decode(match[1])] = decode(match[2]);
		})();
		if (urlParams['logout'] === "success") {
			Swal.fire({
				title: 'Success!',
				text: 'Logged out successfully!',
				icon: 'success',
				showConfirmButton: false,
				timer: 1500
			})
		}
	</script>
</body>

</html>