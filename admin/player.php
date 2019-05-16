<?php
    $tourID = $_GET["tourID"];
    $teamID = $_GET["teamID"];
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
            <a class="nav-link active" href="team.php?tourID=<?php echo $tourID?>">Teams</a>
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
            <h3>Player List</h3>
        </div>
        <div class="col">
            <a href="#" class="btn btn-outline-primary"  style="float:right" data-toggle="modal" data-target="#add" id="add-btn">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <table class="table table-striped text-center" id="players-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Position</th>
                <th scope="col">Jersey Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $sql = "SELECT * FROM players WHERE tour_id = $tourID AND team_id = $teamID";
                $result = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_array($result)){
                    echo '<tr>
                            <th scope="row">'.$count++.'</th>
                            <td>'.$row["first_name"].'</td>
                            <td>'.$row["last_name"].'</td>
                            <td>'.$row["position"].'</td>
                            <td>'.$row["jersey_num"].'</td>
                            <td>
                                <a href="players_info.php?tourID='.$tourID.'&teamID='.$teamID.'&playerID='.$row["id"].'"
                                class="btn btn-outline-success">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </a>
                                <button class="btn btn-outline-info edit-btn" data-toggle="modal" data-target="#add"
                                data-id="'.$row["id"].'">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button class="btn btn-outline-danger delete-btn" data-toggle="modal" data-target="#delete"
                                data-id="'.$row["id"].'">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <a href="schedule.php?tourID='.$row["id"].'" class="btn btn-outline-warning">
                                    <i class="fas fa-eye fa-lg"></i>
                                </a>
                            </td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!--------------------------------------------------------- Modals --------------------------------------------------------->
<!-- Add / Edit -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Player: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/player_function.php" method="post">
                    <input type="hidden" name="tourID" value="<?php echo $tourID?>">
                    <input type="hidden" name="playerID" id="player-id">
                    <input type="hidden" name="teamID" value="<?php echo $teamID?>">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="position" >Position</label><br>
                        <select name="position" class="form-control" id="position">
                            <option value="pg">Point Guard</option>
                            <option value="sg">Shooting Guard</option>
                            <option value="pf">Power Forward</option>
                            <option value="sf">Small Forward</option>
                            <option value="c">Center</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jersey_number">Jersey Number</label>
                        <input type="number" class="form-control" id="jersey_number" name="jersey_number" placeholder="XX">
                    </div>
                     <div class="form-group">
                        <label for="height">Height</label>
                        <input type="number" class="form-control" id="height" name="height" placeholder="Centimeter">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Kilos">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="float: right;" class="btn btn-primary" name="add"
                        id="add-edit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/player_function.php" method="post">
                    <input type="hidden" name="tour_id" value="<?php echo $tourID?>">
                    <input type="hidden" name="team_id" value="<?php echo $teamID?>">
                    <input type="hidden" name="player_id" id="deleteID" value="<?php echo $teamID?>">
                    <p>Are you sure to remove this tournament permanently from the database ? </p>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="delete-btn">Delete</button>
                    </div>
                </form>
            </div>
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

    $("#add-btn").on("click", function(){
        $("#first_name").val("");
        $("#last_name").val("");
        $("#position").val("");
        $("#jersey_number").val("");
        $("#height").val("");
        $("#weight").val("");

        $("#add").find(".modal-title").text("Add Player");
        $("#add-edit-btn").attr("name","add");
    });

    // Function to output the data in modal
    $(".edit-btn").on("click", function(){
        const tourID = $(this).data("id");

        $.post("functions/player_function.php", {
            tourID: tourID,
            action: 'getPlayerInfo'
        })
            .done(function (data){
                const response = JSON.parse(data);
                $("#first_name").val(response[0]["first_name"]);
                $("#last_name").val(response[0]["last_name"]);
                $("#position").val(response[0]["position"]);
                $("#jersey_number").val(response[0]["jersey_num"]);
                $("#height").val(response[0]["height"]);
                $("#weight").val(response[0]["weight"]);
                $("#player-id").val(response[0]["id"]);
                $("#team-id").val(response[0]["team_id"]);

                $("#add-edit-btn").attr("name","edit_btn");
            })
            .always(function (){
                $("#add").find(".modal-title").text("Edit Player");
            })
    });

    $(".delete-btn").on("click", function(){
        const deleteID = $(this).data("id");
        $("#deleteID").val(deleteID);
    });

})
</script>
</body>
</html>