<?php
class Casino
{
    public $money;
    public $number;

    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public function setMoney($setMoney)
    {
        $this->money = $setMoney;
    }

    public function randomize($value, $start, $end)
    {
        $value = rand($start, $end);
        return $value;
    }
}
