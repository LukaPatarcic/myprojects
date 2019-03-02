<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 3/1/2019
 * Time: 4:08 PM
 */

class Database
{
    private $host;
    private $dbname;
    private $user;
    private $pass;

    public function __construct($host,$dbname,$user,$pass)
    {
        $this->user = $user;
        $this->host = $host;
        $this->dbname = $dbname;
        $this->pass = $pass;
    }

    public function getConnection(): PDO
    {
        return $db = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user","$this->pass");
    }

}