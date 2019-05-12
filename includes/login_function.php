<?php
// Digde ka mag code kang mag code kang functionality kang login
include "db.php";

$usn = $_POST["usn"];
$password = $_POST["password"];

$sql = "SELECT * FROM `account` WHERE `usn` = '$usn'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) {
	if ($password == $row["pass"]) {

		 setcookie("usn", $usn,  time()+36000, "/");
		 header('location: ../admin/dashboard.php');

	} else {
		header('location: ../index.php?error');
	}
} else {
	header('location: ../index.php?error');
}


?>