<?php
include ('config.php');
$q1 = $con->query("SELECT * FROM sections");
$q2 = $con->query("SELECT * FROM student");
$total_sections = $q1->num_rows;
$total_students = $q2->num_rows;
?>