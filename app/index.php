<?php

require_once __DIR__ . '/vendor/autoload.php';

$connection = new \App\Connection('bars', 'bars', 'password');

$conn = $connection->connect();

echo $_ENV['DB_HOST'];
