<?php

    $data = [
        "name" => $_POST['name'],
        "email" => $_POST['email']
    ];
    $jsonData = json_encode ($data,JSON_PRETTY_PRINT);
    file_put_contents ("test.json",$jsonData);



