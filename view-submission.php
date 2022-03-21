<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">
            <?php 
            $id = $_GET['id'];
            $dept = $_GET['dept'];
            $sec = $_GET['sec'];
            ?>
            <h1 class="h3 mb-3"><strong>View Submission</strong> </h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                
                                <div class="card flex-fill p-3">

                                    <form method="POST">
                                        <div class="row">
                                            <?php 
                                            $clearance = $_GET['cle'];
                                            $query = "SELECT * FROM submission WHERE clearance_id = '$clearance'";
                                            $result = mysqli_query($con, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if(mysqli_num_rows($result) >= 1){
                                                
                                            ?>
                                            <div class="col-6">
                                                <div class="form-group mt-4">
                                                    <label for="name">Provided Link/Remarks etc.</label>
                                                    <div class="d-flex">
                                                        <textarea class="form-control w-50" id="name" name="section" readonly><?php echo $row['submitted']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Docs / Files</label>
                                                    <div class="d-flex">
                                                        <a href="student/<?php echo $row['docs']; ?>" target="_blank"><?php echo $row['docs']; ?></a>
                                                </div>
                                                
                                                <div class="form-group mt-5">
            <a href="student-clearance.php?id=<?php echo $id; ?>&section=<?php echo $sec; ?>" class="btn btn-primary btn-sm">Back</a>
                                                </div>
                                            </div>
                                            <?php 
                                            
                                        } else {
                                            echo '<div class="col-12">
                                            <div class="alert alert-danger">
                                                <strong>No submission found!</strong>
                                            </div>';
                                            ?>
                                            
            <?php 
            $id = $_GET['id'];
            $sec = $_GET['sec'];
            ?>
            <a href="student-clearance.php?id=<?php echo $id; ?>&section=<?php echo $sec; ?>" class="btn btn-primary">Back</a>
                                            <?php
                                        }
                                            ?>
                                            
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
        $section = $_POST['section'];
        $adviser = $_POST['adviser'];
        $sql = "INSERT INTO sections (section_name, faculty_id,date_created) VALUES ('$section', '$adviser', NOW())";
        if (mysqli_query($con, $sql)) {
           $_SESSION['success'] = "Section Added!";
            echo '<script>window.location.href = "sections.php";</script>';
        } else {
            $_SESSION['error'] = "Error Adding Section!";
        }
    }
    ?>