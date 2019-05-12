<?php
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
                <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Users</a>
            </li>
        </ul>
        <a href="../includes/logout_function.php?logout" class="btn btn-outline-primary">LOGOUT</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="row mb-2">
        <div class="col">
            <h3>Tournament List</h3>
        </div>
        <div class="col">
            <a href="#" class="btn btn-outline-primary"  style="float:right" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
     <?php
                if(isset($_GET["error"])){
                    echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                             <strong>Error</strong> Username or Password is in correct!
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                }
                if(isset($_GET["success"])){
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                             <strong>Success</strong> Data Successfully Added!
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                }
            ?>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Commissioner</th>
                <th scope="col">Referee One</th>
                <th scope="col">Referee Two</th>
                <th scope="col">Referee Three</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM tournament";
                $result = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_array($result)){
                    echo '<tr>
                            <th scope="row">'.$count++.'</th>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["comissioner"].'</td>
                            <td>'.$row["ref_one"].'</td>
                            <td>'.$row["ref_two"].'</td>
                            <td>'.$row["ref_three"].'</td>
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
                                <a href="team.php?tourID='.$row["id"].'" class="btn btn-outline-warning">
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
                <h5 class="modal-title">Add Tournament: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/dashboard_function.php" method="post">
                    <div class="form-group">
                        <label for="tournament-name">Name</label>
                        <input type="text" class="form-control" id="tournament-name" placeholder="Enter tournament name" name="name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="commissioner">Commissioner</label>
                        <input type="text" class="form-control" id="commissioner" placeholder="Enter commissioner" name="comm" required="required">
                    </div>

                    <div class="form-group">
                        <label for="commissioner">Referee</label>
                        <input type="text" class="form-control" id="commissioner" placeholder="Enter Referee name" name="refone" required="required">
                    </div>
                    <div class="form-group">
                        <label for="commissioner">Referee</label>
                        <input type="text" class="form-control" id="commissioner" placeholder="Enter Referee name" name="reftwo" required="required">
                    </div>

                    <div class="form-group">
                        <label for="commissioner">Referee</label>
                        <input type="text" class="form-control" id="commissioner" placeholder="Enter Referee name" name="refthree" required="required">
                    </div>
 
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="float: right" name="add">Save</button>
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
                <h5 class="modal-title">Add Tournament: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove this tournament permanently from the database ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    <form action='delete_function.php' method="post">Yes</form>
                </button>
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