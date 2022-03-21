<?php 
include ('includes/config.php');

if(isset($_GET['dataId']) && is_numeric($_GET['dataId'])){
	$id = $_GET['dataId'];
	$query = "SELECT * from submission WHERE clearance_id = '$id'";
	$result = mysqli_query($con, $query);
	$message = "";
	if($result){
		$row = mysqli_fetch_assoc($result);
		$message = '<div class="form-group">
		<label for="email">Event Name</label>
		<input id="eventName" value="'.$row['submitted'].'" type="text" class="form-control" tabindex="1" autofocus>
		</div>';
		echo $message;
	} else{
		echo "No such data"; 
	}
}
?>