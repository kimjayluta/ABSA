<?php
include("../../includes/db.php");

// add team function
if (isset($_POST["add"])) {
	$team_name = $_POST["team_name"];
	$coach = $_POST["coach"];
	$tour_id = $_POST["tourID"];

$sql = "INSERT INTO `teams`(`name`, `coach`, `tour_id`) VALUES ('$team_name', '$coach', '$tour_id');";

$result = mysqli_query($conn,$sql);

	if ($result == true) {
		header('location: ../team.php?tourID='.$tour_id.'&success');
	} else {
		header('location: ../team.php?error');
	} 
	


}


?>