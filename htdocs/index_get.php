<?php

include('config.php');

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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
    </head>
    <body>
        <h1>Guess the number (GET)</h1>
        <form action="index_get.php" method="GET">
            <input type="text" name="guess" placeholder="Your guess">
            <input type="submit" value="Guess">
            <input type="hidden" name="secret" value="<?= $secret ?>">
            <input type="hidden" name="tries" value="<?= $tries ?>">
            <input type="submit" name="cheat" value="Cheat">
        </form>
        <a href="index_get.php">Börja Om</a>
        <p>
        </p>
        <p>
            <?= $result ?>
        </p>
    </body>
</html>
