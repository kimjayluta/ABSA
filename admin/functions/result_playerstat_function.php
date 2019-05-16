<?php
include("../../includes/db.php");


$counter = 0;
            $final = array();
            $result = array("id" => 0, "ft" => 0, "ftm" => 0, "2pts" => 0, "2ptsm" => 0, "3pts" => 0, "3ptsm" => 0, "blk" =>0, "stl" => 0, "ast" => 0, "oreb" => 0, "dreb" =>0, "foul" =>0, "to" => 0 );
            
            
                 $sql = "SELECT * FROM score_info WHERE tour_id = '$tourID' AND player_id = ";
                 $select = mysqli_query($conn,$sql);
                 $rowcount = 1;

                 if($select) {
                    $result['id']= $row["player_id"];
                    while($row = mysqli_fetch_array($select)){
                        $result['ft'] = $result['ft'] + $row["free_throw"];
                        $result['ftm'] = $result['ftm'] + $row["free_throw_missed"];
                        $result['2pts'] = $result['2pts'] + $row["two_points"];
                        $result['2ptsm'] = $result['2ptsm'] + $row["two_points_missed"];
                        $result['3pts'] = $result['3pts'] + $row["three_points"];
                        $result['3ptsm'] = $result['3ptsm'] + $row["three_points_missed"];
                        $result['blk'] = $result['blk'] + $row["blocks"];
                        $result['stl'] = $result['stl'] + $row["steals"];
                        $result['ast'] = $result['ast'] + $row["assist"];
                        $result['oreb'] = $result['oreb'] + $row["o_rebound"];
                        $result['dreb'] = $result['dreb'] + $row["d_rebound"];
                        $result['foul'] = $result['foul'] + $row["foul"];
                        $result['to'] = $result['to'] + $row["turn_over"];

                        $counter++;
                    }
                        // Points Per Game
                        $total2pts = $result['2pts'] * 2;
                        $total3pts = $result['3pts'] * 3;
                        $totalpoints = $total3pts + $total2pts + $result['ft'];

                        $pointsPerGame = $totalpoints / $counter; 

                        // Field Goals
                        $totalShotAttempt2pts = $result['2pts'] + $result['2ptsm'];
                        $totalShotAttempt3pts = $result['3pts'] + $result['3ptsm'];
                        $totalMade = $result['3pts'] + $result['2pts'];
                        $totalAttempts = $totalShotAttempt3pts + $totalShotAttempt2pts;
                       
                        $fieldGoal = $totalMade / $totalAttempts;

                        // 3pts Field Goals
                        $fieldGoal3pt = $result['3pts']  / $totalShotAttempt3pts;

                        // Free Throw Field Goal
                        $totalShotAttemptFT = $result['ft'] + $result['ftm'];

                        $fieldGoalFT = $result['ft'] / $totalShotAttemptFT;


                        // Rebounds per game
                        $totalRebounds = $result['oreb'] + $result['dreb'];
                        $reboundsPerGame = $totalRebounds / $counter; 

                        // Offensive Reb per game
                        $offReboundsPerGame = $result['oreb'] / $counter;

                        // Defensive Reb per
                        $defReboundsPerGame = $result['dreb'] / $counter;

                        // Blocks per game
                        $blocksPerGame = $result['blk'] / $counter;

                        // Steals per game
                        $stealsPerGame = $result['stl'] / $counter;

                        // Assists per game
                        $assistsPerGame = $result['ast'] / $counter;

                        // Fouls per game
                        $foulsPerGame = $result['foul'] / $counter;

                        // Turnovers per game
                        $turnoversPerGame = $result['to'] / $counter; 

                       // $sql = "SELECT first_name, last_name FROM players WHERE id =  "

?>