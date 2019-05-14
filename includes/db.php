<?php
// to get the databse connection
$conn = mysqli_connect('localhost','root','','absa');

// Checker kung may error
if(mysqli_connect_error()){
    echo "Failed to connect into database " . mysqli_connect_error();
}
?>