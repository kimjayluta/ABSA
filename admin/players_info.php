<?php
$tourID = $_GET["tourID"];
$teamID = $_GET["teamID"];
$playerID = $_GET["playerID"];
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
<div class="container mx-auto my-5" style="width: 30rem;">
    <div class="card text-center mt-5">
        <div class="playerinfo navbar-light  text-white">Players Information</div>
        <div class="card-body">
            <?php
                $sql = "SELECT * FROM players WHERE id = $playerID";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)){
                    $position  = "";
                    switch($row["position"]){
                        case "pg":
                            $position = "Point Guard";
                            break;
                        case "sg":
                            $position = "Shooting Guard";
                            break;
                        case "pf":
                            $position = "Power Forward";
                            break;
                        case "sf":
                            $position = "Shooting Forward";
                            break;
                        case "c":
                            $position = "Center";
                            break;
                        default;
                            $position = "Invalid";
                    }

                    echo '<form class="">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fn">First Name</label>
                                    <input type="text" class="form-control text-center" value="'.$row["first_name"].'" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ln">Last Name</label>
                                    <input type="text" class="form-control text-center" value="'.$row["first_name"].'" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="jers_num">Jersy Number</label>
                                    <input type="number" class="form-control text-center" value="'.$row["jersey_num"].'" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="weight">Weight</label>
                                    <input type="number" class="form-control text-center" value="'.$row["height"].'" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="height">Height</label>
                                    <input type="number" class="form-control text-center" value="'.$row["weight"].'" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="position">Position</label>
                                <input type="text" class="form-control text-center" value="'.$position.'" disabled>
                            </div>
                            <a href="player.php?tourID='.$tourID.'&teamID='.$teamID.'&playerID='.$playerID.'"
                            class="btn btn-danger btn-sm" style="float:left;">close</a>
                        </form>';
                }
            ?>
        </div>
    </div>
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
<script>
$(document).ready(function(){
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    // Datatable function
    $("#players-table").dataTable();
    // Getting the tournament id from h2 tag
    const tourID = $("#tournament-name").data("id");
    // Function para makua ang tournament name
    $.post("functions/dashboard_function.php", {
        tourID: tourID,
        action: "getTournamentInfo"
    })
        .done(function(data){
            const name = JSON.parse(data);
            $("#tournament-name").text(name[0]["name"]);
        });
})
</script>
</body>
</html>