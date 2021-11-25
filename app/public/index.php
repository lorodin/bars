<?php

chdir(dirname(__DIR__));
// Setup autoloading
require __DIR__ . '/../init_autoloader.php';

Zend\Mvc\Application::init(require __DIR__ . '/../config/application.config.php')->run();

//require_once "../vendor/autoload.php";

//use Zend\EventManager\EventManager;
//use Zend\Http\PhpEnvironment;
//use Zend\ModuleManager\ModuleManager;
//use Zend\Mvc\Application;
//use Zend\ServiceManager\ServiceManager;
//
//$configuration = include __DIR__ . '/../config/application.config.php';
//
//// The init() method does something very similar with the previous example.
//
////$controllerManager = new \Zend\Mvc\Controller\ControllerManager();
//
//$serviceManager = new ServiceManager();
//$serviceManager->setService('EventManager', new EventManager());
////$serviceManager->setService('ModuleManager', new ModuleManager($configuration));
//$serviceManager->setService('Request', new PhpEnvironment\Request());
//$serviceManager->setService('Response', new PhpEnvironment\Response());
//$serviceManager->setService("RouteListener", new \Zend\Mvc\RouteListener());
//$serviceManager->setService('MiddlewareListener', new \Zend\Mvc\MiddlewareListener());
////$serviceManager->setService('DispatchListener', new \Zend\Mvc\DispatchListener($controllerManager));
//
//$application = new Application($configuration, $serviceManager);
//$application->bootstrap();
//
//$application->run();
