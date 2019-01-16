<?php
require "database.inc.php";
foreach ($_POST as $key => $value){
    ${$key} = mysqli_real_escape_string ($connect,trim($value));
}

if(empty($name) or empty($email) or empty($phone)){
    echo "Please fill in all the fields";
    exit();
}
if(!empty($hidden)){
    echo "Oops something went wrong! Please try again later";
    exit();
}
if(!preg_match ("/^[a-zA-Z]*$/",$name)){
    echo "Only letters in the name field";
    exit();
}
if(strlen ($name) > 30){
    echo "Max character of name is 30";
    exit();
}
if(!filter_var ( $email,FILTER_VALIDATE_EMAIL)){
    echo "Email is not vaild";
    exit();
}
if(!preg_match ("/^[0-9\/-]*$/",$phone)){
    echo "Phone number is not valid!";
    exit();
}
$sql = "INSERT INTO users(user_name,user_email,user_phone) VALUES ('$name','$email','$phone');";
$query = mysqli_query ($connect,$sql);
if(!$query){
    echo "Registraion unsuccessful!";
    exit();
}

echo "Registration successful";
exit();