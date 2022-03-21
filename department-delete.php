<?php 
session_start();
include ('includes/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM department WHERE department_id = '$id'";
    $result = mysqli_query($con, $sql);
    if($result){
        $_SESSION['success'] = "Department deleted successfully.";
    }
    else{
        $_SESSION['error'] = "Something went wrong in deleting department.";
    }
}

header('location: departments.php');
?>