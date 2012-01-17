<?php

require_once __DIR__ . '/../bootstrap.php';
 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;

// Ugly hack to keep the tests for now
if(!isset($request)) {
    $request = Request::createFromGlobals();
}

// Hack to keep the tests going..
if(!function_exists('render_template')) { 
    function render_template($request) {
        extract($request->attributes->all(), EXTR_SKIP);
        ob_start();
        require sprintf(__DIR__ . '/../pages/%s.php', $_route);
        return new Response(ob_get_clean());
    }
}

$response = new Response();

$pages = __DIR__ . '/../pages/';

/* So now we want another application
 Instead of throwing the old one away lets see if we can keep both.

 Making a real framework out of this and seperating the application code 
 from the frameworks code and folder structure let's patch in a app switch.
 Doing it like this allows us to keep the current tests and nothing 'package' the 'framework' for now.
*/
if(!isset($application)) {
    $application = 'demoApplication';
}
$routes = require __DIR__ . '/../applications/' . $application . '.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$resolver = new HttpKernel\Controller\ControllerResolver();
 

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    // The new controllerResolver magic breaks the old functionality
    // So lets modify the framework with application specific code again just to keep things running.
    if($application != 'demoApplication') {
        // Implicit knowleague
        $controller = $resolver->getController($request);
        $arguments = $resolver->getArguments($request, $controller);
    } else {
        $controller = $request->attributes->get('_controller');
        $arguments = array($request);
    }

    $response = call_user_func_array($controller, $arguments);
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred: ' . $e->getMessage(), 500);
}

 
$response->send();

