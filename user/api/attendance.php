<?php

header('Access-Control-Allow-Origin: *');	

session_start();
include "../../includes/db.php";

@ $tid = $_POST["tid"];
@ $sid = $_POST["sid"];

if (isset($sid) && isset($tid)){
	echo json_encode(array("status" => "fuck you got me"));
	exit;
}


@ $id = $_GET["tid"];

$sql = "SELECT * FROM `players` WHERE `team_id`=$id";


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