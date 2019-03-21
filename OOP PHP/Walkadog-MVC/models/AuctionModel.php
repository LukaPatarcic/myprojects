<?php
namespace App\Models;
use App\core\Field;
use App\Core\Model;
use App\validators\BitValidator;
use App\Validators\DateTimeValidator;
use App\Validators\NumberValidator;
use App\Validators\StringValidator;
use \PDO;

class AuctionModel extends  Model {

    protected function getFields(): array
    {
        return [
            'auction_id' => new Field((new NumberValidator())->setIntegerLength (11),false),
            'created_at' => new Field((new DateTimeValidator())->allowedDate ()->allowedTime (),false),
            'title' => new Field((new StringValidator())->setMaxStringLength (50)->setMinStringLength (1)),
            'description' => new Field((new StringValidator())->setMaxStringLength (50)->setMinStringLength (1)),
            'starting_price' => new Field((new NumberValidator())->setDecimal ()->setUnsigned ()->setMaxDecimalDigits (2)->setIntegerLength (7)),
            'starts_at' => new Field((new DateTimeValidator())->allowedDate ()->allowedTime ()),
            'ends_at' => new Field((new DateTimeValidator())->allowedDate ()->allowedTime ()),
            'is_active' => new Field(new BitValidator()),
            'category_id' => new Field((new NumberValidator())->setIntegerLength (11))

        ];

    }

}