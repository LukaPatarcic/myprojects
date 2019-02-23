<?php
require "db_config.php";
$sql = "SELECT * FROM chats JOIN users on users.user_id = chats.user_id ORDER BY comment_datetime asc;";
$query = mysqli_query ($connect,$sql);
while($result = mysqli_fetch_assoc ($query)){
    echo "
        {$result['user_name']} said: <b>{$result['comment']}</b><br>
        <small>{$result['comment_datetime']}</small>
        <hr>
    ";
}
