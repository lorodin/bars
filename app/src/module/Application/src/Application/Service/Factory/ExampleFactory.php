<?php

namespace Application\Service\Factory;

use Application\Service\ExampleService;
use Application\Service\IService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ExampleFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): IService
    {
        return new ExampleService();
    }
}
