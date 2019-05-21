<?php
include "db_config.php";
$field = "";
$value = "";

if (isset($_GET['field']))
    $field = trim($_GET['field']);

if (isset($_GET['value']))
    $value = trim($_GET['value']);

if (!empty($field) AND !empty($value)) {
    $sql = "SELECT * FROM users WHERE $field='$value'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo $record['id_user'].".".$record['name'].", ".$record['position']." ".$record['salary']."<br >";
        }
    }
} else
    echo "";
