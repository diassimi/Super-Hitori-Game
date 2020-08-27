<?php

require 'lib/game.inc.php';

$controller = new Gameplay\IndexController($_POST, $game);
header("location: " . $controller->getRedirect());
exit;