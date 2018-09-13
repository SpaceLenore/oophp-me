<?php
include('config.php');

// session_name("guessnumber");
// session_start();

if (isset($_POST["destroy"]) || isset($_GET["destroy"])) {
    $_SESSION = [];
    // session_destroy();
    // session_name("guessnumber");
    // session_start();
}

$title = "Guess the SESSION";

if (isset($_SESSION["secret"])) {
    $secret = $_SESSION["secret"];
    if (isset($_POST["guess"])) {
        $tries = $_SESSION["tries"] - 1;
        $guess = htmlentities($_POST["guess"]);
        $game = new Guess($secret, $tries);
        try {
            $_SESSION["result"] = $game->makeGuess($guess);
        } catch (OutOfGuessRangeException $e) {
            $_SESSION["result"] = get_class($e) . ": " . $e->getMessage();
        }
        $_SESSION["tries"] = $tries;
    }
} else {
    $game = new Guess();
    $_SESSION["secret"] = $game->number();
    $_SESSION["tries"] = $game->tries();
    $_SESSION["result"] = null;
}

if (isset($_POST["cheat"])) {
    $_SESSION["result"] = $_SESSION["secret"];
}
