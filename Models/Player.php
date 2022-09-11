<?php
class Player
{
    public $money;
    public $number;
    public $rate;
    // format

    public function __construct()
    {
    }
    //сет мони
    public function setMoney($setMoney)
    {
        $this->money = $setMoney;
    }

    public function __destruct()
    {
    }
}
