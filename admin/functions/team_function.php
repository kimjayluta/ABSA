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
// Function sa pag kua ning team info
if (isset($_POST["action"]) && $_POST["action"] == "getTeamInfo"){
	$teamID = $_POST["teamID"];

	$sql = "SELECT * FROM `teams` WHERE `id` = '$teamID'";
	$result = mysqli_query($conn, $sql);

	$data = array();
	while ($row = mysqli_fetch_array($result)){
		array_push($data, $row);
	}
	echo json_encode($data);
}

// FUnction to update team
if (isset($_POST["edit"])){
	$tourID = $_POST["tourID"];
	$teamID = $_POST["teamID"];
	$team_name = $_POST["team_name"];
	$coach = $_POST["coach"];

	$sql = "UPDATE `teams` SET `name`= '$team_name',`coach`= '$coach' WHERE `id` = '$teamID' AND `tour_id` = '$tourID'";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		header('location: ../team.php?tourID='.$tourID.'&successUpdate');
	} else {
		header('location: ../team.php?tourID='.$tourID.'&errorUpdate');
	}
}

if (isset($_POST["delete"])){
	$tourID = $_POST["tourID"];

	$sql = "DELETE FROM `teams` WHERE `id` = '$tourID'";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		header('location: ../team.php?tourID='.$tourID.'&successDelete');
	} else {
		header('location: ../team.php?tourID='.$tourID.'&errorDelete');
	}
}

?>