<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' =>'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                'params' => [
                    'host'     => 'postgres',
                    'port'     => 5432,
                    'user'     => 'bars',
                    'password' => 'password',
                    'dbname'   => 'bars',
                ]
            ]
        ],
        'driver' => [
            'booking_entities' => [
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../../src/Entities/Booking']
            ],
            'orm_default' => [
                'drivers' => [
                    'App\Entities\Booking' => 'booking_entities',
                ]
            ]
        ],
        'factories' => [

        ]
    ],
];
