<?php

return array(
    'modules' => array(
        'Api'
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
);
