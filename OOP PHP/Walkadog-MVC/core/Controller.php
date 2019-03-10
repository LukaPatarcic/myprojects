<?php

namespace App\Core;


use App\Core\Session\Session;

class Controller{

    private $db;
    private $session;
    private $data = [];

    final public function __construct(DatabaseConnection &$db)
    {
        $this->db = $db;
    }

    final public function &getSession(): Session
    {
        return $this->session;
    }

    final public function setSession(Session $session)
    {
        $this->session = $session;
    }

    final public function &getDatabaseConnection(): DatabaseConnection
    {
        return $this->db;

    }

    final protected function set(string $name, $value): bool
    {
        $result = false;
        if(preg_match ("/^[a-z][a-z0-9]+(?:[A-Z][a-z0-9]+)*$/",$name)){
            $this->data[$name] = $value;
            $result = true;
        }
        return $result;
    }

    final public function getData(): array
    {
        return $this->data;
    }

}