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
		header('location: ../player.php?tourID='.$tour_id.'&teamID='.$team_id.'&success');
	} else {
		header('location: ../player.php?error');
	}
}

// Get player information
if (isset($_POST["action"]) && $_POST["action"] == "getPlayerInfo"){
	$tourID = $_POST["tourID"];

	$sql = "SELECT * FROM `players` WHERE `id` = '$tourID'";
	$result = mysqli_query($conn, $sql);
	$data = array();
	while ($row = mysqli_fetch_array($result)){
		array_push($data, $row);
	}

	echo json_encode($data);
}

// Update function
if (isset($_POST["edit_btn"])){

	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$position = $_POST["position"];
	$jersey_number = $_POST["jersey_number"];
	$height = $_POST["height"];
	$weight = $_POST["weight"];
	$playerID = $_POST["playerID"];
	$tour_id = $_POST["tourID"];
	$teamID = $_POST["teamID"];

	$sql = "UPDATE `players` SET `first_name`= '$first_name',`last_name`= '$last_name',`position`= '$position',`jersey_num`= '$jersey_number',`height`= '$height',`weight`= '$weight'
			WHERE `id` = '$playerID' AND `tour_id` = '$tour_id'";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		header('location: ../player.php?tourID='.$tour_id.'&teamID='.$teamID.'&successUpdate');
	} else {
		header('location: ../player.php?tourID='.$tour_id.'&teamID='.$teamID.'&&errorUpdate');
	}
}

// Delete function
if (isset($_POST["delete-btn"])){

	$playerID = $_POST["player_id"];
	$teamID = $_POST["team_id"];
	$tourID = $_POST["tour_id"];

	$sql = "DELETE FROM `players` WHERE `id` = '$playerID'";
	$result = mysqli_query($conn, $sql);

	if ($result == true){
		header('location: ../player.php?tourID='.$tourID.'&teamID='.$teamID.'&successDelete');
	} else {
		header('location: ../player.php?tourID='.$tourID.'&teamID='.$teamID.'&errorDelete');
	}
}

?>