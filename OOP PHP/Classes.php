<?php

class dbConnect{

    private  $host;
    private  $user;
    private  $password;
    private  $database;
    private $charset;

    public function database_connect(){
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "oop";
        $this->charset = "utf8mb4";

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage ();
        }
    }

}


