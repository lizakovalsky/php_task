<?php
require "ClassPlayer.php";
require "ClassCasino.php";

$playersRate = readline();
$newPlayer = new Player($playersRate);