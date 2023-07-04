<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('Home', new Route('/', array(
    '_controller' => [$container->get('productController'), 'index']
)));

$routes->add('Invoices', new Route('/invoices', array(
    '_controller' => [$container->get('invoicingController'), 'index']
)));

$routes->add('Show Invoice', new Route('/invoice', array(
    '_controller' => [$container->get('invoicingController'), 'show']
)));

$routes->add('New Invoice', new Route('/invoices/new', array(
    '_controller' => [$container->get('invoicingController'), 'new']
)));

$routes->add('Products', new Route('/products', array(
    '_controller' => [$container->get('productController'), 'index']
)));

$routes->add('Show Product', new Route('/product', array(
    '_controller' => [$container->get('productController'), 'show']
)));

$routes->add('Create Product', new Route('/product/new', array(
    '_controller' => [$container->get('productController'), 'new']
)));

$routes->add('Edit Product', new Route('/product/edit', array(
    '_controller' => [$container->get('productController'), 'edit']
)));

return $routes;