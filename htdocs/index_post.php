<?php

include('config.php');

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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
    </head>
    <body>
        <h1>Guess the number (POST)</h1>
        <form action="index_post.php" method="POST">
            <input type="text" name="guess" placeholder="Your guess">
            <input type="submit" value="Guess">
            <input type="hidden" name="secret" value="<?= $secret ?>">
            <input type="hidden" name="tries" value="<?= $tries ?>">
            <input type="submit" name="cheat" value="Cheat">
        </form>
        <a href="index_post.php">Börja Om</a>
        <p>
        </p>
        <p>
            <?= $result ?>
        </p>
    </body>
</html>
