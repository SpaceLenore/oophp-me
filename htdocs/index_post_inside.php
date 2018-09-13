<?php

namespace SpaceLenore\Guess;

require 'config.php';
require __DIR__ . '/../vendor/autoload.php';

$title = "Guess the POST";

if (isset($_POST["secret"])) {
    //read data from guess and respond.
    $secret = htmlentities($_POST["secret"]);
    if (!isset($_POST["cheat"])) {
        $tries = htmlentities($_POST["tries"]) - 1;
        $guess = htmlentities($_POST["guess"]);
        $game = new Guess($secret, $tries);
        try {
            $result = $game->makeGuess($guess);
        } catch (OutOfGuessRangeException $e) {
            $result = get_class($e) . ": " . $e->getMessage();
        }
    } else {
        $tries = htmlentities($_POST["tries"]);
        $result = $secret;
    }
} else {
    //no random value has been set.
    $game = new Guess();
    $secret = $game->number();
    $tries = $game->tries();
    $result = null;
}
