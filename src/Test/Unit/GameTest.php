<?php

require __DIR__ . "/../../Entity/Game.php";

class GameTest extends PHPUnit_Framework_TestCase
{
    public function testImage_WithNull_ReturnsPlaceholder()
    {
        $game = new Game();
        $game->setImagePath(null);
        $this->assertEquals('/images/placeholder.jpg', $game->getImagePath());
    }

    public function testImage_WithPath_ReturnsPath()
    {
        $game = new Game();
        $game->setImagePath('/images/game.jpg');
        $this->assertEquals('/images/game.jpg', $game->getImagePath());
    }

    public function testIsRecommended_With5_ReturnsTrue()
    {
        $game = $this->createMock('Game', ['getAverageScore']);
        $game->method('getAverageScore')
            ->will($this->returnValue(5));

        $this->assertTrue($game->isRecommended());
    }
}