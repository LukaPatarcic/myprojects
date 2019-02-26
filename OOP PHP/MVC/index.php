<?php

    require_once "Configuration.php";
    require_once "vendor/autoload.php";
    use App\Core\DatabaseConnection;
    use App\Core\DatabaseConfiguration;
    use App\Controllers\MainController;


    $databaseConfiguration = new DatabaseConfiguration(
        Configuration::DATABASE_HOST,
        Configuration::DATABASE_USER,
        Configuration::DATABASE_PASSWORD,
        Configuration::DATABASE_NAME
    );

    $databaseConnection = new DatabaseConnection($databaseConfiguration);
/*
$db = $databaseConnection->getConnection ();
$userModel = new UserModel($databaseConnection);

$user = $userModel->getByID (12543);
print_r ($user);

$data = file_get_contents ('names.json');
$json = json_decode ($data,true);


$prep = $db->prepare ("INSERT INTO users(user_name) VALUES(?)");
foreach ($json as $key=>$value){
        $exec = $prep->execute ([$value]);
}

    $prep = $db->prepare ("SELECT * FROM users;");
    $exec = $prep->execute ();
    $result = $prep->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r ($result);
    echo "</pre>";
    */
    $controller = new MainController($databaseConnection);
    $controller->home();
    $data = $controller->getData ();

    foreach ($data as $key => $value){
        $$key = $value;
    }

    require_once 'views/Main/home.php';