<?php


include("../includes/db.php");
$tourID = $_GET["tourID"];

// Get all of the schedules for the final according to the current tournament
$sql = "SELECT `teamone_id`, `teamtwo_id` FROM `schedule` WHERE `game_type`='finals' AND `tour_id`='$tourID'";
$result = mysqli_query($conn,$sql);

$teamsToDisplay = array(); // List of teams but can have duplicate values
while ($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	array_push($teamsToDisplay, $row["teamone_id"]);
	array_push($teamsToDisplay, $row["teamtwo_id"]);
}

$gamesPerTeam =  array_count_values($teamsToDisplay);
$uniqueTeamsToDisplay = array_unique($teamsToDisplay);

// Loop the teams to get the players according to the teams within the schedules
$allPlayersData = array();
foreach($uniqueTeamsToDisplay as $team) {
	$sql = "
	SELECT 
		CONCAT(p.`first_name`, ' ', p.`last_name`) AS name, p.`position`, p.`jersey_num`, p.`team_id`,
		
		((SUM(si.`free_throw`)+SUM(si.`two_points`)+SUM(si.`three_points`)) /  (SUM(si.`free_throw`)+SUM(si.`two_points`)+SUM(si.`three_points`) + SUM(si.`free_throw_missed`)+SUM(si.`two_points_missed`)+SUM(si.`three_points_missed`))) as field_goal,
		
		(SUM(si.`free_throw`)+SUM(si.`two_points`)+SUM(si.`three_points`)) /$gamesPerTeam[$team] as ppg,
		
		((SUM(si.`three_points`)) /  (SUM(si.`three_points`)+SUM(si.`three_points_missed`))) as three_fg,
		
		((SUM(si.`free_throw`)) /  (SUM(si.`free_throw`)+SUM(si.`free_throw_missed`))) as free_fg,
		
		((SUM(si.`o_rebound`)+SUM(si.`d_rebound`)) /$gamesPerTeam[$team]) as rfg,
		((SUM(si.`o_rebound`)) /$gamesPerTeam[$team]) as orfg,
		((SUM(si.`d_rebound`)) /$gamesPerTeam[$team]) as drfg,
		((SUM(si.`blocks`)) /$gamesPerTeam[$team]) as bfg,
		((SUM(si.`steals`)) /$gamesPerTeam[$team]) as sfg,
		((SUM(si.`assist`)) /$gamesPerTeam[$team]) as afg,
		((SUM(si.`turn_over`)) /$gamesPerTeam[$team]) as tfg
		FROM `players` p
	    INNER JOIN `score_info` si ON (si.`player_id` = p.`id`)
	    
	WHERE p.`tour_id`='$tourID' AND p.`team_id`='$team'
	
  	GROUP BY si.`player_id`
	";

	$result = mysqli_query($conn,$sql);

	$data = array();
	while ($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}

	@ array_push($allPlayersData, ...$data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ABSA</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style3.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/fonts/navfont.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Data table -->
    <link rel="stylesheet" type="text/css" href="../css/datatables.css"/>
    <!-- Font Awesome JS -->
    <link rel="shortcut icon" href="#" />
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="account_settings.php">Account Settings</a>
            </li>
        </ul>
        <a href="../includes/logout_function.php?logout" class="btn btn-outline-primary">LOGOUT</a>
    </div>
</nav>
<!-- Tournament name -->
<div>
    <h2 class="text-center mt-4" id="tournament-name" data-id="<?php echo $tourID?>"></h2>
</div>

<div class="container mt-2">
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="team.php?tourID=<?php echo $tourID?>">Teams</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="schedule.php?tourID=<?php echo $tourID?>">Schedule</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="user.php?tourID=<?php echo $tourID?>">User</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#"
            role="button" aria-haspopup="true" aria-expanded="false">Results</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="result.php?tourID=<?php echo $tourID?>">Elimination Result</a>
                <a class="dropdown-item" href="final_result.php?tourID=<?php echo $tourID?>">Final Result</a>
                <a class="dropdown-item" href="best_player.php?tourID=<?php echo $tourID?>">Best Players</a>
            </div>
        </li>
    </ul>


    <div class="row mb-2">
        <div class="col">
            <h3>Finals Result</h3>
        </div>
        <div class="col"></div>
    </div>

    <table class="table mb-5">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Team</th>
                <th scope="col">PPG</th>  <!--Points per Game-->
                <th scope="col">FG</th>  <!--Field Goal-->
                <th scope="col">3PTs FG</th> <!--3pts Field Goal-->
                <th scope="col">Free throw FG</th>
                <th scope="col">RFG</th> <!--Rebound-->
                <th scope="col">Off RFG</th>
                <th scope="col">Def RFG</th>
                <th scope="col">BPG</th> <!--block per game-->
                <th scope="col">SPG</th> <!--steal per game-->
                <th scope="col">APG</th> <!--assist per game-->
                <th scope="col">To FG</th> <!--Turn over-->
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($allPlayersData as $row){
				echo "
	            <tr>
	                <td>". $row["name"] ."</td>
	                <td>". $row["position"] ."</td>
	                <td>". $row["team_id"] ."</td>
	                <td>". round($row["ppg"],2). "</td>
	                <td>". round($row["field_goal"]*100,2). "%</td>
	                <td>". round($row["three_fg"]*100,2). "%</td>
	                <td>". round($row["free_fg"]*100,2). "%</td>
	                <td>". round($row["rfg"],2). "</td>
	                <td>". round($row["orfg"],2). "</td>
	                <td>". round($row["drfg"],2). "</td>
	                <td>". round($row["bfg"],2). "</td>
	                <td>". round($row["sfg"],2). "</td>
	                <td>". round($row["afg"],2). "</td>
	                <td>". round($row["tfg"],2). "</td>
                </tr>
				";
            }
            ?>

        </tbody>
    </table>
</div>

<!-- Jquery JS -->
<script src="../js/jquery-3.3.1.min.js"></script>
<!-- Popper.JS -->
<script src="../js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="../js/bootstrap.js"></script>
<!-- Data table JS -->
<script type="text/javascript" src="../js/datatables.js"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>