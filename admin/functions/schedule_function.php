<?php
include("../../includes/db.php");


// add team function
if (isset($_POST["add"])) {
	$teamone_id = $_POST["teamone_id"];
	$teamtwo_id = $_POST["teamtwo_id"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$game_type = $_POST["game_type"];
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