<?php


namespace App\Controllers;
use App\Core\Controller;
use App\Models\AuctionModel;
use App\Models\CategoryModel;


class CategoryController extends Controller
{

    public function show($id){
        $categoryModel = new CategoryModel($this->getDatabaseConnection ());
        $category = $categoryModel->getByID ($id);
        $this->set ('category',$category);

        if(!$category)
        {
            header ('Location: /');
            exit();
        }

        $auctionModel = new AuctionModel($this->getDatabaseConnection ());
        $auctionsInCategory = $auctionModel->getAllByFieldName ('auction_id',$id);
        $this->set('auctionsInCategory',$auctionsInCategory);


    }
    public function delete()
    {
        die('Method not done yet!');
    }



}