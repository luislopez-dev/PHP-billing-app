<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$twig = new Environment( new FilesystemLoader(__DIR__ . '/Views'), ['debug' => true,]);
$routes = new RouteCollection();

$routes->add('Home', new Route('/', array(
    '_controller' => [new HomeController($twig), 'index']
)));
$routes->add('Invoice', new Route('/invoices', array(
    '_controller' => [new InvoiceController($twig), 'index']
)));

return $routes;