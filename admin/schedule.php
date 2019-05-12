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
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">LOGOUT</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <div class="row mb-2">
        <div class="col">
            <h3>Schedule List</h3>
        </div>
        <div class="col">
            <a href="#" class="btn btn-outline-primary"  style="float:right" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Home</th>
                <th scope="col">Away</th>
                <th scope="col">Game Type</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $sql = "SELECT schedule.* , teams.name FROM schedule,teams WHERE teams.id=schedule.teamone_id AND teams.id=schedule.teamtwo_id";
;
                $result = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_array($result)){
                    echo '<tr>
                            <th scope="row">'.$count++.'</th>
                            <td>'.$row["date"].'</td>
                            <td>'.$row["time"].'</td>
                            <td>'.$row["teamone_id"].'</td>
                            <td>'.$row["teamtwo_id"].'</td>
                            <td>'.$row["game_type"].'</td>
                            <td>
                                <button class="btn btn-outline-success" data-toggle="modal" data-target="#view-info">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </button>
                                <button class="btn btn-outline-info" data-toggle="modal" data-target="#add">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delete">
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
<!-- View Info -->
<div class="modal fade" id="view-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Tournament: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tournament-name">Name</label>
                        <input type="email" class="form-control" id="tournament-name" placeholder="Enter tournament name">
                    </div>
                    <div class="form-group">
                        <label for="commissioner">Commissioner</label>
                        <input type="text" class="form-control" id="commissioner" placeholder="Enter commissioner">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

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
                <form action="functions/team_function.php" method="post">
                    <input type="hidden" name="tourID" value="<?php echo $tourID?>">
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
                        <select name="home">
                            
                           <?php
                                $sql = "SELECT * FROM teams WHERE tour_id=$tourID";
                                $result = mysqli_query($conn, $sql);
                                $count = 1;
                               
                                while ($row = mysqli_fetch_array($result))
                                    {                                       
                                        echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
                                    }
                           ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="home">Away</label><br>
                        <select name="home">
                            
                           <?php
                                $sql = "SELECT * FROM teams WHERE tour_id=$tourID";
                                $result = mysqli_query($conn, $sql);
                                $count = 1;
                               
                                while ($row = mysqli_fetch_array($result))
                                    {                                       
                                        echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                           ?>

                        </select>
                    </div>
                     <div class="form-group">
                        <label for="game_type">Game Type</label><br>
                        <select name="game_type">
                            <option value="elimination">Elimination</option>
                            <option value="finals">Finals</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="float: right;" class="btn btn-primary"  name="add">Add Schedule</button>
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
                <p>Are you sure to remove this tournament permanently from the database ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
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
})
</script>
</body>
</html>