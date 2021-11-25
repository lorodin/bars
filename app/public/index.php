<?php

chdir(dirname(__DIR__));

require __DIR__ . '/../init_autoloader.php';

Zend\Mvc\Application::init(require __DIR__ . '/../config/application.config.php')->run();
