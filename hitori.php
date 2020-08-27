
<?php
require 'lib/game.inc.php';
$view = new Gameplay\GameView($game);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="hitori.css" type="text/css" rel="stylesheet" />
    <title>Super Hitori</title
</head>
<body>
<?php echo $view->header(); ?>
<?php echo $view->board();?>
<?php echo $view->footer(); ?>
</body>
</html>


