<?php
require "database.inc.php";
foreach ($_POST as $key => $value){
    ${$key} = mysqli_real_escape_string ($connect,trim($value));
}
$error = [];
if(empty($name) or empty($email) or empty($phone)){
    exit("some of the fields are empty");
}
if(!empty($hidden)){
    exit("Oops something went wrong! Please try again later");
}
if(!preg_match ("/^[a-zA-Z]*$/",$name)){
    exit("Only letters in the name field");
}
if(strlen ($name) > 30){
    exit("Max character of name is 30");
}
if(!filter_var ( $email,FILTER_VALIDATE_EMAIL)){
    exit("Email is not valid");
}
if(!preg_match ("/^[0-9\/-]*$/",$phone)){
    exit("Phone number is not valid!");
}
$sql = "INSERT INTO users(user_name,user_email,user_phone) VALUES ('$name','$email','$phone');";
$query = mysqli_query ($connect,$sql);
if(!$query){
    exit("Registration unsuccessful!");
}
exit("Registration successful");