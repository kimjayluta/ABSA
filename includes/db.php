<?php
// to get the databse connection
$conn = mysqli_connect('localhost','root','1b9392ebef12172af18fc10a3192c78997084d1ba1f72497','absa');

// Checker kung may error
if(mysqli_connect_error()){
    echo "Failed to connect into database " . mysqli_connect_error();
}
?>