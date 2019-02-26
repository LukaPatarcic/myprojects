<?php

    $db = new PDO("mysql:host=localhost;dbname=oop",'root','');
    $id = filter_input (INPUT_GET,'id');
    $select = '*';
    $from = 'users';
    $prep = $db->prepare('SELECT * FROM users WHERE user_name = ? or user_password = ?;');
    $exec = $prep->execute(['Luka','punopetica']);

    if($exec){
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r ($result);
        echo "</pre>";
    }