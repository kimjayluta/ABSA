<?php
include("../../includes/db.php");
// add tournament function
if (isset($_POST["add"])) {
	$tour_name = $_POST["name"];
	$tour_comm = $_POST["comm"];
	$tour_refone = $_POST["refone"];
	$tour_reftwo = $_POST["reftwo"];
	$tour_refthree = $_POST["refthree"];

	$sql = "INSERT INTO `tournament`(`name`, `comissioner`, `ref_one`, `ref_two`, `ref_three`) VALUES ('$tour_name', '$tour_comm', '$tour_refone', '$tour_reftwo', '$tour_refthree');";

	$result = mysqli_query($conn,$sql);

	if ($result == true) {
		header('location: ../dashboard.php?success');
	} else {
		header('location: ../dashboard.php?error');
	}

}

// Get tournament information
if (isset($_POST["action"]) && $_POST["action"] == "getTournamentInfo"){
	$tourID = $_POST["tourID"];

	$sql = "SELECT * FROM `tournament` WHERE `id` = '$tourID'";
	$result = mysqli_query($conn, $sql);
	$data = array();
	while ($row = mysqli_fetch_array($result)){
		array_push($data, $row);
	}

	echo json_encode($data);
}

// Update function
if (isset($_POST["edit_btn"])){
	$newName = $_POST["name"];
	$newComm = $_POST["comm"];
	$newRefOne = $_POST["refone"];
	$newRefTwo = $_POST["reftwo"];
	$newRefThree = $_POST["refthree"];
	$tourID = $_POST["tourID"];

	$sql = "UPDATE `tournament` SET `name`= '$newName',`comissioner`= '$newComm',`ref_one`= '$newRefOne',`ref_two`= '$newRefTwo',`ref_three`= '$newRefThree'
			WHERE `id` = '$tourID'";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		header('location: ../dashboard.php?successUpdate');
	} else {
		header('location: ../dashboard.php?errorUpdate');
	}
}

// Delete function
if (isset($_POST["delete_btn"])){
	$tourID = $_POST["tourID"];

	$sql = "DELETE FROM `tournament` WHERE `id` = '$tourID'";
	$result = mysqli_query($conn, $sql);

	if ($result == true){
		header('location: ../dashboard.php?successDelete');
	} else {
		header('location: ../dashboard.php?errorDelete');
	}
}

?>