<?php

namespace Application\Controller\Factories;

use DI\Container;
use DI\ContainerBuilder;
use Exception;
use Interop\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class DIAbstractFactory implements FactoryInterface
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): Container
    {
        $containerBuilder = new ContainerBuilder();

        $config = $container->get('Config');

        $containerBuilder->addDefinitions($config['di'] ?? []);

        $di = $containerBuilder->build();

        $entityManager = $container->get('Doctrine\ORM\EntityManager');

        $di->set('Doctrine\ORM\EntityManager', $entityManager);

        return $di;
    }
}
