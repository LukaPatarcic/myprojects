<?php
require "db_config.php";
session_start ();

if(isset($_POST['hidden'])){
    $message = mysqli_real_escape_string ($connect,$_POST['message']);
    $id = (int)$_SESSION['user_id'];
    $sql = "INSERT INTO chats(user_id,comment,comment_datetime) VALUES ($id,'$message',NOW());";
    $query = mysqli_query ($connect,$sql);
    if(!mysqli_affected_rows($connect)){
        echo "error";
        exit();
    }
    echo "success";
    exit();

}else{
    header ("../index.php?test");
    exit();
}