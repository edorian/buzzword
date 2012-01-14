<?php
 
$input = $request->get('name', 'World');

$response->setContent('Hello ' . $input);

