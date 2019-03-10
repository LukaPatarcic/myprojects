<?php
namespace App\models;

use App\core\Field;
use App\Core\Model;
use App\Validators\IpAddressValidator;
use App\Validators\NumberValidator;
use App\Validators\StringValidator;
use Twig\FileExtensionEscapingStrategy;
use \Exception;


class AuctionViewModel extends Model
{

    protected function getFields(): array
    {

        return [
            'auction_id' => new Field((new NumberValidator())->setIntegerLength (11)),
            'ip_address' => new Field(new IpAddressValidator()),
            'user_agent' => new Field(new StringValidator()),
        ];

    }

    public function getAllByAuctionId(string $auctionID): array
    {
        return $this->getAllByFieldName ('auction_id', $auctionID);
    }

    public function getAllByIpAddress(string $ipAddress): array
    {
        return $this->getAllByFieldName ('ip_adress', $ipAddress);
    }

}