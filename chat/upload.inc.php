<?php
require "database.inc.php";

$fileName = $_FILES['picture']['name'];
$fileNameTmp = $_FILES['picture']['tmp_name'];
$fileSize = $_FILES['picture']['size'];
$fileError = $_FILES['picture']['error'];
$fileType = $_FILES['picture']['type'];

if($fileType != "image/jpeg"){
    header ("Location: index.php?error");
    exit();
}
$fileDestination = "uploads/".$fileName;
move_uploaded_file ($fileNameTmp,$fileDestination);
echo "file uploaded!";

$sql = "INSERT INTO picture(picture_name) VALUES ('$fileName');";
$query = mysqli_query ($connect,$sql);
$check = mysqli_affected_rows ($connect);
if(!$check){
    echo "not successful";
}