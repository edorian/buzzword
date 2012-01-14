<?php

require_once __DIR__ . '/../bootstrap.php';
 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Ugly hack to keep the tests for now
if(!isset($request)) {
    $request = Request::createFromGlobals();
}
$response = new Response();

$pages = __DIR__ . '/../pages/';

$map = array(
    '/hello' => $pages . 'hello.php',
    '/bye'   => $pages . 'bye.php',
);
 
$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
    require $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}
 
$response->send();

