<?php

namespace App\Models;
use App\Core\Field;
use App\Core\Model;
use App\Validators\NumberValidator;
use App\Validators\StringValidator;


class PurchaseModel extends Model
{
    protected function getFields(): array
    {
        return [
            'user_id' => new Field(new NumberValidator()),
            'item_id' => new Field(new NumberValidator())
        ];
    }



}