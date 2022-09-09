<?php
class Player
{
    public $money;
    public $number;
    public $rate;
    // format
    public function __construct()
    {
        $this->money = 0;
        $this->number = 1;
        $this->rate = 100;
    }

    public function __destruct()
    {
    }
}
