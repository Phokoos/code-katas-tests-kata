<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Player;
use App\TennisMatch;

$match = new TennisMatch(
    $player1 = new Player('Player Mykola'),
    $player2 = new Player('Player Vita')
);

$match->pointTo($player1);
$match->pointTo($player1);
$match->pointTo($player1);
$match->pointTo($player2);
$match->pointTo($player2);
$match->pointTo($player2);
$match->pointTo($player2);


echo $match->score(); // forty-thirty

