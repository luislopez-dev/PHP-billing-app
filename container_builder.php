<?php

use DI\ContainerBuilder;
use App\Controllers\InvoicingController;
use App\Controllers\ProductController;
use Twig\Environment;
use App\Config\DoctrineConfig;
use Dotenv\Dotenv;
use Twig\Loader\FilesystemLoader;
use App\Services\ProductService;
use App\Services\InvoicingService;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    'twig' => function () {
        $twig = new Environment(new FilesystemLoader(__DIR__ . '/Views'), ['debug' => true]);
        return $twig;
    },
    'entityManager' => function () {
        $dotenv = Dotenv::createImmutable(__DIR__);
        try {
            $doctrineConfig = new DoctrineConfig($dotenv);
            return $doctrineConfig->getEntityManager();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    },
    'productService' => function ($container) {
        $entityManager = $container->get('entityManager');
        return new ProductService($entityManager);
    },
    'invoicingService' => function ($container) {
        $entityManager = $container->get('entityManager');
        return new InvoicingService($entityManager);
    },
    'invoicingController' => function ($container) {
        $twig = $container->get('twig');
        $invoicingService = $container->get('invoicingService');
        return new InvoicingController($invoicingService, $twig);
    },
    'productController' => function ($container) {
        $twig = $container->get('twig');
        $productService = $container->get('productService');
        return new ProductController($productService, $twig);
    },
]);

return $containerBuilder;