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
	echo $sql;
	$result = mysqli_query($conn,$sql);

	if ($result == true) {
		header('location: ../dashboard.php?success');
	} else {
		header('location: ../dashboard.php?error');
	} 
	
}

?>