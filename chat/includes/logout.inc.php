<?php
require "db_config.php";
session_start ();
session_unset ();
session_destroy ();
$username = mysqli_real_escape_string ($connect,$_POST['username']);
$sql = "UPDATE users SET user_status = 0 WHERE user_name = '$username'";
$query = mysqli_query ($connect,$sql);

