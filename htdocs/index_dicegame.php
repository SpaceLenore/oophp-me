<?php

namespace SpaceLenore\DiceGame;

include(__DIR__ . "/config.php");

if (isset($_GET["destroy"]) || isset($_POST["destroy"])) {
    $_SESSION = [];
    session_destroy();
    session_name("sessionOne");
    session_start();
}

if (isset($_SESSION["playerScore"])) {
    // $player = $_SESSION["player"];
    $playerName = $_SESSION["playerName"];
    $playerScore = $_SESSION["playerScore"];
    // $ai = $_SESSION["ai"];
    $aiName = $_SESSION["aiName"];
    $aiScore = $_SESSION["aiScore"];
    $turn = $_SESSION["turn"];
    $game = new Game($playerScore, $aiScore);
    $ai = $game->getAI();
    $player = $game->getPlayer();
} else {
    $game = new Game();
    $player = $game->getPlayer();
    $playerName = $player->getName();
    $playerScore = $player->getScore();
    $ai = $game->getAI();
    $aiName = $ai->getName();
    $aiScore = $ai->getScore();
    $turn = $game->yourTurn;
}

$msg = "score for this turn: ";
$tmpsc = isset($_SESSION["tmpScore"]) ? $_SESSION["tmpScore"] : 0;

//Player Turn
if (!isset($_POST["aiplay"])) {
    if (isset($_POST["roll"])) {
        $roll = $game->rollDices();
        if ($roll == -1) {
            $msg = "you rolled a 1.";
            $tmpsc = 0;
            $_SESSION["tmpScore"] = 0;
            $turn = false;
        } else {
            $tmpsc += $roll;
        }
        $_SESSION["tmpScore"] = $tmpsc;
    } elseif (isset($_POST["save"])) {
        $playerScore += $tmpsc;
        $tmpsc = 0;
        $_SESSION["tmpScore"] = 0;
        $turn = false;
        $_SESSION["playerScore"] = $playerScore;
    }
} else {
    //AI roll
    $thisRoundRoll = 0;
    while ($thisRoundRoll <= 10) {
        $airoll = $game->rollDices();
        if ($airoll == -1) {
            break;
        } else {
            $thisRoundRoll += $airoll;
            $aiScore += $airoll;
        }
    }
    $turn = true;
}

$_SESSION["playerName"] = $playerName;
$_SESSION["playerScore"] = $playerScore;
$_SESSION["aiName"] = $aiName;
$_SESSION["aiScore"] = $aiScore;
$_SESSION["turn"] = $turn;
