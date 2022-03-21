<?php
session_start();
include ('config.php');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$sql = "SELECT COUNT(*) from admin where admin_username = '$username' and admin_password = '$password'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if($row[0] > 0):
$_SESSION['user'] = $username;
echo "success";
else :
    echo "<code>Incorrect credentials. Please try again.</code>";
endif;
