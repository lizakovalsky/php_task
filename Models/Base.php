<?php
class Base
{
    public function __construct(
        public $player,
        public $casino
    ) {
    }

    public function create(Player $player, Casino $casino)
    {
        $create = new Base($player, $casino);
        return $create;
    }

    public function getTheDiff()
    {
        return max($this->casino->number, $this->player->number) - min($this->casino->number, $this->player->number);
    }

    //private function maxValue(int $value1,int $value2){
    //    return max($value1,$value2); 
    //}

    public function playerWin($money)
    {
        echo "U win " . $money . "\n";
        $this->casino->money -= $money;
        $this->player->money += $money;

        return $this;
    }
    public function casinoWin($money)
    {
        echo "Casino win " . $money . "\n";
        $this->casino->money += $money;
        $this->player->money -= $money;

        return $this;
    }
    public function getInfo()
    {
        echo "ur number " . $this->player->number . " Casino number " . $this->casino->number . "\nur account balance: " . $this->player->money . "\nCasino's account balance: " . $this->casino->money;
    }
}
