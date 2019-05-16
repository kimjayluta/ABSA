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
            <a class="nav-link active" href="schedule.php?tourID=<?php echo $tourID?>">Schedule</a>
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
            <h3>Schedule List</h3>
        </div>
        <div class="col">
            <a href="#" class="btn btn-outline-primary"  style="float:right" data-toggle="modal" data-target="#add" id="add-btn">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <table class="table table-striped text-center" id="sched-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Team 1</th>
                <th scope="col">Team 2</th>
                <th scope="col">Game Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $sql = "SELECT * FROM schedule WHERE tour_id = '$tourID'";

                $result = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_array($result)){

                    $teamOneID = $row["teamone_id"];
                    $teamTwoID = $row["teamtwo_id"];
                    $sql = "SELECT name FROM teams WHERE id = $teamOneID OR id = $teamTwoID";
                    $res = mysqli_query($conn, $sql);
                    $data[] = mysqli_fetch_assoc($res);
                    $data[] = mysqli_fetch_assoc($res);



                    echo '<tr>
                            <th scope="row">'.$count++.'</th>
                            <td>'.$row["date"].'</td>
                            <td>'.$row["time"].'</td>
                            <td>'.$data[0]["name"].'</td>
                            <td>'.$data[1]["name"].'</td>
                            <td>'.$row["game_type"].'</td>
                            <td>
                                <button class="btn btn-outline-success" data-toggle="modal" data-target="#view-info">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </button>
                                <button class="btn btn-outline-info edit-btn" data-toggle="modal" data-target="#add" data-id="'.$row["id"].'">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button class="btn btn-outline-danger delete-btn" data-toggle="modal" data-target="#delete"
                                data-id="'.$row["id"].'">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <a href="player.php?tourID='.$row["tour_id"].'&teamID='.$row["id"].'" class="btn btn-outline-warning">
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
                <h5 class="modal-title">Add Schedule: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/schedule_function.php" method="post">
                    <input type="hidden" name="tourID" id="tourID" value="<?php echo $tourID;?>">
                    <input type="hidden" name="sched_id" id="sched_id">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                     <div class="form-group">
                        <label for="home">Home</label><br>
                        <select name="home" class="form-control" id="home">
                           <?php
                                $sql = "SELECT * FROM teams WHERE tour_id = $tourID";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)){
                                    echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                }
                           ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="away">Away</label><br>
                        <select name="away" class="form-control" id="away">
                           <?php
                                $sql = "SELECT * FROM teams WHERE tour_id = '$tourID'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result)){
                                    echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="game_type">Game Type</label><br>
                        <select name="game_type" class="form-control" id="game_type">
                            <option value="elimination">Elimination</option>
                            <option value="finals">Finals</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="float: right;" class="btn btn-primary"  name="add" id="add-edit-btn">Add Schedule</button>
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
                <form action="functions/schedule_function.php" method="post">
                    <input type="hidden" name="tourID" id="tourID" value="<?php echo $tourID;?>">
                    <input type="hidden" id="delete-sched-id" name="delete_sched_id">
                    <p>Are you sure to remove this tournament permanently from the database ? </p>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="sched_delete">Delete</button>
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
    $("#sched-table").dataTable();

    // getting the tournament id from h2 tag
    const tourID =$("#tournament-name").data("id");

    //  function para makua ang tournament name
    $.post("functions/dashboard_function.php", {
        tourID: tourID,
        action: "getTournamentInfo"
    })

        .done(function(data){
            const name = JSON.parse(data);
            $("#tournament-name").text(name[0]["name"]);
        });


    $("#add-btn").on("click", function(){
        $("#date").val("");
        $("#time").val("");
        $("#home").val("");
        $("#away").val("");
        $("#game_type").val("");

        $("#add").find(".modal-title").text("Add Schedule");
        $("#add-edit-btn").attr("name","add");
    });

    // Function to output the data in modal
    $(".edit-btn").on("click", function(){
        const schedID = $(this).data("id");
        $.post("functions/schedule_function.php", {
            id: schedID,
            action: 'getScheduleInfo'
        })
            .done(function (data){
                const response = JSON.parse(data);

                $("#date").val(response[0]["date"]);
                $("#time").val(response[0]["time"]);
                $("#home").val(response[0]["teamone_id"]);
                $("#away").val(response[0]["teamtwo_id"]);
                $("#game_type").val(response[0]["game_type"]);
                $("#sched_id").val(schedID);

                $("#add-edit-btn").attr("name","edit_btn");
            })
            .always(function (){
                $("#add").find(".modal-title").text("Edit Schedule");
            })
    });

    $(".delete-btn").on("click", function(){
        const deleteID = $(this).data("id");
        $("#delete-sched-id").val(deleteID);
    });




})
</script>
</body>
</html>