<?php

namespace App;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

class Connection
{
    private $connectionParams = [];

    public function __construct(string $db, string $user, string $password, int $port = 5432)
    {
        $this->connectionParams = [
            'dbname' => $db,
            'user' => $user,
            'password' => $password,
            'port' => $port,
            'host' => 'localhost',
            'driver' => 'pdo_pgsql'
        ];
    }

    /**
     * @throws Exception
     */
    public function connect(): \Doctrine\DBAL\Connection
    {
        return DriverManager::getConnection($this->connectionParams);
    }
}
