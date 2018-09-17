<?php
/**
 * Create routes using $app programming style.
 * Guess game routes
 */


/**
* Guess the number using GET
*/
$app->router->get("gissa/get", function () use ($app) {
    include __DIR__ . "/../htdocs/index_get_inside.php";

    $title = "Gissa nummer GET";
    $data = [
        "class" => "guess",
        "result" => $result,
        "secret" => $secret,
        "tries" => $tries
    ];

    $app->page->add("guess/get", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
* Guess the number using POST
*/
$app->router->any(["get", "post"], "gissa/post", function () use ($app) {
    include __DIR__ . "/../htdocs/index_post_inside.php";

    $title = "Gissa nummer POST";
    $data = [
        "class" => "guess",
        "result" => $result,
        "secret" => $secret,
        "tries" => $tries
    ];

    $app->page->add("guess/post", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});


/**
* Guess the number using SESSION
*/
$app->router->any(["get", "post"], "gissa/session", function () use ($app) {
    include __DIR__ . "/../htdocs/index_session_inside.php";

    $title = "Gissa nummer SESSION";
    $data = [
        "class" => "guess",
        "result" => $_SESSION["result"],
        "secret" => $_SESSION["secret"],
        "tries" => $_SESSION["tries"]
    ];

    $app->page->add("guess/session", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
