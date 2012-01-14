<?php

require __DIR__ . '/../htdocs-init.php';

$response->setContent('Goodbye!');
$response->send();

