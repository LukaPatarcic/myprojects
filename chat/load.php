<?php
require "includes/db_config.php";
$sql = "SELECT * FROM users";
$query = mysqli_query ($connect,$sql);

while($result = mysqli_fetch_assoc ($query)){
    echo "
           {$result['user_name']}
        ";
}
