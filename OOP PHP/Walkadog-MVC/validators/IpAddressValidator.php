<?php


namespace App\Validators;
use App\core\Validator;

class IpAddressValidator implements Validator
{
    public function __construct()
    {
    }

    public function isValid(string $value): bool
    {
        return boolval (preg_match ('/^(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}|::\d{1,3})$/',$value));
    }


}