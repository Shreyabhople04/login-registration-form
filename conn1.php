<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "connection";

$conn = mysqli_connect($hostname,$username,$password,$database);

if(mysqli_connect_errno()){

    echo "Database connection error";
    die();
}

session_start();

?>