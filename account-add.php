<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Add Teacher</strong> </h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                <h3>Registration Form</h3>
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
                                                    <input type="text" class="form-control" id="subject" name="language" placeholder="Ex: English, Filipino" required>
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
                                                <!-- <div class="form-group mt-3">
                                                    <label for="subject">Upload Documents</label>
                                                    <input type="file" class="form-control" id="subject" name="docs">
                                                </div> -->
                                                <!-- <div class="form-group mt-3">
                                                    <label for="subject">Declaration</label>
                                                </div> -->
                                                
                                                <!-- <div class="form-group mt-2">
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
                                                </div> -->
                                                
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
        $father_fname = $_POST['father_fname'];
        $father_lname = $_POST['father_lname'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $language = $_POST['language'];
        $rear = '1';
        $write = '1';
        $speak = '1';
        $understand = '1';
        $qualification = $_POST['qualification'];
        $institute = $_POST['institute'];
        $board = $_POST['board'];
        $grade = $_POST['grade'];
        $input = $_POST['input'];
        $period = $_POST['period'];
        $organization = $_POST['organization'];
        $designation = $_POST['designation'];
        $achievements = $_POST['achievements'];
        $docs = '';
        // if($_FILES['docs']['name'] == ''){
        //     $docs = '';
        // }else{
        // $docs = $_FILES['docs']['name'];
        // $temp_name = $_FILES['docs']['tmp_name'];
        // $path = "docs/".$docs;
        // move_uploaded_file($temp_name, $path);
        // }

        $query = "INSERT INTO faculties(first_name, last_name, father_fname, father_lname, age, dob, languages, rear, writes, speak, understand, qualification, institute, board, grade, input, periods, organization, designation, achievement, docs, date_added) VALUES ('$fname','$lname','$father_fname','$father_lname','$age','$dob','$language','$rear','$write','$speak','$understand','$qualification','$institute','$board','$grade','$input','$period','$organization','$designation','$achievements','$docs',NOW())";
        $run = mysqli_query($con,$query);
        if($run){
            $username = strtolower($fname).".".strtolower($lname);
            $email = strtolower($fname).".".strtolower($lname).'@gmail.com';
            $password = "1234";
            $get = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM faculties ORDER by faculty_id DESC LIMIT 1"));
            $last_id = $get['faculty_id'];
            $query = "INSERT INTO designee(faculty_id,username, password, email, user_type) VALUES ('$last_id','$username','$password','$email','Teacher')";
            mysqli_query($con,$query);
            $_SESSION['success'] = "Data Inserted Successfully";
        }else{
            $_SESSION['error'] = "Data Insertion Failed";
        }


    }
    ?>