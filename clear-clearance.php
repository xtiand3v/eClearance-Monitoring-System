<?php 
session_start();
include ('includes/config.php');

if(isset($_GET['cle'])){
    $id = $_GET['id'];
    $clearance_id = $_GET['cle'];
    $sec = $_GET['sec'];
    $dept_name = $_GET['dept'];
    $sql = "UPDATE clearances SET status = '1' WHERE clearance_id = '$clearance_id'";
    $result = mysqli_query($con, $sql);
    if($result){
        $stud = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM student WHERE student_id = '$id'"));
        $student_name = $stud['first_name'] . ' ' . $stud['last_name'];
        $student_contact = $stud['phone'];
        
        //##########################################################################
	// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
	// Visit www.itexmo.com/developers.php for more info about this API
	//##########################################################################
	// function itexmo($number,$message,$apicode,$passwd){
	// 	$url = 'https://www.itexmo.com/php_api/api.php';
	// 	$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
	// 	$param = array(
	// 		'http' => array(
	// 			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	// 			'method'  => 'POST',
	// 			'content' => http_build_query($itexmo),
	// 		),
	// 	);
	// 	$context  = stream_context_create($param);
	// 	return file_get_contents($url, false, $context);
	// }
    
	// $msg = "Hi! ".$student_name.", You've been cleared for subject: ".$dept_name." Thanks.";
	// $result = itexmo($student_contact,$msg,"TR-INNOC831344_QH8WX", "f\$ntc574l)");

        $_SESSION['success'] = "Clearance approved successfully.";
        echo "<script>window.location.href='student-clearance.php?id=$id&section=$sec';</script>";
    }
    else{
        $_SESSION['success'] = "Something went wrong in approving clearance.";
        echo "<script>window.location.href='student-clearance.php?id=$id&section=$sec';</script>";
    }
}

?>