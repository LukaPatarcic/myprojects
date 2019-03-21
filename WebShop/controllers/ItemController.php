<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\ItemModel;

class ItemController extends  Controller
{
    public function showAll($id)
    {
        $itemModel = new \App\Models\ItemModel($this->getDatabaseConnection());
        $items = $itemModel->getAllByFieldName('category_id',$id);
        $this->set('items', $items);
    }

    public function show($id)
    {
        $itemModel = new \App\Models\ItemModel($this->getDatabaseConnection());
        $item = $itemModel->getById($id);
        $this->set('item', $item);
    }

    public function postSearch()
    {
        $search = filter_input (INPUT_POST,'q',FILTER_SANITIZE_STRING);

        $itemModel = new ItemModel($this->getDatabaseConnection ());
        $items = $itemModel->getItemsBySearch ($search);
        $this->set ('items',$items);
    }
}