<?php
namespace App\Models;
use App\Core\DatabaseConnection;
use App\Core\Model;
use \PDO;

class OfferModel extends Model {

    public function getAllByAuctionID(int $auctionID): array
    {
       $items = $this->getAllByFieldName ('auction_id',$auctionID);
       usort ($items,function ($a,$b) {
           return strcmp ($a->created_at,$b->created_at);
       });

       return $items;
    }
}