<?php

header('Access-Control-Allow-Origin: *');	
include "../../includes/db.php";


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