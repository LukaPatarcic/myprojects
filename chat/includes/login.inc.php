<?php
require "../includes/db_config.php";
session_start ();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE user_name = '$username';";
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
$sql = "UPDATE users SET user_status = 1 WHERE user_name = '$username'";
$query = mysqli_query ($connect,$sql);

$_SESSION['username'] = $result['user_name'];
$_SESSION['user_picture'] = $result['user_picture'];
$_SESSION['user_email'] = $result['user_email'];
$_SESSION['user_created'] = $result['user_created'];
$_SESSION['user_id'] = $result['user_id'];


echo "Logged in!";
exit();
