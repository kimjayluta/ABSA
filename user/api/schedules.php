<?php

header('Access-Control-Allow-Origin: *');	
include "../../includes/db.php";

$sql = "SELECT 	s.id AS id, 
				t1.name AS team_one,
				t1.id AS t1_id,
				t2.name AS team_two,
				t2.id AS t2_id,
		        s.date,
		        s.time,
		        s.game_type
		 FROM `schedule` s LEFT JOIN `teams` t1 ON (t1.id = s.teamone_id ) 
			LEFT JOIN `teams` t2 ON (t2.id = s.teamtwo_id )";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	exit;
}

echo json_encode(array("status" => "not_found"));
exit;