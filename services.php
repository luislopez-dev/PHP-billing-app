<?php

use DI\ContainerBuilder;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Controllers\ProductController;
use Twig\Environment;
use App\Config\DoctrineConfig;
use Dotenv\Dotenv;
use App\Services\ProductService;
use Twig\Loader\FilesystemLoader;

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
    'homeController' => function ($container) {
        $twig = $container->get('twig');
        return new HomeController($twig);
    },
    'invoiceController' => function ($container) {
        $twig = $container->get('twig');
        return new InvoiceController($twig);
    },
    'productController' => function ($container) {
        $twig = $container->get('twig');
        $productService = $container->get('productService');
        return new ProductController($productService, $twig);
    },
]);

return $containerBuilder;