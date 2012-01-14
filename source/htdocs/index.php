<?php
 
require_once __DIR__ . '/../htdocs-init.php';
 
$input = $request->get('name', 'World');

$response->setContent('Hello ' . $input);
$response->send();

