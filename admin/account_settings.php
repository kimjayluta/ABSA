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
    <div class="card mx-auto" style="width: 50rem;">
        <div class="card-header">Change Username</div>
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="usn" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="usn" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" style="float:right;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mx-auto mt-5" style="width: 50rem;">
        <div class="card-header">Change Password</div>
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="old-pass" class="col-sm-3 col-form-label">Old Password</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" id="old-pass" placeholder="Old Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-pass" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" id="new-pass" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="retype-pass" class="col-sm-3 col-form-label">Re-type Password</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" id="retype-pass" placeholder="Re-type Password">
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" style="float:right;">Save Changes</button>
                </div>
            </form>
        </div>
    </div
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