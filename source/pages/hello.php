<?php
 
$input = $request->get('name', 'World');

$response->setContent('Hello ' . htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));

