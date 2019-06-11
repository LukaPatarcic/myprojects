<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "db_config.php";
    $mac = $_POST['mac'] ?? 'not set';
    $lat = trim($_POST['latitude']) ?? 'not set';
    $long = trim($_POST['longitude']) ?? 'not set';

    $sql = "SELECT * FROM location WHERE mac_address = '$mac'";
    $query = mysqli_query($connect,$sql);
    if($result = mysqli_fetch_row($query)) {
        $sql = "UPDATE location SET latitude='$lat',longitude='$long',is_active = 1 WHERE mac_address = '$mac'";
        $query = mysqli_query($connect,$sql);
        echo $lat.";".$long;
        exit;
    }
    $sql = "INSERT INTO location(latitude,longitude,mac_address) VALUES('$lat','$long','$mac')";
    $query = mysqli_query($connect,$sql);
    if(mysqli_num_rows($query) > 0) {
        echo $lat.";".$long;
    }
} else {
    echo json_encode(['Bad Request' => 1]);
}
