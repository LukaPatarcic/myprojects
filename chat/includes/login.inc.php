<?php
require "../includes/db_config.php";
session_start ();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT user_name,user_password FROM users WHERE user_name = '$username';";
$query = mysqli_query ($connect,$sql);
if($row = mysqli_num_rows ($query) < 1){
    echo "No Username in database";
    exit();
}
$result = mysqli_fetch_assoc ($query);
$verify = password_verify ($password,$result['user_password']);
if(!$verify){
    echo "Passwords do not match";
    exit();
}
$sql = "";
$_SESSION['username'] = $username;

echo "Logged in!";
exit();
