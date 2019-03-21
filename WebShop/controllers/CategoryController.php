<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function show()
    {
        $categoryModel = new CategoryModel($this->getDatabaseConnection ());
        $categories = $categoryModel->getAll ();
        $this->set ('categories',$categories);
    }

}