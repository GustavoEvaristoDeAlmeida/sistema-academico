<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$uri = $_ENV['MONGODB_URI'];

$client = new MongoDB\Client($uri);

$database = $client->selectDatabase('sistema_academico');

?>
