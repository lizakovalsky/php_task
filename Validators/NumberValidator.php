<?php

class NumberValidator extends Exception
{

    function __construct()
    {
    }

    public function validate(int $value, int $min = null, int $max = null): int
    {

        if (is_null($value)) {
            throw new Exception("Empty value");
        }
        if (!is_null($min)) {
            if ($value < $min) {
                throw new Exception("Value must be more than " . $min);
            }
        }

        if (!is_null($max)) {
            if ($value > $max) {
                throw new Exception("Value must be low than " . $max);
            }
        }

        return $value;
    }

    public function validateFailed($mess)
    {
    }
}
