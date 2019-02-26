<?php
define('SECURE','ehth453jhuredsfg4385t412hy5');
require "Classes.php";
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
try{
    require "Classes.php";
    $sql = "SELECT * FROM users";
    $rows = $db->query ($sql);
    $error = $db->errorInfo ();
    $count = $rows->rowCount();

    $sql = "INSERT INTO users(user_name,user_password) VALUES (:user_name,:user_password);";
    $insert = $db->prepare($sql);
    $var = 2;
    $insert->bindValue (':user_name','PHP');
    $insert->bindParam (':user_password',$var,PDO::PARAM_INT);
    $insert->execute ();
    $lastID = $db->lastInsertId ();
    $sql = "SELECT * FROM users WHERE user_id=$lastID;";
    $lastUser = $db->query ($sql);
    $result = $lastUser->fetch (PDO::FETCH_ASSOC);
    echo "ID: ".$lastID."<br>";
    echo "NAME:".$result['user_name'];

    if(isset($error[2])){
        $errors = $error[2];
    }
} catch(Exception $e){
    //echo $error = $e->getMessage();
}
/*
echo $errors;
while($row = $rows->fetch(PDO::FETCH_ASSOC)){
    echo "<pre>";
    print_r ($row);
    echo "</pre>";
}
foreach ($db->query ($sql) as $row){
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}
print_r ($count);
*/
?>
</body>
</html>
