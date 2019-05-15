<?php

header('Access-Control-Allow-Origin: *');	

session_start();
include "../../includes/db.php";

@ $id = $_GET["id"];

$sql = "SELECT * FROM `players`";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	exit;
}

echo json_encode(array("status" => "no_players"));
exit;