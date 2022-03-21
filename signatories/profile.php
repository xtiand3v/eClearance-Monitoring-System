<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<?php include('includes/data.php'); ?>
<div class="main" style="background: url(../src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">


            <div class="row">
                <div class="col-xl-6 col-xxl-5 m-auto">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="col mt-0">
                                                <h3 class="text-center">EDIT PROFILE</h3>
                                            </div>
                                        <div class="row">
                                            <div class="col mt-2">
                                                <table class="table table-striped">
                                                    <tbody>
                                                                <form method="POST">
                                                        <tr>
                                                            <td>Username</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>First name</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last name</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>
                                                                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Age</td>
                                                            <td>
                                                                <input type="number" class="form-control" name="age" value="<?php echo $age; ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Birth</td>
                                                            <td>
                                                                <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Password</td>
                                                            <td>
                                                                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <input type="hidden" name="fac" class="form-control" value="<?php echo $faculty_id; ?>">
                                                                <input type="submit" name="submit" class="btn btn-primary mt-2" value="Save Changes">
                                                        </td>
                                                        </tr>
                                                            </form>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
        $user = $_SESSION['user'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $fac = $_POST['fac'];
        
            $sql = mysqli_query($con,"UPDATE faculties SET first_name='$fname', last_name='$lname', age='$age', dob='$dob' WHERE faculty_id='$fac'");
            
            mysqli_query($con, "UPDATE designee SET username = '$username', password = '$password', email = '$email' WHERE designee_id = '$user'");
            
            if($sql){
                
                echo "<script>alert('Changes saved successfully!');</script>";
                echo "<script>window.location.href='profile.php';</script>";
            }else {
                echo "<script>alert('Failed to save changes');</script>";
            }
    }
    ?>