<?php

namespace SpaceLenore\Guess;

require 'config.php';
require __DIR__ . '/../vendor/autoload.php';

$title = "Guess the GET";

if (isset($_GET["secret"])) {
    //read data from guess and respond.
    $secret = htmlentities($_GET["secret"]);
    if (!isset($_GET["cheat"])) {
        $tries = htmlentities($_GET["tries"]) - 1;
        $guess = htmlentities($_GET["guess"]);
        $game = new Guess($secret, $tries);
        try {
            $result = $game->makeGuess($guess);
        } catch (OutOfGuessRangeException $e) {
            $result = get_class($e) . ": " . $e->getMessage();
        }
    } else {
        $tries = htmlentities($_GET["tries"]);
        $result = $secret;
    }
} else {
    //no random value has been set.
    $game = new Guess();
    $secret = $game->number();
    $tries = $game->tries();
    $result = null;
}
