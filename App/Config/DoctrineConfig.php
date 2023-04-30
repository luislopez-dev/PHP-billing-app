<?php

namespace App\Config;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\Tools\Setup;
use Dotenv\Dotenv;
use Doctrine\ORM\EntityManager;
class DoctrineConfig
{
    private readonly Dotenv $dotenv;
    private EntityManager $entityManager;

    public function __construct()
    {
        $this->dotenv = Dotenv::createImmutable(__DIR__);
    }

    /**
     * @throws Exception
     */
    private function setupEntityManager(): void {
        $this->dotenv->load();

        $dbHost = $_ENV['DB_HOST'];
        $dbUsername = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbName = $_ENV['DB_NAME'];

        $connection = [
            'driver' => 'pdo_mysql',
            'host' => $dbHost,
            'dbname' => $dbName,
            'user' => $dbUsername,
            'password' => $dbPassword
        ];

        $config = Setup::createAttributeMetadataConfiguration(
            [__DIR__, '/App/Entities'],
            true
        );

        $this->entityManager = DriverManager::getConnection($connection, $config);
    }

    public function getEntityManager(): EntityManager {
        return $this->entityManager;
    }
}