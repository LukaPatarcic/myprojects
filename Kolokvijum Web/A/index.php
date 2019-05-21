<?php
 require_once 'db_config.php';
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

<form id="forma">
    <h1>Fill your order</h1>
    <h2>Choose one of our delicious plates</h2>
    <select id="plate">
        <option value="">Choose a plate</option>
        <?php
            $sql = "SELECT * FROM menus";
            $query = mysqli_query($conn,$sql);
            $results = mysqli_fetch_all($query,MYSQLI_ASSOC);

            foreach ($results as $result) {
                echo "<option value='{$result['id']}'>{$result['title']} - {$result['price']}$</option>";
            }
        ?>
    </select>
    <p id="plateError"></p>
    <h2>Please choose one delivery date</h2>
    <select id="date">
        <option value="">Choose a delivery date</option>
        <?php
        $sql = "SELECT * FROM free_delivery_dates WHERE delivery_date >= CURDATE()";
        $query = mysqli_query($conn,$sql);
        $results = mysqli_fetch_all($query,MYSQLI_ASSOC);

        foreach ($results as $result) {
            echo "<option value='{$result['id']}'>{$result['delivery_date']}</option>";
        }
        ?>
    </select>
    <p id="dateError"></p>
    <label>Notes</label><br>
    <textarea id="text"></textarea><br>
    <p id="textError"></p>
    <button>Send order</button>
</form>

<script src="assets/js/scripts.js"></script>
</body>
</html>