<?php
session_start();
include ('config.php');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$sql = "SELECT * from designee where username = '$username' and password = '$password'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if(mysqli_num_rows($result) > 0):
$_SESSION['user'] = $row['designee_id'];
echo "success";
else :
    echo "<code>Incorrect credentials. Please try again.</code>";
endif;
