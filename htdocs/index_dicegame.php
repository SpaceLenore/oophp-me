<?php

namespace SpaceLenore\DiceGame;

$request = new \Anax\Request\Request();
$session = new \Anax\Session\Session();


include(__DIR__ . "/config.php");

if ($request->getPost("destroy")|| $request->getGet("destroy")) {
    $session->destroy();
    header('Location: /dice');
}

if ($session->has("playerScore")) {
    $playerName = $session->get("playerName");
    $playerScore = $session->get("playerScore");
    $aiName = $session->get("aiName");
    $aiScore = $session->get("aiScore");
    $turn = $session->get("turn");
    $game = $session->get("game");
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
$tmpsc = $session->get("tmpScore", 0);
$histogram = $game->getHistogram();

//Player Turn
if (!$request->getPost("aiplay")) {
    if ($request->getPost("roll")) {
        $roll = $game->rollDices();
        if ($roll == -1) {
            $msg = "you rolled a 1.";
            $tmpsc = 0;
            $session->set("tmpScore", 0);
            $turn = false;
        } else {
            $tmpsc += $roll;
        }
        $session->set("tmpScore", $tmpsc);
    } elseif ($request->getPost("save")) {
        $playerScore += $tmpsc;
        $tmpsc = 0;
        $session->set("tmpScore", 0);
        $turn = false;
        $session->set("playerScore", $playerScore);
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

$session->set("game", $game);
$session->set("playerName", $playerName);
$session->set("playerScore", $playerScore);
$session->set("aiName", $aiName);
$session->set("aiScore", $aiScore);
$session->set("turn", $turn);
