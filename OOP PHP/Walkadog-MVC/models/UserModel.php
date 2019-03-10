<?php

namespace App\Models;

use App\Core\Field;
use App\Core\Model;
use App\Validators\StringValidator;
use \PDO;

class UserModel extends Model
{
   protected function getFields(): array
    {
        return [
            'name' => new Field(new StringValidator()),
            'email' => new Field(new StringValidator()),
            'hashed_email' =>new Field(new StringValidator()),
            'address' =>new Field(new StringValidator()),
            'phone' =>new Field(new StringValidator()),
            'review_code' => new Field(new StringValidator()),
            'verification_code' => new Field(new StringValidator()),
        ];
    }
    public function getByUsername($userName)
    {
        return $this->getByFieldName ('name',$userName);
    }

}