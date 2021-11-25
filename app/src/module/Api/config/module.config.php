<?php

return [
    'router' => [
        'routes' => [
            'api' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/api',
                    'defaults' => [
                        'controller' => 'Api\Controller\Index',
                        'action'     => 'index',
                    ],
                ],
            ]
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy'
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Api\Controller\Index' => 'Api\Controller\IndexController'
        ],
    ],
];
