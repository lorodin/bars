<?php

return array(
    'modules' => array(

        'ZendDeveloperTools',
        'DoctrineModule',
        'DoctrineORMModule',
        'Application',
        'Api',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './src/module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
    ),
//    'di' => [
//        'instance' => array(
//            'preference' => array(
//                'Zend\EventManager\EventManagerInterface' => 'EventManager',
//                'Zend\ServiceManager\ServiceLocatorInterface' => 'ServiceManager',
//            ),
//        ),
//    ]
);
