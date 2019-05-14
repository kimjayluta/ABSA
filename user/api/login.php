<?php

header('Access-Control-Allow-Origin: *');	
include "../../includes/db.php";

@$usn = $_POST["usn"];
@$password = $_POST["password"];

if (!isset($usn) || !isset($password)){
	echo json_encode(array("status" => "not_found"));
	exit;
}

$sql = "SELECT * FROM `user` WHERE `usn` = '$usn'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) {
	if ($password == $row["pass"]) {
		setcookie("usn", $usn,  time()+36000, "/");
		setcookie("user_type", $row["user_type"],  time()+36000, "/");

		$_SESSION["usn"] = $usn;
		$_SESSION["user_type"] = $row["user_type"];

		echo json_encode(array("status" => "found"));
		exit;

	}
}

echo json_encode(array("status" => "not_found"));
exit;