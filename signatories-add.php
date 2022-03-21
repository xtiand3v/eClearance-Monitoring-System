<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Add Subject</strong> </h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-6">
                                                <?php

                                                $section_id = $_GET['id'];
                                                $query = "SELECT * FROM sections WHERE section_id = '$section_id'";
                                                $result = mysqli_query($con, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                ?>
                                                <div class="form-group mt-4">
                                                    <label for="name">Section</label>
                                                    <div class="d-flex">
                                                        <select class="form-control w-50" id="name" name="section" readonly>
                                                            <option selected value="<?php echo $section_id; ?>"><?php echo $row['section_name'] ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Subject</label>
                                                    <div class="d-flex">
                                                        <select class="form-control w-50" id="name" name="subject" required>
                                                            <option value="">Select Subject</option>
                                                            <?php
                                                            $sql = "SELECT * FROM department";
                                                            $result = mysqli_query($con, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="' . $row['department_id'] . '">' . $row['department_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Adviser</label>
                                                    <div class="d-flex">
                                                        <select class="form-control w-50" id="name" name="adviser" required>
                                                            <option value="">Select Adviser</option>
                                                            <?php
                                                            $sql = "SELECT * FROM faculties";
                                                            $result = mysqli_query($con, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="' . $row['faculty_id'] . '">' . $row['first_name'] . ' ' . $row['last_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
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
    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        $subject_id = $_POST['subject'];
        $adviser_id = $_POST['adviser'];
        $section_id = $_POST['section'];
        $query = "INSERT INTO signatory (section_id, faculty_id, department_id,date_added) VALUES ('$section_id', '$adviser_id', '$subject_id', NOW())";
        $result = mysqli_query($con, $query);
        if($result){
            $_SESSION['success'] = "Subject Added Successfully!"; 
            echo '<script>window.location.href="signatories.php?id='.$section_id.'";</script>';
        }else{
            $_SESSION['error'] = "Something went wrong!";
            echo '<script>window.location.href="signatories.php?id='.$section_id.'";</script>';
        }
    }
    ?>