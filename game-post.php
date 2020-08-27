<?php
require 'lib/game.inc.php';

$controller = new Gameplay\GameController($_POST, $game);
header("location: " . $controller->getRedirect());


exit;
