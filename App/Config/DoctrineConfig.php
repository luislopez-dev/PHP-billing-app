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

    /**
     * @throws Exception|MissingMappingDriverImplementation
     */
    public function __construct()
    {
        $this->dotenv = Dotenv::createImmutable(__DIR__ . './../../');
        $this->setupEntityManager();
    }

    /**
     * @throws Exception
     * @throws MissingMappingDriverImplementation
     */
    private function setupEntityManager(): void {
        $this->dotenv->load();

        $dbHost = $_ENV['DB_HOST'];
        $dbUsername = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbName = $_ENV['DB_NAME'];

        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__, 'App/Entities'],
            isDevMode: true
        );
        $connection = DriverManager::getConnection([
            'driver' => 'pdo_mysql',
            'host' => $dbHost,
            'dbname' => $dbName,
            'user' => $dbUsername,
            'password' => $dbPassword
        ]);

        $this->entityManager = new EntityManager($connection, $config);
    }

    public function getEntityManager(): EntityManager {
        return $this->entityManager;
    }
}