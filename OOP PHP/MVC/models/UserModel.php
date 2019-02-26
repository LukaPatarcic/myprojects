<?php

namespace App\Models;
use \PDO;
use App\Core\DatabaseConnection;

class UserModel{
    private $db;

    public function __construct(DatabaseConnection &$db){
        $this->db = $db;
    }

    public function getByID(int $userID){
        $sql = 'SELECT * FROM users WHERE user_id = ?;';
        $prep = $this->db->getConnection()->prepare ($sql);
        $exec = $prep->execute ([$userID]);
        $user = NULL;
        if($exec){
            $user = $prep->fetch (PDO::FETCH_ASSOC);
        }
        return $user;
    }
    public function getAll(): array {
        $sql = 'SELECT * FROM users;';
        $prep = $this->db->getConnection ()->prepare ($sql);
        $exec = $prep->execute ();
        $users = [];
        if($exec){
            $users = $prep->fetchAll(PDO::FETCH_ASSOC);
        }
        return $users;
    }
    public function getByUsername(int $userName){
        $sql = 'SELECT * FROM users WHERE user_name = ?;';
        $prep = $this->db->getConnection ()->prepare ($sql);
        $exec = $prep->execute ([$userName]);
        $user = NULL;
        if($exec){
            $user = $prep->fetch(PDO::FETCH_ASSOC);
        }
        return $user;
    }

}