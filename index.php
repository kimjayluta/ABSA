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
    <link rel="stylesheet" href="../css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Data table -->
    <link rel="stylesheet" type="text/css" href="../css/datatables.css"/>
    <!-- Font Awesome JS -->
    <link rel="shortcut icon" href="#" />
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>
</head>
<body>
<div class="container">
    <div class="card mx-auto my-5" style="width: 18rem;">
        <div class="card-body">
            <img src="img/IMG_20190509_114203.jpg" class="img-fluid" alt="Responsive image">
           <!-- login form -->
            <form action="includes/login_function.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" name="usn" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password:</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="required">
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
             <?php
                if(isset($_GET["error"])){
                    echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                             <strong>Error</strong> Username or Password is in correct!
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
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
</body>
</html>