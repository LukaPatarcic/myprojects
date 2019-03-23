<?php

namespace App\Models;
use App\Core\Field;
use App\Core\Model;
use App\Validators\NumberValidator;
use App\Validators\StringValidator;


class ItemModel extends Model
{
    protected function getFields(): array
    {
        return [
            'category_id' => new Field((new NumberValidator())->setInteger(),true),
            'item_name' => new Field((new StringValidator())->setMinLength(2),true),
            'item_description' => new Field((new StringValidator())->setMinLength(2),true),
            'item_price' => new Field((new NumberValidator())->setDecimal()->setMaxDecimalDigits(2),true)
        ];
    }
    final public function getItemsBySearch(string $search)
    {

        $sql = "SELECT * FROM item WHERE item_name LIKE ?;";
        $prep = $this->getConnection()->prepare($sql);

        $search = '%'.$search.'%';

        $res = $prep->execute([$search]);
        $items = NULL;
        if ($res) {
            $items = $prep->fetchAll(\PDO::FETCH_OBJ);
        }

        return $items;
    }

    final public function getAllWithCategory()
    {
        $sql = "SELECT * FROM item
                join category on item.category_id = category.category_id;";
        $prep = $this->getConnection()->prepare($sql);

        $res = $prep->execute();
        $items = NULL;
        if ($res) {
            $items = $prep->fetchAll(\PDO::FETCH_OBJ);
        }

        return $items;
    }

    final public function getWithCategory($id)
    {


        $sql = "SELECT * FROM item
                join category on item.category_id = category.category_id
                WHERE item.item_id = ?;";
        $prep = $this->getConnection()->prepare($sql);
        $res = $prep->execute([$id]);
        $item = NULL;
        if ($res) {
            $item = $prep->fetch(\PDO::FETCH_OBJ);
        }

        return $item;
    }


}