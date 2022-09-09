<?php
class Casino{
    public $money;
    public $number;

    public function __construct($number)
    {
        $this->money = 10000;
        $this->number = $number;
    }

    public function __destruct(){}
    
}