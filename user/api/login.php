<?php
include "../../includes/db.php";

@$usn = $_POST["usn"];
@$password = $_POST["password"];

if (!isset($usn) || !isset($password)){
	echo json_encode(array("status" => "not_found"));
	exit;
}

$sql = "SELECT * FROM `account` WHERE `usn` = '$usn'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) {
	if ($password == $row["pass"]) {

		setcookie("usn", $usn,  time()+36000, "/");
		echo json_encode(array("status" => "found"));
		exit;

	}
}

echo json_encode(array("status" => "not_found"));
exit;