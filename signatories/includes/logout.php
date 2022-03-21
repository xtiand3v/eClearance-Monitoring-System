<?php 
session_start();
ob_start();
if(isset($_SESSION)){
    session_destroy();
    header("location: ../login.php?logout=success");

}
?>