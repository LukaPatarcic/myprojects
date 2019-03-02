<?php
 require_once "Database.php";

 $db = new Database("localhost","ajax","root","");
 $conn = $db->getConnection ();
 $query = $conn->query ("SELECT * FROM users;");

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

<form action="ajax.php" method="post">
    <input name="search" type="text">
    <button type="submit" name="submit">Search</button>
</form>

<h1 id="result">

</h1>

<script src="jquery.js"></script>
<script>
    $(document).ready(function ()
    {
        $('form').submit(function (e)
        {
            var that = $(this);
            e.preventDefault();
            var action = that.attr('action');
            var meth = that.attr('method');
            var serializedData = that.serialize();
            console.log(action);
            $.ajax({
                url:action,
                method: meth,
                data : serializedData,
                success: function (response) {
                    alert(response);
                }
            })
        })
    })
</script>
</body>
</html>
