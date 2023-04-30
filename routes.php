<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Controllers\ProductController;
use Doctrine\ORM\EntityManager;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use App\Config\DoctrineConfig;
use Dotenv\Dotenv;
use App\Services\ProductService;

$twig = new Environment( new FilesystemLoader(__DIR__ . '/Views'), ['debug' => true,]);
$routes = new RouteCollection();
$entityManager = null;

$dotenv = Dotenv::createImmutable(__DIR__);
try {
    $doctrineConfig = new DoctrineConfig($dotenv);
    $entityManager = $doctrineConfig->getEntityManager();
} catch (Exception $e) {
    echo $e->getMessage();
}
$productService = new ProductService($entityManager);

$routes->add('Home', new Route('/', array(
    '_controller' => [new HomeController($twig), 'index']
)));
$routes->add('Invoice', new Route('/invoices', array(
    '_controller' => [new InvoiceController($twig), 'index']
)));

$routes->add('Product', new Route('/products', array(
    '_controller' => [new ProductController($productService, $twig), 'index']
)));

return $routes;