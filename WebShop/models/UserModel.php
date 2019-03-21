<?php

namespace App\Models;
use App\Core\Field;
use App\Core\Model;
use App\Validators\StringValidator;

class UserModel extends Model
{
    protected function getFields(): array
    {
        return [
            'first_name' => new Field((new StringValidator())),
            'last_name'=> new Field((new StringValidator())),
            'email'=> new Field((new StringValidator())),
            'username'=> new Field((new StringValidator())),
            'password'=> new Field((new StringValidator()))
        ];
    }

}