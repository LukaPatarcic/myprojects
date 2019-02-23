<?php 
    require "includes/db_config.php";
    session_start();    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(!isset($_SESSION['username'])){
    header ("index.php");
    exit();
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Welcome <?= $_SESSION['username'] ?></h1>            
        </div>
        <div class="col-sm-4 offset-2">
            <img src="uploads/<?= $_SESSION['user_picture']?>" width="200" alt="<?= $_SESSION['username']?> picture">
        </div>
        <div class="col-sm-4">
            <span>USERNAME: <?= $_SESSION['username'] ?></span><br>
            <span>EMAIL: <?= $_SESSION['user_email'] ?></span><br>
            <span>JOINED: <?= $_SESSION['user_created'] ?></span><br>
        </div>

    </div>
</div>

</body>
</html>