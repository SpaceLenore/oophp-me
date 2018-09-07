<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$cYear = date("Y");

?>

Copyright &copy; <a class="footer-link" target="_blank" href="https://github.com/SpaceLenore">SpaceLenore</a>
<br>
<?= $cYear ?>
