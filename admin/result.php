<?php
$tourID = $_GET["tourID"];
include("../includes/db.php");
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
<!-- Table -->
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
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
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
            <h3>Results</h3>
        </div>

    </div>

    <div class="row mb-3">
        <div class="col">
            <h4>Player Statistics</h4>
        </div>

    </div>

    <table class="table table-striped text-center" id="team-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Position</th>
                <th scope="col">Team</th>
                <th scope="col">PPG</th>
                <th scope="col">FG</th>
                <th scope="col">3PT FG</th>
                <th scope="col">Free Throw FG</th>
                <th scope="col">RPG</th>
                <th scope="col">Off RPG</th>
                <th scope="col">Def RPG</th>
                <th scope="col">BPG</th>
                <th scope="col">SPG</th>
                <th scope="col">APG</th>
                <th scope="col">FPG</th>
                <th scope="col">TO PG</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $counter = 0;
              $playerctr = 0;
              $final = array();
              $result = array("id" => 0, "ft" => 0, "ftm" => 0, "2pts" => 0, "2ptsm" => 0, "3pts" => 0, "3ptsm" => 0, "blk" =>0, "stl" => 0, "ast" => 0, "oreb" => 0, "dreb" => 0, "foul" => 0, "to" => 0 );

            for($i = 1; $i<100;$i++){
                 $sql = "SELECT * FROM score_info WHERE tour_id = '$tourID' AND player_id = '$i'";
                 echo $sql;
                 exit;
                 $select = mysqli_query($conn,$sql);
                 if(mysqli_num_rows($select)>0) {
                    $playerctr++;
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

                    $total2 = $result['2pts'] * 2;
                    $total3 = $result['3pts'] * 3;
                    $total_points = $result['ft'] + $total2 + $total3;
                    $total_points_ave  = (@($total_points / $counter));
                    $total_fg = (@($result['2pts'] + $result['2ptsm'] + $result['3pts'] + $result['3ptsm'])/($result['2pts'] + $result['3pts'] ))*100;
                    $total_fg_ave = (@($total_fg/$counter));
                    $tpts =  (@(($result['3pts']+$result['3ptsm'])/$result['3pts'])*100);
                    $tptsfg =  (@($tpts/$counter));
                    $ft =  (@(($result['ft']+$result['ftm'])/$result['ft'])*100);
                    $total_ft_ave = (@($ft/$counter));
                    $rbpg = $result['oreb']+$result['dreb'];
                    $to = (@($result['to']/$counter));


                    array_push($final,array(
                              "ID"             => $i,
                              "PPG"            => round($total_points_ave,2),
                              "FG"             => round($total_points_ave,2),
                              "3PT_FG"         => round($tptsfg,2),
                              "Free_Throw_FG"  => round($total_ft_ave,2),
                              "RPG"            => round($rbpg,2),
                              "OffRPG"         => round($result['oreb'],2),
                              "DefRPG"         => round($result['dreb'],2),
                              "BPG"            => round($result['blk'],2),
                              "SPG"            => round($result['stl'],2),
                              "APG"            => round($result['ast'],2),
                              "FPG"            => round($result['foul'],2),
                              "TOPG"           => round($to,2)
                        )
                      );
                }else{
                    continue;
                }
            }



            for($j = 0;$j<$playerctr;$j++){
                  $select_player = mysqli_query($conn,"SELECT * FROM `players` WHERE `id` = '".$final[$j]['ID']."'");
                  $row = mysqli_fetch_array($select_player);
                  //$select_team = mysqli_query($conn,"SELECT * FROM `teams` WHERE `id` = '".$row['team_id']."'");
                  //$row2 = mysqli_fetch_array($select_team);
                     echo "
                     <tr>
                      <th scope='row'>".$j."</th>
                      <td>".$row['first_name']."</td>
                      <td>".$row['last_name']."</td>
                      <td>".$row['position']."</td>
                      <td>team name</td>
                      <td>".$final[$j]['PPG']."</td>
                      <td>".$final[$j]['FG']."</td>
                      <td>".$final[$j]['3PT_FG']."</td>
                      <td>".$final[$j]['Free_Throw_FG']."</td>
                      <td>".$final[$j]['RPG']."</td>
                      <td>".$final[$j]['OffRPG']."</td>
                      <td>".$final[$j]['DefRPG']."</td>
                      <td>".$final[$j]['BPG']."</td>
                      <td>".$final[$j]['SPG']."</td>
                      <td>".$final[$j]['APG']."</td>
                      <td>".$final[$j]['FPG']."</td>
                      <td>".$final[$j]['TOPG']."</td>
                    </tr>";
            }


            ?>
        </tbody>
  </table>
  </div>
  </body>
</html>
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
