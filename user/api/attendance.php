<?php

header('Access-Control-Allow-Origin: *');	

session_start();
include "../../includes/db.php";

@ $tid = $_POST["tid"];
@ $sid = $_POST["sid"];

if (isset($sid) && isset($tid)){
	@ $players = $_POST["players"];
	@ $players = explode(",", $players);

	if (@ count($players) > 0){
		for ($i=0; $i < count($players); $i++) { 
			$sql = "
				INSERT INTO `attendance` (`player_id`, `sched_id`) VALUES ( $players[$i], $sid)
				ON DUPLICATE KEY UPDATE player_id = player_id";
			mysqli_query($conn, $sql);
		}
	}

	echo json_encode(array("status" => "DONE"));
	exit;
}


@ $id = $_GET["tid"];

$sql = "SELECT * FROM `players` WHERE `team_id`=$id";
$result = mysqli_query($conn, $sql);

if (@ mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	exit;
}

echo json_encode(array("status" => "no_players"));
exit;