<?php

require __DIR__ . "/../Entity/Game.php";
require __DIR__ . "/../Entity/Rating.php";

class GameRepository
{
    public function findByUserId($id)
    {
        $games = [];
        for ($i=1; $i < 6; $i++ ) {
            $game = new Game();
            $game->setTitle("Game " . $i);
            $game->setImagePath("/images/game.jpg");
            $rating = new Rating();
            $rating->setScore(4.5);
            $game->setRatings([$rating]);
            $games[] = $game;
        }
        return $games;
    }
}
