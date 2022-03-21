<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<?php include('includes/data.php'); ?>
<?php 
$sql = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$_SESSION[user]'");
$row = mysqli_fetch_array($sql);
$name = $row['first_name']." ".$row['last_name'];
$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];
$id = $row['student_id'];
$phone = $row['phone'];
$address = $row['address'];
$password = $row['password'];
?>
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
                                                            <td>LRN</td>
                                                            <td><?php echo $id; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>First name</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>"> &nbsp
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
                                                            <td>Phone</td>
                                                            <td>
                                                                <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>">
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td>
                                                                <textarea name="address" id="address" class="form-control" cols="10" rows="2"><?php echo $address; ?></textarea>
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
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

            $sql = mysqli_query($con, "UPDATE student SET first_name = '$fname', last_name = '$lname', email = '$email', phone = '$phone', address = '$address', password = '$password' WHERE student_id = '$id'");
            if($sql){
                echo "<script>alert('Changes successfully saved!');</script>";
                echo "<script>window.location.href='profile.php';</script>";
            } else {
                echo "<script>alert('Failed to save changes!');</script>";
            }
    }
    ?>