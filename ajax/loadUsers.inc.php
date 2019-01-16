<?php
require "database.inc.php";
$number = mysqli_real_escape_string ($connect,$_POST['number']);
$number = (int)$number;

$sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT $number;";
$query = mysqli_query($connect,$sql);
if(!$query){
    echo "Query unsuccessful!";
    exit();
}
if(mysqli_num_rows ($query) < 1){
    echo "No users in database";
    exit();
}
while($result = mysqli_fetch_assoc($query)){
    echo "<div class='row' align='center'>";
    echo "<div class='col-sm-3'>{$result['user_name']}</div>
          <div class='col-sm-3 email'>{$result['user_email']}</div>
          <div class='col-sm-3'>{$result['user_phone']}</div>
          <div class='col-sm-3'>
          <button class='btn btn-primary delete' onclick='test(2);' type='submit'>DELETE</button>
          </div>
    ";
    echo "</div>
          <hr>
    ";
}
?>
