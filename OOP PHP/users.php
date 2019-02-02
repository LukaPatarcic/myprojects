<?php
require 'Classes.php';
class User extends dbConnect{
    private $username;
    private $password;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }
    public function echoUser(){
        echo $this->username."<br>";
        echo $this->password."<br>";
    }
    public function setUsers(){
        $stmt = $this->database_connect ()->query ("INSERT INTO users(user_name,user_password) VALUES ('$this->username','$this->password')");
    }

}

$obj = new User($_POST['username'],$_POST['password']);
$obj->setUsers();