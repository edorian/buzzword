<?php

require_once __DIR__ . '/../bootstrap.php';
 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

// Ugly hack to keep the tests for now
if(!isset($request)) {
    $request = Request::createFromGlobals();
}
$response = new Response();

$pages = __DIR__ . '/../pages/';

$routes = new RouteCollection();
$routes->add('hello', new Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Route('/bye'));

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$response = new Response();

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();
    require sprintf(__DIR__ . '/../pages/%s.php', $_route);
    $response->setContent(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
} catch (\Exception $e) {
    $response->setStatusCode(500);
    $response->setContent('Internal Server error');
    var_dump($e->getMessage());
}
 
$response->send();

