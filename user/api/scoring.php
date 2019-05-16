<?php

header('Access-Control-Allow-Origin: *');	
include "../../includes/db.php";

@$data = $_POST["data"];
@$data = json_decode($data, true);

$tableMap = array(
	'good1' => "free_throw", 
	'bad1' => "free_throw_missed", 
	'good2' => "two_points", 
	'bad2' => "two_points_missed", 
	'good3' => "three_points", 
	'bad3' => "three_points_missed", 
	'assist' => "assist", 
	'defRebound' => "d_rebound", 
	'offRebound' => "o_rebound", 
	'steal' => "steals", 
	'foul' => "foul", 
	'block' => "blocks",
	'turnOver' => "turn_over", 
);

@ $targetCol = $tableMap[$data["column"]];
@ $targetPlayer = $data["player"];
@ $score = $data["score"];
@ $sid = $data["sid"];

$sql = "
		INSERT INTO `score_info` (`player_id`, `$targetCol`, `sched_id`) VALUES ( $targetPlayer, $score, $sid)
			ON DUPLICATE KEY UPDATE `$targetCol` = $score";			

mysqli_query($conn, $sql);

echo json_encode(array("sql" => $sql));
exit;