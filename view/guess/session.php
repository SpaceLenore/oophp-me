<?php

namespace SpaceLenore\Guess;

?>
    <body>
        <h1>Guess the number (SESSION)</h1>
        <form action="" method="POST">
            <input type="text" name="guess" placeholder="Your guess">
            <input type="submit" value="Guess">
        </form>
        <p>
            <form class="restart" action="" method="POST">
                <input type="submit" name="destroy" value="Börja Om">
            </form>
            <form class="restart" action="" method="POST">
                <input type="submit" name="cheat" value="Cheat">
            </form>
        </p>
        <p>
            <?= $result ?>
        </p>
    </body>
</html>
