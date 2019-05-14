<?php
include("../../includes/db.php");
// add tournament function
if (isset($_POST["add"])) {
	$usn = $_POST["usn"];
	$pass = $_POST["pass"];
	$user_type = $_POST["user_type"];
	$tour_id = $_POST["tourID"];

	$sql = "INSERT INTO `user`(`usn`, `pass`, `user_type`, `tour_id`)
			VALUES ('$usn', '$pass', '$user_type', '$tour_id');";
	$result = mysqli_query($conn,$sql);
	if ($result == true) {
		header('location: ../user.php?tourID='.$tour_id.'&success');
	} else {
		header('location: ../user.php?tourID='.$tour_id.'&error');
	}
}

// Function sa pag kua ning team info
if (isset($_POST["action"]) && $_POST["action"] == "getUSerInfo"){
	$userID = $_POST["id"];

	$sql = "SELECT * FROM `user` WHERE `id` = '$userID'";
	$result = mysqli_query($conn, $sql);

	$data = array();
	while ($row = mysqli_fetch_array($result)){
		array_push($data, $row);
	}
	echo json_encode($data);
}

// FUnction to update team
if (isset($_POST["edit"])){
	$usn = $_POST["usn"];
	$pass = $_POST["pass"];
	$user_type = $_POST["user_type"];
	$userID = $_POST["userID"];
	$tourID = $_POST["tourID"];

	$sql = "UPDATE `user` SET `usn`= '$usn',`pass`= '$pass',`user_type`= '$user_type' WHERE `id` = '$userID' AND `tour_id` = '$tourID'";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		header('location: ../user.php?tourID='.$tourID.'&successUpdate');
	} else {
		header('location: ../user.php?tourID='.$tourID.'&errorUpdate');
	}
}

if (isset($_POST["delete-btn"])){
	$tourID = $_POST["tourID"];
	$userID = $_POST["deleteID"];

	$sql = "DELETE FROM `user` WHERE `id` = '$userID'";
	// echo $sql;
	// exit;
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		header('location: ../user.php?tourID='.$tourID.'&success');
	} else {
		header('location: ../user.php?tourID='.$tourID.'&error');
	}
}


?>