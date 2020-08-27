<?php

require __DIR__ . "/../vendor/autoload.php";

//Session Start
session_start();

define("GAME_SESSION", 'game');

if (!isset($_SESSION[GAME_SESSION])) {
    $_SESSION[GAME_SESSION] = new Gameplay\Game();
}

$game = $_SESSION[GAME_SESSION];