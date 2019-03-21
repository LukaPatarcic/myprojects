<?php
    namespace App\Core;

class DatabaseConfiguration{

    private $host;
    private $user;
    private $password;
    private $database;


    public function __construct(string $host,string $user,string $password,string $database){

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

    }

    public function getSource(): string {
        return "mysql:host={$this->host};dbname={$this->database};charset=utf8";
    }

    public function getUser(): string {
        return $this->user;
    }

    public function getPassword(): string {
        return $this->password;
    }

}