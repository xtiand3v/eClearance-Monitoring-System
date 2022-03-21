<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Add Department</strong> </h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mt-4">
                                                    <label for="name">Department Name</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="department" placeholder="Ex. Math" required>
                                                    </div>
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

        </div>
    </main>
    <?php include('includes/footer.php'); ?>
    <?php 
    if (isset($_POST['submit'])) {
        $department = $_POST['department'];
        $search = mysqli_query($con, "SELECT * FROM department WHERE department_name = '$department'");
        if (mysqli_num_rows($search) > 0) {
            echo '<script>alert("Department already exists!");</script>';
        } else {
            $sql = "INSERT INTO department (department_name) VALUES ('$department')";
            if (mysqli_query($con, $sql)) {
                $_SESSION['success'] = "Department added!";
            } else {
                $_SESSION['error'] = "Error adding department!";
            }
        }
    }
    ?>