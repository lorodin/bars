<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;


$paths = [__DIR__ . "/../src/Entities/Booking"];

$isDevMode = true;

$ORMConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

$dbConfig = require __DIR__ . "/../migrations-db.php";

$entityManager = EntityManager::create($dbConfig, $ORMConfig);

$platform = $entityManager->getConnection()->getDatabasePlatform();

Type::addType('point', 'App\Entities\Booking\Types\Point');

$platform->registerDoctrineTypeMapping('point', 'point');

return ConsoleRunner::createHelperSet($entityManager);
