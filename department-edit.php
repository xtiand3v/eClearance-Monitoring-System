<?php 
session_start();
include ('includes/config.php');

	
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $faculty_id = $_POST['faculty'];

        $stmt = mysqli_query($con,"UPDATE department SET department_name = '$name' WHERE department_id = '$id'");
        if($stmt){
        $_SESSION['success'] = 'Department updated successfully';
    }
    else{
        $_SESSION['error'] = 'Something went wrong in updating department.'.mysqli_error($con);
    }
}

header('location: departments.php');
?>