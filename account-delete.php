<?php
session_start();
include ('includes/config.php');

	
	if(isset($_POST['delete'])){
		$id = $_POST['id'];

			$stmt = mysqli_query($con,"DELETE FROM designee WHERE designee_id= '$id'");
            if($stmt){
            $_SESSION['success'] = 'Account deleted successfully';
	}
	else {
        $_SESSION['error'] = 'Something went wrong in deleting account.'.mysqli_error($con);
	}
}
	header('location: accounts.php');
	
?>