<?php
include ('config.php');
$user = $_SESSION['user'];
$sql = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$user'");
$row = mysqli_fetch_array($sql);
$name = $row['first_name']." ".$row['last_name'];
$email = $row['email'];
$id = $row['student_id'];
$phone = $row['phone'];
$address = $row['address'];
?>