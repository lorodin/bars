<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$config = new PhpFile("migrations.php");
$paths = [__DIR__ . "/../src/Entities/Booking"];

$isDevMode = true;

$ORMConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

$dbConfig = require __DIR__ . "/db.php";

$entityManager = EntityManager::create($dbConfig, $ORMConfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
