<?php

// Isn't here a less painful way to do this? It so archance and wasteful... Well here we go:
// Using the scaffolding in vendor/.composer/autoload.php doesn't seem like an option

// Magic global stuff!
require_once __DIR__.'/../vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';
use Symfony\Component\ClassLoader\UniversalClassLoader;
$loader = new UniversalClassLoader();
$loader->register();

// Do i need to this every time I add something to vendor?
$loader->registerNamespace('Symfony\\Component\\HttpFoundation', __DIR__.'/../vendor/symfony/http-foundation');
 
 
