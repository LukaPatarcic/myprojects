<?php

namespace App\Models;
use App\Core\Field;
use App\Core\Model;
use App\Validators\StringValidator;

class AdminModel extends Model
{
    protected function getFields(): array
    {
        return [
          'admin_name' => new Field(new StringValidator()),
          'admin_password' => new Field(new StringValidator())
        ];
    }
}