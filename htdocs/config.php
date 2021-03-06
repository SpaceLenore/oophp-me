<?php

error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

/*
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "<p>Guess the number: Uncaught exception:</p><p>Line "
        . $e->getLine()
        . " in file "
        . $e->getFile()
        . "</p><p><code>"
        . get_class($e)
        . "</code></p><p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});


//Autoloader

include(__DIR__ . "/autoload.php");
