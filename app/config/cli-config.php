<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

Type::addType('point', 'App\Entities\Booking\Types\Point');

$paths = [__DIR__ . "/../src/Entities/Booking"];

$isDevMode = true;

$ORMConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

$dbConfig = require __DIR__ . "/../migrations-db.php";

$entityManager = EntityManager::create($dbConfig, $ORMConfig);

$entityManager->getConnection()
    ->getDatabasePlatform()
    ->registerDoctrineTypeMapping('point', 'point');

return ConsoleRunner::createHelperSet($entityManager);
