<?php
require __DIR__ . "/../src/Repository/GameRepository.php";

$repo = new GameRepository();
$game = $repo->findById($_GET['game']);
?>

<h1><?php echo $game->getTitle(); ?></h1>
<form method="POST">
    <input type="number" name="score" min="1" max="5">
    <input type="submit" value="Save">
</form>
