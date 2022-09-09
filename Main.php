<?php
// Models / Enities / Classes
require "Models/Player.php";
require "Models/Casino.php";
require "Validators/NumberValidator.php";


$winsedMoney = 0;

$newPlayer = new Player();
$newCasino = new Casino();


echo "Welcome to casino. Object already exist.";

function finishRoll($player, $casino){
    if ($casino->money <= 0 or $player->money <= 0) return false;
    return true;
}

function Game($newPlayer, $newCasino){
    while( finishRoll($newPlayer, $newCasino) ){
        $diff = 0;
        $casinoNumber = rand(1,100);
        $newCasino->number = $casinoNumber;
        echo "\nPlease put ur rate, default - 100: \n";
        $playersRate = readline();
        $newPlayer->rate = $playersRate;
        echo "Now put ur number, default - 1: \n";
        $playersNumber = readline();
        $newPlayer->number = $playersNumber;
    
        try{
            RateIsValid($playersRate);
        }catch(Exception $e){
            echo "Error: ". $e->getMessage()."\n";
            continue;
        }
    
        try{
            NumberIsValid($playersNumber);
        }catch(Exception $ex){
            echo "Error: ".$ex->getMessage()."\n";
            continue;
        }
    
        $diff = max($casinoNumber, $playersNumber) - min($casinoNumber, $playersNumber);
        if($diff <= 10){
            
            $winsedMoney = $playersRate * 2;
            $newCasino->money -= $winsedMoney;
            $newPlayer->money += $winsedMoney;
            echo "Ur number ".$playersNumber." Casino number ".$casinoNumber;
            echo "\nHooray, u win! ".$winsedMoney."\nur account balance: ".$newPlayer->money." \ncasino's account balance: ".$newCasino->money;
        }elseif($diff > 10 && $diff <= 20){
            $winsedMoney = $playersRate;
            $newCasino->money -= $winsedMoney;
            $newPlayer->money += $winsedMoney;
            echo "Ur number ".$playersNumber." Casino number ".$casinoNumber;
            echo "\nU win ".$winsedMoney."\nur account balance: ".$newPlayer->money." \ncasino's account balance: ".$newCasino->money;
        }else{
            $newCasino-> money += $playersRate;
            $newPlayer->money -= $playersRate;
            echo "Ur number ".$playersNumber." Casino number ".$casinoNumber;
            echo "\nU lose \nur account balance: ".$newPlayer->money." \ncasino's account balance: ".$newCasino->money;
        }
    }
}

while(finishRoll($newPlayer, $newCasino))
{
    try{
        Game($newPlayer, $newCasino);
    } catch(Exception $e){
        echo "Error: ".$e->getMessage();
    }
}



