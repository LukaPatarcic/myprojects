<?php
header("Content-Type: application/json");
require_once "db_config.php";
$sql = "SELECT * FROM location;";
$query = mysqli_query($connect,$sql);
$result = mysqli_fetch_all($query,MYSQLI_ASSOC);
echo json_encode($result);