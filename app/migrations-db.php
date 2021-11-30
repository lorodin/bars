<?php

return [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'host' => $_ENV["DB_HOST"],
    'driver' => 'pdo_pgsql',
    'port' => 5432,
];
