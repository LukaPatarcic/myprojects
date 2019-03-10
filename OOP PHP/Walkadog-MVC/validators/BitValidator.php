<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 3/7/2019
 * Time: 6:31 PM
 */

namespace App\validators;
use App\core\Validator;

class BitValidator implements Validator
{

    public function __construct()
    {
    }

    public function isValid(string $value): bool
    {
        return boolval (preg_match ('/^[01]$/',$value));
    }

}