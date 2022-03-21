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
            $sql = mysqli_query($con, "SELECT * FROM sections WHERE section_id = '$id'");
            $row = mysqli_fetch_assoc($sql);
            $section_name = $row['section_name'];
            ?>
            <h1 class="h3 mb-3"><strong>Enroll Student</strong> 
            <small>to section <?php echo $section_name; ?></small></h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                <h3>Student Registration Form</h3>
                                    <form method="POST">
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
                                                <div class="form-group mt-3">
                                                    <label for="subject">Email</label>
                                                    <div class="d-flex">
                                                        <input type="email" class="form-control" id="subject" name="email" placeholder="Email" required>
                                                </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Phone</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control" id="subject" name="phone" placeholder="Phone" required>
                                                </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Date of Birth</label>
                                                    <div class="d-flex">
                                                        <input type="date" class="form-control w-50" id="name" name="dob" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Details of Siblings</label>
                                                    <textarea class="form-control" name="siblings" rows="3"></textarea>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Address</label>
                                                    <textarea class="form-control" name="address" rows="3"></textarea>
                                                </div>
                                                
                                                <!-- <div class="form-group mt-3">
                                                    <label for="subject">English Language*</label>
                                                    <div>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Rear" name="rear">
                                                            <span class="form-check-label">
                                                                Rear
                                                            </span>
                                                        </label>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Write" name="write">
                                                            <span class="form-check-label">
                                                                Write
                                                            </span>
                                                        </label>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Speak" name="speak">
                                                            <span class="form-check-label">
                                                                Speak
                                                            </span>
                                                        </label>
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="Understand" name="understand">
                                                            <span class="form-check-label">
                                                                Understand
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div> -->
                                            </div>
                                            
                                            <div class="col-6">
                                    <h5>Parents' Information</h5>
                                                <div class="form-group mt-4">
                                                    <label for="name">Father's Name</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="father_fname" placeholder="First Name" required> &nbsp
                                                        <input type="text" class="form-control w-50" id="name" name="father_lname" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Occupation</label>
                                                    <input type="text" class="form-control" id="subject" name="father_occupation" placeholder="Occupation">
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Mother's Name</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="mother_fname" placeholder="First Name" required> &nbsp
                                                        <input type="text" class="form-control w-50" id="name" name="mother_lname" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="subject">Occupation</label>
                                                    <input type="text" class="form-control" id="subject" name="mother_occupation" placeholder="Occupation">
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
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $siblings = $_POST['siblings'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $father_fname = $_POST['father_fname'];
            $father_lname = $_POST['father_lname'];
            $father_occupation = $_POST['father_occupation'];
            $mother_fname = $_POST['mother_fname'];
            $mother_lname = $_POST['mother_lname'];
            $mother_occupation = $_POST['mother_occupation'];
            $student_id = "20220".rand(100,9999);
            $section_id = $_GET['id'];
            $sql = "INSERT INTO `student`(`student_id`, `first_name`, `last_name`, `password`, `email`, `phone`, `dob`, `gender`, `siblings`, `father_fname`, `father_lname`, `father_occupation`, `mother_fname`, `mother_lname`, `mother_occupation`, `address`, `status`, `section_id`,`date_added`) VALUES ('$student_id','$fname','$lname','1234','$email','$phone','$dob','$gender','$siblings','$father_fname','$father_lname','$father_occupation','$mother_fname','$mother_lname','$mother_occupation','$address','0','$section_id',NOW())";
            $run = mysqli_query($con,$sql);
            if($run){
                $_SESSION['success'] = "Student Added Successfully";
                echo "<script>window.open('enroll.php?id=$section_id','_self')</script>";
            } else {
                $_SESSION['error'] = "Something went wrong";
            }

        }
    ?>