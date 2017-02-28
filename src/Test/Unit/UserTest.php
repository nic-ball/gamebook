<?php

require __DIR__ . "/../../Entity/User.php";

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testGenreCompatibility_With8And6_Returns7()
    {
        $rating1 = $this->createMock('Rating', ['getScore']);
        $rating1->method('getScore')
            ->willReturn(6);

        $rating2 = $this->createMock('Rating', ['getScore']);
        $rating2->method('getRatings')
            ->willReturn(8);

        $user = $this->createMock('Game', ['findRatingsByGenre']);
        $user->method('findRatingsByGenre')
            ->willReturn([$rating1, $rating2]);

        $this->assertEquals(7, $user-getGenreCompatibility('fantasy'));
    }

    public function testRatingsByGenre_With1FantasyAnd1Shooter_Returns1Fantasy()
    {
        $fantasyGame = $this->createMock('Game', ['getGenreCode']);
        $fantasyGame->method('getGenreCode')
            ->willReturn('fantasy');

        $shooterGame = $this->createMock('Game', ['getGenreCode']);
        $shooterGame->method('getGenreCode')
            ->willReturn('shooter');

        $rating1 = $this->createMock('Rating', ['getGame']);
        $rating1->method('getGame')
            ->willReturn($fantasyGame);

        $rating2 = $this->createMock('Rating', ['getGame']);
        $rating2->method('getGame')
            ->willReturn($shooterGame);

        $user = $this->createMock('User', ['getRatings']);
        $user->method('getRatings')
            ->willReturn([$rating1, $rating2]);

        $ratings = $user->findRatingsByGenre('fantasy');
        $this->assertCount(1, $ratings);
        foreach ($ratings as $rating) {
            $this->assertEquals('fantasy', $rating->getGame()->getGenreCode());
        }
    }
}