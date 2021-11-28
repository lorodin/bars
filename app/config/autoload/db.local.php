<?php

$dbParams = array(
    'database'  => 'bars',
    'username'  => 'bars',
    'password'  => 'password',
    'hostname'  => 'postgres',
    'port'      => 5432
);

return [
    'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => function ($sm) use ($dbParams) {
                $adapter = new BjyProfiler\Db\Adapter\ProfilingAdapter(array(
                    'driver'    => 'pgsql',
                    'database'  => $dbParams['database'],
                    'username'  => $dbParams['username'],
                    'password'  => $dbParams['password'],
                    'hostname'  => $dbParams['hostname'],
                    'port'      => $dbParams['port'],
                ));

                $adapter->setProfiler(new BjyProfiler\Db\Profiler\Profiler);
                $adapter->injectProfilingStatementPrototype();
                return $adapter;
            },
        ]
    ]
];
