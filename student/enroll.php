
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

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-8 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Student</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
                                    <h3>Registration Form</h3>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                    <h5>Personal Details</h5>
                                                <div class="form-group mt-4">
                                                    <label for="name">Name</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="fname" placeholder="First Name" required> &nbsp
                                                        <input type="text" class="form-control w-50" id="name" name="lname" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Father's Name</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="father_fname" placeholder="First Name" required> &nbsp
                                                        <input type="text" class="form-control w-50" id="name" name="father_lname" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Age | Date of Birth</label>
                                                    <div class="d-flex">
                                                        <input type="number" class="form-control w-25" id="name" name="age" placeholder="xx" required> &nbsp
                                                        <input type="date" class="form-control w-50" id="name" name="dob" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Language Known</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Ex: English, Filipino" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">English Language*</label>
                                                    <div>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Rear">
                                                            <span class="form-check-label">
                                                                Rear
                                                            </span>
                                                        </label>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Write">
                                                            <span class="form-check-label">
                                                                Write
                                                            </span>
                                                        </label>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Speak">
                                                            <span class="form-check-label">
                                                                Speak
                                                            </span>
                                                        </label>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Understand">
                                                            <span class="form-check-label">
                                                                Understand
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
                                    <h5>Educational Details</h5>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Qualification</label>
                                                    <input type="text" class="form-control" id="subject" name="qualification">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Institute</label>
                                                    <input type="text" class="form-control" id="subject" name="institute">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Board</label>
                                                    <input type="text" class="form-control" id="subject" name="board">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Marks/Grade</label>
                                                    <input type="text" class="form-control" id="subject" name="grade" >
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Input</label>
                                                    <input type="text" class="form-control" id="subject" name="input" >
                                                </div>
                                                <div class="form-group mt-5">
                                    <h5>Experience</h5>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Period</label>
                                                    <input type="text" class="form-control" id="subject" name="period">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Organization & Address</label>
                                                    <input type="text" class="form-control" id="subject" name="organization">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Designation</label>
                                                    <input type="text" class="form-control" id="subject" name="designation">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Personal Achievements(If any)</label>
                                                    <input type="text" class="form-control" id="subject" name="achievements">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Upload Documents</label>
                                                    <input type="file" class="form-control" id="subject" name="docs">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Declaration</label>
                                                </div>
                                                
                                                <div class="form-group mt-2">
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="declaration1">
                                                            <span class="form-check-label">
                                                                The information provided in this form is correct to the best of my knowledge
                                                            </span>
                                                        </label>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="declaration2">
                                                            <span class="form-check-label">
                                                                In case of any information furnished by me is found to be incorrect or untrue, the school has the right to take any action it deems to fit, including expulsion at anytime after admission.
                                                            </span>
                                                        </label>
                                                </div>
                                                
                                                <div class="form-group mt-5">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
