<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$request = Request::createFromGlobals();
$routes = include_once('routes.php');
$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->match($request->getPathInfo());
    $response = call_user_func($parameters['_controller'], $request);
} catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (\Exception $e) {
    $response = new Response('An error occurred', 500);
    echo $e->getMessage();
}
$response->send();