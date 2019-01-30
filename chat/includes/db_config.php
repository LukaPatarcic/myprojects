<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "chat room";
$connect = mysqli_connect ($host,$username,$password,$database);
if(!$connect){
    header("Location: error.php");
    die();
}