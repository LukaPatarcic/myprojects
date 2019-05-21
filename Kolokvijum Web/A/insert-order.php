<?php
require_once 'db_config.php';
if(isset($_POST['plate'])) {
    $plate = mysqli_real_escape_string($conn,$_POST['plate']);
}
if(isset($_POST['date'])) {
    $date = mysqli_real_escape_string($conn,$_POST['date']);
}
if(isset($_POST['text'])) {
    $text = mysqli_real_escape_string($conn,trim($_POST['text']));
}
$sql = "SELECT * FROM menus WHERE id = $plate;";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_row($query);
if(!$result) {
    echo "Oops something went wrong...";
    exit;
}
$sql = "SELECT * FROM free_delivery_dates WHERE id = $date;";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_row($query);
if(!$result) {
    echo "Oops something went wrong...";
    exit;
}
if(strlen($text) >= 122) {
    echo "Max length is 122 characters";
    exit;
}

$sql = "INSERT INTO orders(id_menu,customer_note,id_delivery_date) VALUES('$plate','$text','$date');";
$query = mysqli_query($conn,$sql);

if(!mysqli_affected_rows($conn)) {
    echo "Error";
    exit;
}
echo "Your order is received! Please take a look at it again";
exit;
