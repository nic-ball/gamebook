<?php

class RatingSubmissionTest extends PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('http://gamebook.dev');
    }

    public function tearDown()
    {
        $this->stop();
    }

    public function testHomePage()
    {
        $this->url('/');
        $content = $this->byTag('li')->text();
        $this->assertEquals("Game 1\n4.5", $content);
    }
}