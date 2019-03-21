<?php

namespace App\core;


interface Validator
{
    public function isValid(string $value): bool;

}