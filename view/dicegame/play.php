<?php

    namespace SpaceLenore\DiceGame;

?>


<h1> Dice Game</h1>
<?= '<form action="" method="post"><input type="submit" name="destroy" value="restart"></form>' ?>
<div class="info">
    Player: <?= $playerName ?><br>
    Score: <?= $playerScore ?>
    <br><br>
    AI: <?= $aiName ?><br>
    score: <?= $aiScore ?>
</div>
<hr id="game">
<div class="actions">
    <?= $msg ?><?= $tmpsc ?><br>
    <?php
    if ($_SESSION["playerScore"] >= 100 || $_SESSION["aiScore"] >= 100) {
        if ($_SESSION["playerScore"] > $_SESSION["aiScore"]) {
            echo "Player Wins!";
        } else {
            echo "Ai Wins!";
        }
    } else {
        if ($turn) {
            echo 'It\'s your turn! <br><form class="" action="#game" method="post">
            <input type="submit" name="roll" value="Roll!">
            <input type="submit" name="save" value="Save!">
            </form>';
        } else {
            echo 'AI turn <form class="" action="#game" method="post"><input type="submit" name="aiplay" value="Continue"></form>';
        }
    }
    ?>

</div>
