<?php
include('config.php');

session_name("guessnumber");
session_start();

if (isset($_POST["destroy"]) || isset($_GET["destroy"])) {
    $_SESSION = [];
    session_destroy();
    session_name("guessnumber");
    session_start();
}

$title = "Guess the SESSION";

if (isset($_SESSION["secret"])) {
    $secret = $_SESSION["secret"];
    if (isset($_POST["guess"])) {
        $tries = $_SESSION["tries"] - 1;
        $guess = htmlentities($_POST["guess"]);
        $game = new Guess($secret, $tries);
        try {
            $result = $game->makeGuess($guess);
        } catch (OutOfGuessRangeException $e) {
            $result = get_class($e) . ": " . $e->getMessage();
        }
        $_SESSION["tries"] = $tries;
    }
} else {
    $game = new Guess();
    $_SESSION["secret"] = $game->number();
    $_SESSION["tries"] = $game->tries();
    $result = null;
}

if (isset($_POST["cheat"])) {
    $result = $_SESSION["secret"];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
    </head>
    <body>
        <h1>Guess the number (SESSION)</h1>
        <form action="index_session.php" method="POST">
            <input type="text" name="guess" placeholder="Your guess">
            <input type="submit" value="Guess">
        </form>
        <p>
            <form class="restart" action="index_session.php" method="POST">
                <input type="submit" name="destroy" value="Börja Om">
            </form>
            <form class="restart" action="index_session.php" method="POST">
                <input type="submit" name="cheat" value="Cheat">
            </form>
        </p>
        <p>
            <?= $result ?>
        </p>
    </body>
</html>
