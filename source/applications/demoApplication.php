<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add(
    'hello', 
    new Routing\Route(
        '/hello/{name}', 
        array(
            'name' => 'World',
            '_controller' => function($request) {
                return render_template($request);
            }
        )
    )
);
$routes->add(
    'bye',
    new Routing\Route(
        '/bye',
        array(
            '_controller' => function($request) {
                return render_template($request);
            }
        )
    )
);

return $routes;
