<?php

namespace App\Config;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;
use Gedmo\Timestampable\TimestampableListener;

class DoctrineConfig
{
    private Dotenv $dotenv;
    private EntityManager $entityManager;

    public function __construct()
    {
        $this->dotenv = Dotenv::createImmutable(__DIR__ . '../../../');
        $this->setupEntityManager();
    }

    private function setupEntityManager(): void {

        $this->dotenv->load();

        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__, 'App/Entities'],
            isDevMode: true
        );
        $connection = DriverManager::getConnection([
            'driver' => 'pdo_mysql',
            'host' => $_ENV['DB_HOST'],
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD']
        ]);

        $this->entityManager = new EntityManager($connection, $config);
    }

    public function getEntityManager(): EntityManager {
        return $this->entityManager;
    }
}