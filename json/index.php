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
<form method="post" action="json.php">
    <input type="text" name="name">
    <input type="text" name="email">
    <button type="submit" name="submit">Send</button>
</form>
<?php
    $file = fopen ("titles.txt","r");
    $json = fread ($file,filesize ("titles.txt"));
    $encodedJSON = json_encode ($json);
    var_dump ($encodedJSON);
    fclose($file);
?>
<script src="script.js"></script>
</body>
</html>