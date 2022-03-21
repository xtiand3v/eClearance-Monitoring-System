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
$email = $row['email'];
$id = $row['student_id'];
$phone = $row['phone'];
$address = $row['address'];
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
                                                <h3 class="text-center">MY PROFILE</h3>
                                            </div>
                                        <div class="row">
                                            <div class="col mt-2">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>LRN</td>
                                                            <td><?php echo $id; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name</td>
                                                            <td><?php echo $name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><?php echo $email; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone</td>
                                                            <td><?php echo $phone; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td><?php echo $address; ?></td>
                                                        </tr>
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