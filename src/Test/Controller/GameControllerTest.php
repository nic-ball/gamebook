<?php
require __DIR__ . "/../../../vendor/autoload.php";
use GuzzleHttp\Client;

class GameControllerTest extends PHPUnit_Framework_TestCase
{
    public function testIndex_HasUl()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:8888/');
        $this->assertRegexp('/<ul>/', $response->getBody()->getContents());
    }
}