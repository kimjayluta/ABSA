<?php
include("../../includes/db.php");


// add schedule function
if (isset($_POST["add"])) {
	$teamone_id = $_POST["home"];
	$teamtwo_id = $_POST["away"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$game_type = $_POST["game_type"];
	$tour_id = $_POST["tourID"];

	$sql = "INSERT INTO `schedule`(`teamone_id`, `teamtwo_id`, `date`, `time`, `game_type`, `tour_id`)
			VALUES ('$teamone_id','$teamtwo_id','$date','$time','$game_type','$tour_id')";
	$result = mysqli_query($conn,$sql);

	if ($result == true) {
		header('location: ../schedule.php?tourID='.$tour_id.'&success');
	} else {
		header('location: ../schedule.php?tourID='.$tour_id.'&error');
	}
}

// Get schedule information
if (isset($_POST["action"]) && $_POST["action"] == "getScheduleInfo"){
	$schedID = $_POST["id"];

	$sql = "SELECT * FROM `schedule` WHERE `id` = '$schedID'";
	$result = mysqli_query($conn, $sql);
	$data = array();
	while ($row = mysqli_fetch_array($result)){
		array_push($data, $row);
	}

	echo json_encode($data);
}


// Update function
if (isset($_POST["edit_btn"])){
	$date = $_POST["date"];
	$time = $_POST["time"];
	$home = $_POST["home"];
	$away = $_POST["away"];
	$game_type = $_POST["game_type"];
	$sched_id = $_POST["sched_id"];
	$tourID = $_POST["tourID"];

	$sql = "UPDATE `schedule` SET `teamone_id`= '$home',`teamtwo_id`= '$away',`date`= '$date',`time`= '$time',`game_type`= '$game_type'
			WHERE  `id` = '$sched_id' AND `tour_id` = '$tourID'";
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		header('location: ../schedule.php?tourID='.$tourID.'&successUpdate');
	} else {
		header('location: ../schedule.php?tourID='.$tourID.'&errorUpdate');
	}
}


// Delete function
if (isset($_POST["sched_delete"])){
	print_r($_POST);
	$deleteID = $_POST["delete_sched_id"];
	$tour_id = $_POST["tourID"];

	$sql = "DELETE FROM `schedule` WHERE `id` = '$deleteID'";
	$result = mysqli_query($conn, $sql);

	if ($result == true){
		header('location: ../schedule.php?tourID='.$tour_id.'&successDelete');
	} else {
		header('location: ../schedule.php?tourID='.$tour_id.'&errorDelete');
	}
}


?>