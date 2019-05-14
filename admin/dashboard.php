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
                <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="account_settings.php">Account Settings</a>
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
            <a href="#" class="btn btn-outline-primary"  style="float:right" data-toggle="modal" data-target="#add" id="add-btn">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
     <?php
        // Message kapag nag add
        if(isset($_GET["success"])){
            echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Success</strong> Data Successfully Added!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }

        // Message kapag nag add
        if(isset($_GET["successUpdate"])){
            echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Success</strong> Data Successfully Updated!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }

        // Message kapag nag delete
        if(isset($_GET["successDelete"])){
            echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        <strong>Success</strong> Data Successfully Deleted from the database!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    ?>

    <table class="table table-striped text-center" id="tour-table">
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
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit info">
                                    <button class="btn btn-outline-info edit-btn" data-toggle="modal" data-target="#add"
                                    data-id="'.$row['id'].'">
                                        <i class="fas fa-pen-alt"></i>
                                    </button>
                                </span>
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-outline-danger delete-btn" data-toggle="modal" data-target="#delete"
                                    data-id="'.$row["id"].'">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </span>
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="View more">
                                    <a href="team.php?tourID='.$row["id"].'" class="btn btn-outline-warning">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>
                                </span>
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
                <h5 class="modal-title">Add Tournament: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/dashboard_function.php" method="post">
                    <input type="hidden" id="tourID" name="tourID" value="">
                    <div class="form-group">
                        <label for="tournament-name">Name</label>
                        <input type="text" class="form-control" id="tournament-name" placeholder="Enter tournament name"
                        name="name" required="required" value="">
                    </div>
                    <div class="form-group">
                        <label for="commissioner">Commissioner</label>
                        <input type="text" class="form-control" id="commissioner" placeholder="Enter commissioner"
                        name="comm" required="required" value="">
                    </div>

                    <div class="form-group">
                        <label for="commissioner">Referee</label>
                        <input type="text" class="form-control" id="ref-one" placeholder="Enter Referee name"
                        name="refone" required="required" value="">
                    </div>
                    <div class="form-group">
                        <label for="commissioner">Referee</label>
                        <input type="text" class="form-control" id="ref-two" placeholder="Enter Referee name"
                        name="reftwo" required="required" value="">
                    </div>

                    <div class="form-group">
                        <label for="commissioner">Referee</label>
                        <input type="text" class="form-control" id="ref-three" placeholder="Enter Referee name"
                        name="refthree" required="required" value="">
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="float: right" name="add"
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
                <form action="functions/dashboard_function.php" method="post">
                    <input type="hidden" id="deleteID" name="tourID" value="">
                    <p>Are you sure you want to remove this tournament permanently from the database ?</p>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="float:right;" name="delete_btn">Yes</button>
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
    // Function for tooltip
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    // Datatable function
    $("#tour-table").dataTable();

    $("#add-btn").on("click", function(){
        $("#tournament-name").val("");
        $("#commissioner").val("");
        $("#ref-one").val("");
        $("#ref-two").val("");
        $("#ref-three").val("");

        $("#add").find(".modal-title").text("Add tournament");
        $("#add-edit-btn").attr("name","add");
    });

    // Function to output the data in modal
    $(".edit-btn").on("click", function(){
        const tourID = $(this).data("id");

        $.post("functions/dashboard_function.php", {
            tourID: tourID,
            action: 'getTournamentInfo'
        })
            .done(function (data){
                const response = JSON.parse(data);
                $("#tournament-name").val(response[0]["name"]);
                $("#commissioner").val(response[0]["comissioner"]);
                $("#ref-one").val(response[0]["ref_one"]);
                $("#ref-two").val(response[0]["ref_two"]);
                $("#ref-three").val(response[0]["ref_three"]);
                $("#tourID").val(tourID);

                $("#add-edit-btn").attr("name","edit_btn");
            })
            .always(function (){
                $("#add").find(".modal-title").text("Edit tournament");
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