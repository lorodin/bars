<?php

namespace App;

use App\Models\Example;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class App
{
    private EntityManager $entityManager;

    public function __construct()
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . "/Models"], $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $dbConfig = require __DIR__ . "/../config/db.php";

        $this->entityManager = EntityManager::create($dbConfig, $config);
    }

    public function index()
    {

        $entity = $this->entityManager->find(Example::class, 1);
        return "Entity find: id = {$entity->getId()}, name = {$entity->getName()}";
    }
}
