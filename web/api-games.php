<?php

require __DIR__ . "/../src/Repository/GameRepository.php";

$request_body = json_decode(file_get_contents('php://input'), true);