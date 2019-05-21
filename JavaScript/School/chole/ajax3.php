<?php
include "db_config.php";
$name = "";
$position = "";


if (isset($_POST['name']))
    $name = mysqli_real_escape_string($connection, $_POST['name']);

if (isset($_POST['position']))
    $position = mysqli_real_escape_string($connection, $_POST['position']);

if (!empty($name) AND !empty($position)) {
    $sql = "INSERT INTO users (name,position) VALUES ('$name','$position')";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
}

$sql = "SELECT * FROM users ORDER BY id_user ASC";
$result = mysqli_query($connection, $sql) or die(mysqli_error($conenction));

if (mysqli_num_rows($result) > 0) {
    while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "$record[id_user]. $record[name], $record[position] <br>";
    }
}
