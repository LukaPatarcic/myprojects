<?php
namespace App\Validators;
use \App\Core\Validator;

class RegexValidator implements Validator {
    private $regex;

    public function __construct() {
        $this->regex = '|^.$|';
    }

    public function &setLettersOnly($minLength,$maxLength) {
        $this->regex = '|^[A-Za-z]{'.$minLength.','.$maxLength.'}$|';
        return $this;
    }

    public function &setLettersAndNumbersOnly($minLength,$maxLength)  {
        $this->regex = '|^[A-Za-z0-9]{'.$minLength.','.$maxLength.'}$|';
        return $this;
    }

    public function &setWholeNumbersOnly($minLength,$maxLength){
        $this->regex = '|^\d{'.$minLength.','.$maxLength.'}$|';
        return $this;
    }

    public function &setDecimalNumbersOnly($minLength,$maxLength,$minDecimalLength,$maxDecimalLength) {
        $this->regex = '|^\d{'.$minLength.','.$maxLength.'}\.\d{'.$minDecimalLength.','.$maxDecimalLength.'}$|';
        return $this;
    }

    public function &setIpAddressOnly(){
        $this->regex = '/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';
        return $this;
    }

    public function isValid(string $value): bool {

        $pattern = $this->regex;

        return \boolval(\preg_match($pattern, $value));
    }
}
