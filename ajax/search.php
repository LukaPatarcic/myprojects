<?php
require "database.inc.php";
$search = $_POST['search'];
$sql = "SELECT * FROM users WHERE user_name LIKE '%{$search}%';";
$query = mysqli_query($connect,$sql);
while($result = mysqli_fetch_assoc($query)){
    echo $result['user_name']."<br>";
}
