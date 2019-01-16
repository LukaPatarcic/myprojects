<?php
require "database.inc.php";
$search = $_POST['search'];
$sql = "SELECT * FROM users WHERE user_name LIKE '%{$search}%';" or ;
$query = mysqli_query($connect,$sql);
while($result = mysqli_fetch_assoc($query)){
    echo "Name: ".$result['user_name']." Email: ".$result['user_email']."<br>";
}
