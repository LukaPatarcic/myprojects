<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "db_config.php";
    $mac = $_POST['mac'] ?? 'not set';
    $lat = $_POST['latitude'] ?? 'not set';
    $long = $_POST['longitude'] ?? 'not set';

    $sql = "SELECT * FROM location WHERE mac_address = '$mac'";
    $query = mysqli_query($connect,$sql);
    if(mysqli_num_rows($query) > 0) {
        $sql = "UPDATE location SET latitude='$lat',longitude='$long' WHERE mac_address = '$mac'";
        $query = mysqli_query($connect,$sql);
        exit;
    }
    $sql = "INSERT INTO location(latitude,longitude,mac_address) VALUES('$lat','$long','$mac')";
    $query = mysqli_query($connect,$sql);
    echo $mac.'<br>';
    echo $lat.'<br>';
    echo $long.'<br>';
}
