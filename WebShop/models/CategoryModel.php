<?php

namespace App\Models;
use App\Core\Field;
use App\Core\Model;
use App\Validators\StringValidator;

class CategoryModel extends Model
{
    protected function getFields(): array
    {
        return [
            'category_name' => new Field((new StringValidator()))
        ];
    }

}