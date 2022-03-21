<?php 
session_start();
include ('includes/config.php');

	
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $account = $_POST['account'];

        $stmt = mysqli_query($con,"UPDATE designee SET username = '$username',password = '$password',email = '$email',user_type = '$account' WHERE designee_id = '$id'");
        if($stmt){
        $_SESSION['success'] = 'Account updated successfully';
    }
    else{
        $_SESSION['error'] = 'Something went wrong in updating account.'.mysqli_error($con);
    }
}

header('location: accounts.php');
?>