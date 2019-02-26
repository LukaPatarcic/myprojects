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
        $stmt = $this->database_connect ()->query("INSERT INTO users(user_name,user_password) VALUES ('$this->username','$this->password');");

    }
    public static function validate($var){
        if(!preg_match ("/^[a-zA-Z]*$/",$var)){
            header ("Location: index.php?error");
            exit();
        }
    }
    public function espaceString($var){
        $var = real_escape_string ($var);
        return $var;
    }

}
$username = new mysqli();
//$username = $_POST['username'];
$username->real_escape_string($_POST['username']);
$obj = new User($_POST['username'],$_POST['password']);
$obj->setUsers();