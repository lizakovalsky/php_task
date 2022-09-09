<?php
function RateIsValid($rate)
{
    if ($rate >= 100 && $rate <= 1000) {
        return true;
    } else {
        throw new Exception("rate must been between 100 and 1000");
    }
}
function NumberIsValid($number)
{
    if ($number >= 1 && $number <= 100) {
        return true;
    } else {
        throw new Exception("value must been between 1 and 100");
    }
}
