<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

// Manual loaind for now
// There will be an application specific bootstrap when there is a proply seperated application
require_once __DIR__ . '/calendarApplication/LeapYearController.php';
require_once __DIR__ . '/calendarApplication/LeapYearCalculator.php';

$routes = new Routing\RouteCollection();
$routes->add(
    'leap_year', 
    new Routing\Route(
        '/is_leap_year/{year}', 
        array(
            'year' => null,
            '_controller' => array(new LeapYearController(new LeapYearCalculator()), 'execute')
        )
    )
);

return $routes;
