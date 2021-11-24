<?php

return [
    'dbname' => 'bars',
    'user' => 'bars',
    'password' => 'password',
    'host' => $_ENV["DB_HOST"],
    'driver' => 'pdo_pgsql',
    'port' => 5432
];
