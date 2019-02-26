<?php
    namespace App\Models;
    use App\Core\DatabaseConnection;
    use \PDO;

    class CategoryModel{
        private $db;

        public function __construct(DatabaseConnection &$db){
            $this->db = $db;
        }

        public function getByID(int $userID){
            $sql = 'SELECT * FROM categories WHERE category_id = ?;';
            $prep = $this->db->getConnection()->prepare ($sql);
            $exec = $prep->execute ([$userID]);
            $category = NULL;
            if($exec){
                $category = $prep->fetch (PDO::FETCH_ASSOC);
            }
            return $category;
        }
        public function getAll(): array {
            $sql = 'SELECT * FROM categories;';
            $prep = $this->db->getConnection ()->prepare ($sql);
            $exec = $prep->execute ();
            $categories = [];
            if($exec){
                $categories = $prep->fetchAll(PDO::FETCH_OBJ);
            }
            return $categories;
        }
        public function getByCategoryName(int $userName){
            $sql = 'SELECT * FROM users WHERE user_name = ?;';
            $prep = $this->db->getConnection ()->prepare ($sql);
            $exec = $prep->execute ([$userName]);
            $category = NULL;
            if($exec){
                $category = $prep->fetch(PDO::FETCH_ASSOC);
            }
            return $category;
        }

    }