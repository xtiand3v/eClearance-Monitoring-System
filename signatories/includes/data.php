<?php
include ('config.php');
$user = $_SESSION['user'];
$sql = mysqli_query($con, "SELECT * FROM designee d INNER JOIN faculties f ON f.faculty_id = d.faculty_id WHERE d.designee_id = '$user'");
$row = mysqli_fetch_array($sql);
$name = $row['first_name']." ".$row['last_name'];
$fname = $row['first_name'];
$lname = $row['last_name'];
$age = $row['age'];
$dob = $row['dob'];
$languages = $row['languages'];
$username = $row['username'];
$password = $row['password'];
$email = $row['email'];
$faculty_id = $row['faculty_id'];
?>