<?php 
include ('includes/config.php');

if(isset($_GET['cle'])){
    $id = $_GET['id'];
    $clearance_id = $_GET['cle'];
    $sec = $_GET['sec'];
    $sql = "UPDATE clearances SET status = '1' WHERE clearance_id = '$clearance_id'";
    $result = mysqli_query($con, $sql);
    if($result){
        echo "<script>alert('Clearance approved successfully.');</script>";
        echo "<script>window.location.href='section-view.php?id=$sec';</script>";
    }
    else{
        echo "<script>alert('Something went wrong in approving clearance.');</script>";
        echo "<script>window.location.href='section-view.php?id=$sec';</script>";
    }
}

?>