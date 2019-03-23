<?php

namespace App\Validators;
use App\Core\Validator;

class StringValidator implements Validator
{
    private $minStringLength;
    private $maxStringLength;

    public function __construct()
    {
        $this->minStringLength = 0;
        $this->maxStringLength = 255;
    }

    public function &setMinStringLength(int $length): StringValidator
    {
        $this->minStringLength = max (0,$length);
        return $this;
    }

    public function &setMaxStringLength(int $length): StringValidator
    {
        $this->minStringLength = max (1,$length);
        return $this;
    }

    public function isValid(string $value): bool
    {
      $len = strlen ($value);

      return $this->minStringLength <= $len and $len <= $this->maxStringLength;


    }

}