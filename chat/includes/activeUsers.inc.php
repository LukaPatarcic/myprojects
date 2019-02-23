<?php
require "db_config.php";
session_start ();

$sql = "SELECT * FROM users WHERE user_status = 1 and user_name <> '{$_SESSION['username']}';";
$query = mysqli_query($connect,$sql);
while($result = mysqli_fetch_assoc($query)){
    echo "
                    {$result['user_name']}<br>
                ";
}
