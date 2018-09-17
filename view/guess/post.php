<?php

namespace SpaceLenore\Guess;

?>
        <h1>Guess the number (POST)</h1>
        <form action="" method="POST">
            <input type="text" name="guess" placeholder="Your guess">
            <input type="submit" value="Guess">
            <input type="hidden" name="secret" value="<?= $secret ?>">
            <input type="hidden" name="tries" value="<?= $tries ?>">
            <input type="submit" name="cheat" value="Cheat">
        </form>
        <a href="">Börja Om</a>
        <p>
        </p>
        <p>
            <?= $result ?>
        </p>
    </body>
</html>
