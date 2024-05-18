<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "registration";

$conn = mysqli_connect($hostname,$username,$password,$database);

if(mysqli_connect_errno()){

    echo "Database connection error";
    die();
}
?>