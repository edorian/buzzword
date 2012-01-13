<?php
 
require_once __DIR__.'/../autoload.php';
 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
 
$request = Request::createFromGlobals();
 
$input = $request->get('name', 'World');
 
$response = new Response(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));
 
$response->send();
$input = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-Type: text/html; charset=utf-8');
printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));

