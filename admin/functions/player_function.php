<?php
include("../../includes/db.php");

// add team function
if (isset($_POST["add"])) {
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$position = $_POST["position"];
	$jersey_number = $_POST["jersey_number"];
	$height = $_POST["height"];
	$weight = $_POST["weight"];
	$team_id = $_POST["teamID"];
	$tour_id = $_POST["tourID"];

$sql = "INSERT INTO `players`(`first_name`, `last_name`, `position`, `jersey_num`, `height`, `weight`, `team_id`, `tour_id`) VALUES ('$first_name', '$last_name', '$position', '$jersey_number', '$height', '$weight', '$team_id', '$tour_id');";



$result = mysqli_query($conn,$sql);

	if ($result == true) {
		header('location: ../player.php?tourID='.$tour_id.'?teamID='.$team_id.'&success');
	} else {
		header('location: ../player.php?error');
	} 
	


}


?>