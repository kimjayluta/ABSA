<?php
include("../includes/db.php");
// add tournament function 
if (isset($_POST["add"])) {
	$usn = $_POST["usn"];
	$pass = $_POST["pass"];
	$user_type = $_POST["user_type"];
	$tour_id = 3;


	$sql = "INSERT INTO `user`(`usn`, `pass`, `user_type`, `tour_id`) VALUES ('$usn', '$pass', '$user_type', '$tour_id');";

	
	$result = mysqli_query($conn,$sql);

	if ($result == true) {
		header('location: user.php?success');
	} else {
		header('location: user.php?error');
	} 
	
}

?>