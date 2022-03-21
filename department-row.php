<?php 
include ('includes/config.php');

	if(isset($_POST['id'])){
        $id = $_POST['id'];
		

		$stmt = mysqli_query($con,"SELECT * FROM department WHERE department_id='$id'");
        $row = mysqli_fetch_array($stmt);

		echo json_encode($row);
	}
?>