<?php
/**
 * Create routes using $app programming style.
 * Guess game routes
 */


/**
* Guess the number using SESSION
*/
$app->router->any(["get", "post"], "dice", function () use ($app) {
    include __DIR__ . "/../htdocs/index_dicegame.php";
    $title = "DICE GAME";

    $data = [
        "playerName" => $_SESSION["playerName"],
        "playerScore" => $_SESSION["playerScore"],
        "aiName" => $_SESSION["aiName"],
        "aiScore" => $_SESSION["aiScore"],
        "turn" => $_SESSION["turn"],
        "msg" => $msg,
        "tmpsc" => $tmpsc
    ];

    $app->page->add("dicegame/play", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
