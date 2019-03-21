<?php
namespace App\Core;
use App\Core\DatabaseConnection;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use \Exception;
use \PDO;
use Twig\NodeVisitor\SafeAnalysisNodeVisitor;

abstract class Model{
    private $db;

    final public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }
    protected function getFields(): array
    {
        return [];
    }

    final private function getTableName(): string
    {
        $matches = [];
        preg_match ('|^.*\\\((?:[A-Z][a-z]+)+)Model$|',static::class,$matches);

        return substr (strtolower (preg_replace ('|[A-Z]|','_$0', $matches[1] ?? '')),1);
    }

    final protected function getConnection()
    {
        return $this->db->getConnection ();

    }

    final public function getByID(int $ID){
        $tableName = $this->getTableName ();
        $sql = 'SELECT * FROM '.$tableName.' WHERE '.$tableName.'_id = ?;';
        $prep = $this->db->getConnection()->prepare ($sql);
        $exec = $prep->execute ([$ID]);
        $item = NULL;
        if($exec){
            $item = $prep->fetch (PDO::FETCH_OBJ);
        }
        return $item;
    }
    final public function getAll(): array {
        $tableName = $this->getTableName ();
        $sql = 'SELECT * FROM '.$tableName.';';
        $prep = $this->db->getConnection ()->prepare ($sql);
        $exec = $prep->execute ();
        $items = [];
        if($exec){
            $items = $prep->fetchAll(PDO::FETCH_OBJ);
        }
        return $items;
    }

    final private function isFieldNameValid(string $fieldName)
    {
        return boolval (preg_match ('|^[a-z][a-z_0-9]+[a-z0-9]$|',$fieldName));
    }

    final public function getByFieldName(string $fieldName,$value){
        if(!$this->isFieldNameValid ($fieldName))
        {
            throw new Exception('Invalid field name:'.$fieldName);
        }
        $tableName = $this->getTableName ();
        $sql = 'SELECT * FROM '.$tableName.' WHERE '.$fieldName.' = ?;';
        $prep = $this->db->getConnection()->prepare ($sql);
        $exec = $prep->execute ([$value]);
        $item = NULL;
        if($exec){
            $item = $prep->fetch (PDO::FETCH_OBJ);
        }
        return $item;
    }
    final public function getAllByFieldName(string $fieldName,$value): array {
        if(!$this->isFieldNameValid ($fieldName))
        {
            throw new Exception('Invalid field name:'.$fieldName);
        }
        $tableName = $this->getTableName ();
        $sql = 'SELECT * FROM '.$tableName.' WHERE '.$fieldName.' = ?;';
        $prep = $this->db->getConnection()->prepare ($sql);
        $exec = $prep->execute ([$value]);
        $items = [];
        if($exec){
            $items = $prep->fetchAll(PDO::FETCH_OBJ);
        }
        return $items;
    }

    /**
     * @param array $data
     * @throws Exception
     */
    final private function checkFieldList(array $data)
    {
        $fields = $this->getFields ();

        $supportedFieldNames = array_keys ($fields);
        $requestedFieldNames = array_keys ($data);

        foreach ($requestedFieldNames as $requestedFieldName)
        {
            if(! in_array ($requestedFieldName,$supportedFieldNames))
            {
                throw new Exception('Field '.$requestedFieldName.' is not supported');
            }

            if(! $fields[$requestedFieldName]->isEditable())
            {
                throw new Exception('Field '.$requestedFieldName.' is not editable');
            }

            if(! $fields[$requestedFieldName]->isValid($data[$requestedFieldName]))
            {
                throw new Exception('Field '.$requestedFieldName.' is not valid ');
            }
        }
    }

    final public function add(array $data)
    {
        $this->checkFieldList ($data);

        $tableName = $this->getTableName ();

        $sqlFieldNames = implode (', ',array_keys ($data));
        $questionMarks = str_repeat ('?,',count($data));
        $questionMarks = substr ($questionMarks,0,-1);

        $sql = 'INSERT INTO '.$tableName.' ('.$sqlFieldNames.') VALUES ('.$questionMarks.');';
        $prep = $this->db->getConnection ()->prepare ($sql);
        $exec = $prep->execute (array_values ($data));


        if(!$exec)
        {
            return false;
        }

        return $this->db->getConnection ()->lastInsertId ();
    }

    final public function editByID(int $id,array $data)
    {
        $this->checkFieldList ($data);
        $this->checkFieldList ($data);
        $tableName = $this->getTableName ();

        $editList = [];
        $values = [];
        foreach ($data as $key => $value)
        {
            $editList[] = $key.' = ?';
            $values[] = $value;
        }
        $editString = implode (',',$editList);
        $values[] = $id;

        $sql = 'UPDATE '.$tableName.' SET '.$editString.' WHERE '.$tableName.'_id = ?;';
        $prep = $this->db->getConnection ()->prepare ($sql);
        return $prep->execute ($values);


    }

    final public function deleteByID(int $ID){
        $tableName = $this->getTableName ();
        $sql = 'DELETE FROM '.$tableName.' WHERE '.$tableName.'_id = ?;';
        $prep = $this->db->getConnection()->prepare ($sql);

        return $prep->execute ([$ID]);
    }

    final public function getAllVerifiedReviews(): array {
        $tableName = $this->getTableName ();
        $sql = 'SELECT name,comment FROM '.$tableName.' JOIN user on code_fk = review_code WHERE review.verified = 1;';
        $prep = $this->db->getConnection ()->prepare ($sql);
        $exec = $prep->execute ();
        $items = [];
        if($exec){
            $items = $prep->fetchAll(PDO::FETCH_OBJ);
        }
        return $items;
    }



}