<?php
// Models / Enities / Classes
require "Models/Player.php";
require "Models/Casino.php";
require "Validators/NumberValidator.php";
require "Models/Base.php";

//$winsedMoney = 0;

$newPlayer = new Player();
$newCasino = new Casino();
$newBase = new Base($newPlayer, $newCasino);

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;
const MIN_RATE = 100;
const MAX_RATE = 1000;


function finishRoll($player, $casino)
{
    if ($casino->money <= 0 or $player->money <= 0) return false;
    return true;
}

function game($newPlayer, $newCasino)
{

    $casinoNumber = 0;

    $newValidator = new NumberValidator();

    while (finishRoll($newPlayer, $newCasino)) {
        $newBase = new Base($newPlayer, $newCasino);

        $casinoNumber = $newCasino->randomize(intval($casinoNumber), MIN_NUMBER, MAX_NUMBER);
        $newCasino->number = $casinoNumber;

        echo "\nPlease put ur rate, from 100 to 1000: ";
        $playersRate = $newValidator->validate(intval(readline()), MIN_RATE, MAX_RATE);
        $newPlayer->rate = $playersRate;

        echo "Now put ur number, from 1 to 100: ";
        $playersNumber = $newValidator->validate(intval(readline()), MIN_NUMBER, MAX_NUMBER);
        $newPlayer->number = $playersNumber;

        $diff = $newBase->getTheDiff();

        if ($diff <= 10) {

            $newBase->playerWin($playersRate * 2);
            $newBase->getInfo();
        } elseif ($diff > 10 && $diff <= 20) {

            $newBase->playerWin($playersRate);
            $newBase->getInfo();
        } else {

            $newBase->casinoWin($playersRate);
            $newBase->getInfo();
        }
    }
}

echo "Welcome to casino.";


$newCasino->setMoney(10000);
$newPlayer->setMoney(10000);

while (finishRoll($newPlayer, $newCasino)) {
    try {
        game($newPlayer, $newCasino);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
