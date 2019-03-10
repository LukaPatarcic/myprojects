<?php

namespace App\Validators;
use App\core\Validator;

class DateTimeValidator implements Validator
{
    private $isDateAllowed;
    private $isTimeAllowed;

    public function __construct()
    {
        $this->isDateAllowed = false;
        $this->isTimeAllowed = false;
    }

    public function &allowedDate(): DateTimeValidator
    {
        $this->isDateAllowed = true;
        return $this;
    }

    public function &allowedTime(): DateTimeValidator
    {
        $this->isTimeAllowed = true;
        return $this;
    }

    public function &disallowDate(): DateTimeValidator
    {
        $this->isDateAllowed = false;
        return $this;
    }

    public function &disallowedTime(): DateTimeValidator
    {
        $this->isTimeAllowed = false;
        return $this;
    }

    public function isValid(string $value): bool
    {
        $pattern = '/^';

        if($this->isDateAllowed === true)
        {
            $pattern .= '[0-9]{4}-[0-9]{2}-[0-9]{2}';
        }

        if($this->isDateAllowed === true and $this->isTimeAllowed === true)
        {
            $pattern .= ' ';
        }

        if($this->isTimeAllowed === true)
        {
            $pattern .= '[0-9]{2}:[0-9]{2}:[0-9]{2}';
        }

        $pattern .= '$/';

        return boolval (preg_match ($pattern,$value));

    }

}