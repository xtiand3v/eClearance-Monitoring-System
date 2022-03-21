<?php 
session_start();
include ('includes/config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dept = $_GET['dept'];
    $sec = $_GET['sec'];
    $sql = "SELECT * FROM student WHERE student_id = '$id'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $student_name = $row['first_name'];
        $student_contact = $row['phone'];
        $rows = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM department WHERE department_id = '$dept'"));
        $dept_name = $rows['department_name'];
        

	//##########################################################################
	// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
	// Visit www.itexmo.com/developers.php for more info about this API
	//##########################################################################
	function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
	}
    
	$msg = "GOOD DAY! ".$student_name.", REQUIREMENTS HAS BEEN ADDED TO YOUR CLEARANCE: ".$dept_name." Thanks.";
	$result = itexmo($student_contact,$msg,"TR-INNOC831344_QH8WX", "f\$ntc574l)");
    $_SESSION['success'] = "Message Sent!";
    echo "<script>window.location.href='student-clearance.php?id=$id&section=$sec';</script>";
    } else {
        $_SESSION['error'] = "Message failed to sent!";
        echo "<script>window.location.href='student-clearance.php?id=$id&section=$sec';</script>";

    }
}