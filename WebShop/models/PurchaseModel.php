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
    public function getUserPurchase($userId = 1)
    {
        $sql = 'SELECT * FROM purchase 
                    join user  on purchase.user_id = user.user_id
                    join item on item.item_id = purchase.item_id
                    WHERE purchase.user_id = ?';
        $prep = $this->getConnection()->prepare($sql);
        $res = $prep->execute([$userId]);
        $items = [];
        if ($res) {
            $items = $prep->fetchAll(\PDO::FETCH_OBJ);
        }
        return $items;
    }


}