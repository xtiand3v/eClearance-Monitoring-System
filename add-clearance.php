<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Add Requirement</strong> </h1>

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
                                                    <label for="name">Lacking Requirement</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="req" placeholder="Ex. Projects,Quiz,Exam etc." required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Remarks</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="remarks" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Deadline</label>
                                                    <div class="d-flex">
                                                        <input type="date" class="form-control w-50" id="name" name="deadline" required>
                                                </div>
                                                </div>
                                                
                                                <div class="form-group mt-5">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <?php 
            $id = $_GET['id'];
            $sec = $_GET['sec'];
            ?>
            <a href="student-clearance.php?id=<?php echo $id; ?>&section=<?php echo $sec; ?>" class="btn btn-primary">Back</a>
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
        $req = $_POST['req'];
        $remarks = $_POST['remarks'];
        $deadline = $_POST['deadline'];
        $id = $_GET['id'];
        $dept = $_GET['dept'];
        $sec = $_GET['sec'];
        $search = mysqli_query($con, "SELECT * FROM clearances WHERE student_id = '$id' AND department_id = '$dept'");
        if (mysqli_num_rows($search) > 0) {
            $_SESSION['success'] = "Requirement already exists!";
        } else {
            $query = mysqli_query($con, "INSERT INTO clearances (student_id,department_id,status,requirement,remarks,deadline,added) VALUES ('$id','$dept','0','$req','$remarks','$deadline',NOW())");
            if ($query) {
                $_SESSION['success'] = "Requirement added!";
                echo '<script>window.location.href="student-clearance.php?id=' . $id . '&section=' . $sec . '";</script>';
            } else {
                $_SESSION['success'] = "Error!";
            }
        }
    }
    ?>