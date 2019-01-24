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
<form method="post" action="upload.inc.php" enctype="multipart/form-data">
    <input type="file" name="picture">
    <button type="submit" name="submit">Upload</button>
</form>
<?php
require "database.inc.php";
$sql = "SELECT * FROM picture;";
$query = mysqli_query ($connect,$sql);
while($result = mysqli_fetch_assoc ($query)){
    echo "<img src=\"uploads/{$result['picture_name']}\" width=\"50\">";
}
?>

</body>
</html>
