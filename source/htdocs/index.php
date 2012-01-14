<?php

require_once __DIR__ . '/bootstrap.php';
 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Ugly hack to keep the tests for now
if(!isset($request)) {
    $request = Request::createFromGlobals();
}
$response = new Response();

$map = array(
    '/index' => __DIR__ . '/htdocs/index.php',
    '/bye'   => __DIR__ . '/htdocs/bye.php',
);
 
$path = $request->getPathInfo();
if (isset($map[$path])) {
    require $map[$path];
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}
 
$response->send();

