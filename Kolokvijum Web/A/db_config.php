<?php

$conn = mysqli_connect('localhost','root','','restaurant');
if(!$conn) {
    die('Error connecting to database');
}
