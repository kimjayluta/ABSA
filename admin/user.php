<?php
    include("../includes/db.php");
    $tourID = $_GET["tourID"];
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
            <a class="nav-link active" href="user.php?tourID=<?php echo $tourID?>">User</a>
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
            <h3>User List</h3>
        </div>
        <div class="col">
            <a href="#" class="btn btn-outline-primary"  style="float:right" data-toggle="modal" data-target="#add" id="add-btn">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">User Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $sql = "SELECT * FROM user WHERE tour_id = $tourID";
                $result = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_array($result)){

                    $user_type  = "";
                    switch($row["user_type"]){
                        case 0:
                            $user_type = "Home main";
                            break;
                        case 1:
                            $user_type = "Away main";
                            break;
                        case 2:
                            $user_type = "Home extra";
                            break;
                        case 3:
                            $user_type = "Away extra";
                            break;
                        default;
                            $user_type = "Invalid";
                    }

                    echo '<tr>
                            <th scope="row">'.$count++.'</th>
                            <td>'.$row["usn"].'</td>
                            <td>'.$row["pass"].'</td>
                            <td>'.$user_type.'</td>
                            <td>
                                <button class="btn btn-outline-info edit-user" data-toggle="modal" data-target="#add"
                                data-id="'.$row["id"].'">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button class="btn btn-outline-danger delete-user" data-toggle="modal" data-target="#delete"
                                data-id="'.$row["id"].'">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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
                <h5 class="modal-title">Add User: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-body">
                <form action="functions/user_functions.php" method="post">
                    <input type="hidden" name="tourID" value="<?php echo $tourID?>">
                    <input type="hidden" name="userID" id="userID">
                    <div class="form-group">
                        <label for="usn">Username</label>
                        <input type="text" class="form-control" id="usn" name="usn"placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" class="form-control" id="pass" name="pass" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="user_type">User Type</label><br>
                        <select name="user_type" class="form-control" id="user-type">
                            <option value="0">Home Main</option>
                            <option value="1">Away Main</option>
<!--                             <option value="2">Home Extra</option>
                            <option value="3">Away Extra</option> -->
                        </select>
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
                <form action="functions/user_functions.php" method="post">
                    <input type="hidden" name="tourID" value="<?php echo $tourID?>">
                    <input type="hidden" name="deleteID" id="deleteID">
                    <p>Are you sure to remove this user permanently from the database ? </p>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="delete-btn" style="float: right;">Delete</button>
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
    })
    // Datatable function
    $("#team-table").dataTable();
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
        })

    $("#add-btn").on("click", function(){
        $("#usn").val("");
        $("#pass").val("");
        $("#user-type").val("");
        $("#userID").val("");
        $("#add").find(".modal-title").text("Add tournament");
        $("#add-edit-btn").attr("name","add");
    });

    // Function to output the data in modal
    $(".edit-user").on("click", function(){
        const userID = $(this).data("id");
        $.post("functions/user_functions.php", {
            id: userID,
            action: "getUSerInfo"
        })
            .done(function(data){

                const userInfo = JSON.parse(data);
                $("#usn").val(userInfo[0]["usn"]);
                $("#pass").val(userInfo[0]["pass"]);
                $("#user-type").val(userInfo[0]["user_type"]);
                $("#userID").val(userID);

                $("#add-edit-btn").attr("name","edit");
            })

            .always(function (){
                $("#add").find(".modal-title").text("Edit team");
            })
    });

    $(".delete-user").on("click", function(){
        const deleteID = $(this).data("id");
        $("#deleteID").val(deleteID);
    });
})
</script>
</body>
</html>