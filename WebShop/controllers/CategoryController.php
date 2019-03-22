<?php

namespace App\Controllers;
use App\Core\Role\UserRoleController;
use App\Models\CategoryModel;

class CategoryController extends UserRoleController
{
    public function show()
    {
        $categoryModel = new CategoryModel($this->getDatabaseConnection ());
        $categories = $categoryModel->getAll ();
        $this->set ('categories',$categories);
    }

}