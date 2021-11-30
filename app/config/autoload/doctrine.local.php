<?php

return [
    'doctrine' => [
        'table_storage' => [
            'table_name' => 'doctrine_migration_versions',
            'version_column_name' => 'version',
            'version_column_length' => 1024,
            'executed_at_column_name' => 'executed_at',
            'execution_time_column_name' => 'execution_time',
        ],
        'migrations_paths' => [
            'App\Migrations' => __DIR__ . '/migrations'
        ],
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
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
        ]
    ],
];
