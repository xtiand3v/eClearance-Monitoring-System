<?php 
ob_start();
$con = new mysqli('localhost','root','','clearance')or die("Could not connect to mysql".mysqli_error($con));
?>