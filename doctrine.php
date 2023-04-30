<?php

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use App\Config\DoctrineConfig;
use Dotenv\Dotenv;

$entityManager = null;

$dotenv = Dotenv::createImmutable(__DIR__ . './../');

try {
    $doctrineConfig = new DoctrineConfig($dotenv);
    $entityManager = $doctrineConfig->getEntityManager();
} catch (Exception $e) {
    echo $e->getMessage();
}

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);