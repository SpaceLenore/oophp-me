<?php

/**
 * Show all movies.
 */
$app->router->get("movie", function () use ($app) {
    $title = "Movie database | oophp";

    $app->db->connect();
    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $app->page->add("movie/index", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
*   Search for a movie
*/
$app->router->get("movie-search", function () use ($app) {
    $title = "Movie search | oophp";

    if ($app->request->getGet("search")) {
        $safeSearchString = htmlentities($app->request->getGet("search"));
        $app->db->connect();
        $sql = "SELECT * FROM movie WHERE title LIKE '%" .
            $safeSearchString .
            "%' OR year LIKE '%" . $safeSearchString . "%';";
        $res = $app->db->executeFetchAll($sql);
    } else {
        $res = "";
    }

    $app->page->add("movie/search", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/*
 * Create movie form
*/
$app->router->get("movie-create", function () use ($app) {
    $title = "Add a Movie | oophp";

    $app->page->add("movie/create", [
        "error" => ""
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/*
 * POST ROUTE FOR movie-create
*/
$app->router->post("movie-create", function () use ($app) {
    $title = "Please Wait... | oophp";

    if ($app->request->getPost("title") &&
        $app->request->getPost("image") &&
        $app->request->getPost("year")
    ) {
        # Statement to be executed
        $sql = "INSERT INTO movie (title, image, year) VALUES (?, ?, ?);";
        # All params are safe and good to go
        $params = [
            htmlentities($app->request->getPost("title")),
            htmlentities($app->request->getPost("image")),
            htmlentities($app->request->getPost("year")),
        ];
        $app->db->connect();
        $app->db->execute($sql, $params);

        $app->response->redirect("movie");
    } else {
        $app->page->add("movie/create", [
            "error" => "Alla fält måste vara ifyllda"
        ]);

        return $app->page->render([
            "title" => $title,
        ]);
    }
});

/*
 * Movie administration
*/
$app->router->get("movie-admin", function () use ($app) {
    $title = "Movie database | oophp";

    $app->db->connect();
    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $app->page->add("movie/admin", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/*
 * Edit a movie form (GET)
*/
$app->router->get("movie-edit/{mid}", function ($mid) use ($app) {
    $title = "Edit Movie | oophp";
    $movieid = htmlentities($mid);

    $app->db->connect();
    $sql = "SELECT * FROM movie WHERE id = " . $movieid . ";";
    $res = $app->db->executeFetchAll($sql);

    $app->page->add("movie/edit", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/*
 * Submit edit of movie (POST)
*/
$app->router->post("movie-edit/{mid}", function ($mid) use ($app) {
    $title = "Edit Movie | oophp";
    $movieid = htmlentities($mid);
    $params = [
        htmlentities($app->request->getPost("title")),
        htmlentities($app->request->getPost("image")),
        htmlentities($app->request->getPost("year")),
    ];
    $app->db->connect();
    $sql = "UPDATE movie SET title = ?, image = ?, year = ? WHERE id = " . $movieid . ";";
    $res = $app->db->execute($sql, $params);

    $app->response->redirect("movie-admin");
});

/*
 * Delete a movie :: movie-delete
*/
$app->router->post("movie-delete", function () use ($app) {
    $title = "please wait... | oophp";
    $params = [
        htmlentities($app->request->getPost("id"))
    ];
    $app->db->connect();
    $sql = "DELETE FROM movie WHERE id = ?;";
    $res = $app->db->execute($sql, $params);

    $app->response->redirect("movie-admin");
});

/*
 * Restore the entire database
*/
$app->router->post("restore-database", function () use ($app) {
    // Restore the database to its original settings
    $sqlsetup = file_get_contents('../sql/movie/setup.sql');
    //regex/
    $sqlq = preg_replace("/--.*\n/", "", $sqlsetup);
    $commandList = explode(";", $sqlq);


    $app->db->connect();
    foreach ($commandList as $command) {
        if ($command == "\n" || $command == "\r\n" || $command == "") {
            continue;
        }
        echo "this is our command:<br><pre>";
        echo $command;
        echo "</pre>";
        $res = $app->db->execute($command);
    }

    $app->response->redirect("movie");
});
