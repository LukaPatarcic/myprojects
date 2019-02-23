<?php
require "db_config.php";
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string ($connect, trim ($_POST['username']));
    $email = mysqli_real_escape_string ($connect, trim ($_POST['email']));
    $password = mysqli_real_escape_string ($connect, trim ($_POST['password']));
    $passwordCheck = mysqli_real_escape_string ($connect, trim ($_POST['passwordCheck']));
    $picture = $_FILES['picture'];
    $pictureName = $_FILES['picture']['name'];
    $pictureTmp = $_FILES['picture']['tmp_name'];
    $pictureSize = $_FILES['picture']['size'];
    $pictureType = $_FILES['picture']['type'];

    if (empty($username) or empty($password) or empty($email)) {
        echo "Please fill out all the required fields";
        exit();
    }
    if(!empty($picture)){
        if(sizeof ($pictureName) > 50 or $pictureSize > 10000000 or ($pictureType !== 'image/jpeg' and $pictureType !== 'image/png')){
            echo "Bad picture format";
            exit();
        }
    }
    if(!preg_match ("/^[A-Za-z0-9]*$/",$username)){
        echo "Username should only contain letters and numbers";
        exit();
    }
    if(!filter_var ($email,FILTER_VALIDATE_EMAIL)){
        echo "Email format is not valid!";
        exit();
    }
    if($password !== $passwordCheck){
        echo "Passwords do not match!";
        exit();
    }
    $pictureDestination = "../uploads/".$pictureName;
    $upload = move_uploaded_file($pictureTmp,$pictureDestination);
    if(!$upload){
        echo "Upload failed";
        exit();
    }
    $passwordHash = password_hash ($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(user_name,user_password,user_email,user_picture,user_created) VALUES('$username','$passwordHash','$email','$pictureName',NOW())";
    $query = mysqli_query ($connect,$sql);
    if(mysqli_affected_rows ($connect) < 1){
        echo "Not inserted into database";
        exit();
    }
    echo "Registration successful";

}